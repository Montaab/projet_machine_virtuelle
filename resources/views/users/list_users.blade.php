@extends('layouts')
@section('content')

<div class="card shadow-sm">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Liste des utilisateurs</h5>
    @if(Auth::user()->role == "Admin")
    <a href="/ajouter_utilisateur" class="btn btn-primary">
      <i class="ti ti-plus me-2"></i>Ajouter un utilisateur
    </a>
    @endif
  </div>
  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Numéro de téléphone</th>
            <th>Role</th>
            @if(Auth::user()->role == "Admin")
            <th>Actions</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td><strong>{{ $user->name }}</strong></td>
            <td>{{ $user->prénom }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->tel }}</td>
            <td>{{ $user->role }}</td>
            @if(Auth::user()->role == "Admin")
            <td>
              <div class="d-flex gap-2">
                <a href="/modifier_utilisateur/{{ $user->id }}" class="btn btn-sm btn-outline-primary">
                  <i class="ti ti-pencil"></i>
                </a>
                <button onclick="confirmDelete({{ $user->id }})" class="btn btn-sm btn-outline-danger">
                  <i class="ti ti-trash"></i>
                </button>
                <form id="delete-form-{{ $user->id }}" action="/supprimer_utilisateur/{{ $user->id }}" method="POST" style="display: none;">
                  @csrf
                  @method('DELETE')
                </form>
              </div>
            </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Script pour la confirmation avec SweetAlert2 -->
<script>
  function confirmDelete(userId) {
    Swal.fire({
      title: "Êtes-vous sûr ?",
      text: "Cette action est irréversible !",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Oui, supprimer !",
      cancelButtonText: "Annuler"
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('delete-form-' + userId).submit();
      }
    });
  }
</script>

@endsection
