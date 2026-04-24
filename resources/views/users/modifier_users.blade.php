@extends('layouts')
@section('content')

<div class="card shadow-sm">
<div class="card-header bg-primary   " style="margin: 13px; ">
<h5 class="mb-0 text-white">Modifier un utilisateur</h5>
  </div>

  <div class="card-body">
    @if (session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Utilisateur modifié avec succès.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <form action="/modifier_utilisateur/traitement/{{ $users->id }}" method="POST">
      @csrf
      <input type="hidden" name="id" value="{{ $users->id }}">

      <div class="row g-3">
        <!-- Nom -->
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nom" value="{{ $users->name }}">
            <label for="name">Nom</label>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        <!-- Prénom -->
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control @error('prénom') is-invalid @enderror" id="prénom" name="prénom" placeholder="Prénom" value="{{ $users->prénom }}">
            <label for="prénom">Prénom</label>
            @error('prénom') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        <!-- Email -->
        <div class="col-md-6">
          <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="exemple@email.com" value="{{ $users->email }}">
            <label for="email">Email</label>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        <!-- Téléphone -->
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel" placeholder="Numéro de téléphone" value="{{ $users->tel }}">
            <label for="tel">Numéro de téléphone</label>
            @error('tel') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        <!-- Mot de passe -->
        <div class="col-md-6">
          <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Mot de passe">
            <label for="password">Mot de passe</label>
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        <!-- Confirmation mot de passe -->
        <div class="col-md-6">
          <div class="form-floating">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirmer mot de passe">
            <label for="password_confirmation">Confirmer mot de passe</label>
            @error('password_confirmation') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>
      </div>

    
      <!-- Sélection du rôle -->
      <div class="col-md-6 mt-3">
        <label for="role" class="form-label fw-bold">Rôle</label>
        <select id="role" name="role" class="form-select" @if(Auth::user()->role == "User") disabled @endif >
          <option value="Admin" {{ $users->role == 'Admin' ? 'selected' : '' }}>Admin</option>
          <option value="User" {{ $users->role == 'User' ? 'selected' : '' }}>Utilisateur</option>
        </select>
      </div>
    

      <div class="row mt-4">
        <div class="col-md-6">
          <button type="submit" class="btn btn-success w-100">
            <i class="fas fa-check-circle me-2"></i> Modifier
          </button>
        </div>
        <div class="col-md-6">
          <a href="/list_utilisateurs" class="btn btn-outline-primary w-100">
            <i class="fas fa-arrow-left me-2"></i> Retourner
          </a>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
