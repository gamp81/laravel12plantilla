<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user)
    {
        return $user->roles()->whereIn('name', ['admin', 'editor'])->exists(); // Permite edição para administradores e editores
    }

    public function destroy(User $user)
    {
        return $user->roles()->whereIn('name', ['admin'])->exists(); // Permite exclusão apenas para administradores
    }
}
