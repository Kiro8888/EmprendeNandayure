<div class="form">
    <label for="Rol">Rol</label>
    <input class="form-control" type="text" name="name" id="name" value="@if ($routeName == 'admin.roles.edit') {{$role->name}} @endif">
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="Permisos" class="form-label">Lista de permisos</label>
    <br>
    @foreach ($permissions as $key => $permission)
    <div class="form-check form-check-inline">
        <input type="checkbox" class="form-check-input" name="permissions[]" id="permission" value="{{$permission->id}}"
        @if ($routeName == 'admin.roles.edit')
            @if (isset($role) && $role->permissions->contains($permission->id))
                checked
            @endif
        @endif
        >
        <label for="permiso" class="form-check-label">{{$permission->description}}</label>
    </div>
    @endforeach
</div>