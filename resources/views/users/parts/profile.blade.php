<div class="card">
    <form action="{{ route('users.updateProfile', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-header">
            Perfil
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Tipo de pessoa</label>
                <select name="type" class="form-control @error('type') is-invalid @enderror">
                    <option value="">Selecione</option>
                    <option value="PF" {{ (old('type') ?? $user?->profile?->type) == 'PF' ? 'selected' : '' }}>Pessoa
                        Física</option>
                    <option value="PJ" {{ (old('type') ?? $user?->profile?->type) == 'PJ' ? 'selected' : '' }}>Pessoa
                        Jurídica</option>
                </select>
                @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Endereço</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                    value="{{ old('address') ?? $user?->profile?->address }}">
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="bi bi-pencil"></i> Editar</button>
        </div>
    </form>
</div>