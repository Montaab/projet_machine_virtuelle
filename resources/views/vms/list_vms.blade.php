@extends('layouts')
@section('content')

<div class="card shadow-sm">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Liste des VMs</h5>
    <a href="/ajouter_vm" class="btn btn-primary">
      <i class="ti ti-plus me-2"></i>Ajouter une VM
    </a>
  </div>
  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th>User</th>
            <th>Nom</th>
            <th>Adresse IP</th>
            <th>CPU</th>
            <th>Mémoire</th>
            <th>État</th>
            <th>Alert</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($vms as $vm)
          <tr>
            <td><strong>{{ $vm->user->name }}</strong></td>
            <td>{{ $vm->nom }}</td>
            <td>{{ $vm->adresse_ip }}</td>
            <td>{{ $vm->cpu }}</td>
            <td>{{ $vm->memoire }}</td>
            <td>{{ $vm->etat }}</td>
            <td>{{ $vm->alert }}</td>
            <td>{{ $vm->description }}</td>
            <td>
              <div class="d-flex gap-2">
                <a href="/modifier_vm/{{ $vm->id }}" class="btn btn-sm btn-outline-primary">
                  <i class="ti ti-pencil"></i>
                </a>
                <button onclick="confirmDelete({{ $vm->id }})" class="btn btn-sm btn-outline-danger">
                  <i class="ti ti-trash"></i>
                </button>
                <form id="delete-form-{{ $vm->id }}" action="/supprimer_vm/{{ $vm->id }}" method="POST" style="display: none;">
                  @csrf
                  @method('DELETE')
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Intégration de SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function confirmDelete(vmId) {
    Swal.fire({
      title: "Êtes-vous sûr ?",
      text: "Cette action est irréversible et supprimera définitivement la VM !",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Oui, supprimer !",
      cancelButtonText: "Annuler"
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('delete-form-' + vmId).submit();
      }
    });
  }
</script>

@endsection
