<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();
        $users->when($request->keyword, function ($query, $keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                    ->orWhere('email', 'like', "%{$keyword}%");
            });
        });

        $users->orderBy('name', 'asc'); // Adiciona ordenação pelo nome

        $users = $users->paginate(10); // Pagina os usuários, 10 por página
        return view('users.index', compact('users')); // Passa os usuários para a view
    }

    public function create()
    {
        return view('users.create'); // Retorna a view para criar um novo usuário
    }


    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        User::create($input);

        return redirect()->route('users.index')->with('status', 'Usuário criado com sucesso!');
    }

    public function edit(User $user)
    {
        Gate::authorize('edit', $user); // Verifica se o usuário autenticado pode editar este usuário

        $user->load('profile', 'interests'); // Eager load do perfil e interesses
        $roles = Role::all(); // Carrega todos os cargos disponíveis
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        Gate::authorize('edit', $user); // Verifica se o usuário autenticado pode editar este usuário

        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'password' => 'nullable|min:8',
        ]);

        if (empty($input['password'])) {
            unset($input['password']); // Remove a senha do array se estiver vazia
        }

        $user->fill($input);
        $user->save();

        return redirect()->route('users.index')->with('status', 'Usuário atualizado com sucesso!'); // Redireciona de volta com uma mensagem de sucesso
    }

    public function updateProfile(Request $request, User $user)
    {
        Gate::authorize('edit', $user); // Verifica se o usuário autenticado pode editar este usuário

        $input = $request->validate([
            'type' => 'required|in:PJ,PF',
            'address' => 'nullable|string|max:255',
        ]);

        UserProfile::updateOrCreate(
            ['user_id' => $user->id],
            $input
        );

        return back()->with('status', 'Perfil do usuário atualizado com sucesso!');
    }

    public function updateInterests(Request $request, User $user)
    {
        Gate::authorize('edit', $user); // Verifica se o usuário autenticado pode editar este usuário

        $input = $request->validate([
            'interests' => 'nullable|array'
        ]);

        $user->interests()->delete(); // Remove os interesses antigos

        if (!empty($input['interests'])) {
            $user->interests()->createMany($input['interests']);
        }

        return back()->with('status', 'Interesses do usuário atualizados com sucesso!');
    }

    public function updateRoles(Request $request, User $user)
    {
        Gate::authorize('edit', $user); // Verifica se o usuário autenticado pode editar este usuário

        $input = $request->validate([
            'roles' => 'required|array'
        ]);

        $user->roles()->sync($input['roles']); // Sincroniza os cargos

        return back()->with('status', 'Cargos do usuário atualizados com sucesso!');
    }

    public function destroy(User $user)
    {
        Gate::authorize('destroy', $user); // Verifica se o usuário autenticado pode editar este usuário

        $user->delete();

        return redirect()->route('users.index')->with('status', 'Usuário deletado com sucesso!');
    }
}
