<div class="card">
    <div class="card-header">
      {{-- <a class="btn btn-primary" href="{{route('admin.users.create')}}"><i class="fas fa-plus"></i>Crear usuario</a> --}}
      <hr>
      <input type="text" class="form-control" placeholder="Escriba el correo o el nombre del usuario" wire:model.live="search">
    </div>

    @if ($users->count())
    <div class="card-body">
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Email</th>
              <th scope="col">Estado</th>
              <th scope="col">Editar</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($users as $user)
            @if ($user->status === 'Activo' || $user->status === 'Inactivo')
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status }}</td>
                                <td width="200px">
                                    <button class="btn btn-warning" 
                                            data-toggle="modal" 
                                            data-target="#editUserModal" 
                                            data-id="{{ $user->id }}" 
                                            data-name="{{ $user->name }}" 
                                            data-last_name="{{ $user->last_name }}" 
                                            data-email="{{ $user->email }}" 
                                            data-roles="{{ $user->roles->pluck('id')->join(',') }}">
                                        Editar
                                    </button>
                                </td>
                            </tr>
                        @endif
        @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="card-footer">
      {{$users->links()}}
    </div>

    @else
        <div class="card-body">
          <div class="alert alert-danger" role="alert">
            No se ha encontrado ningun usuario 
        </div>
    @endif

 

</div>
