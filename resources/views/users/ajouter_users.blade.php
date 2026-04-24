@extends('layouts')

@section('content')


  <div class="card shadow-lg border-0 rounded-3">
    <div class="card-header bg-primary   " style="margin: 13px; ">
      <h5 class="mb-0 text-white">Ajouter un utilisateur</h5>
    </div>

    <div class="card-body">
      @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Utilisateur ajouté avec succès.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <form action="/ajouter_utilisateur/traitement" method="POST">
        @csrf

        <div class="row g-3">
          <!-- Nom -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nom" value="{{ old('name') }}">
              <label for="name"><i class="bi bi-person-fill"></i> Nom</label>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Prénom -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('prénom') is-invalid @enderror" id="prénom" name="prénom" placeholder="Prénom" value="{{ old('prénom') }}">
              <label for="prénom"><i class="bi bi-person"></i> Prénom</label>
              @error('prénom')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Email -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="exemple@email.com" value="{{ old('email') }}">
              <label for="email"><i class="bi bi-envelope-fill"></i> Email</label>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Téléphone -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel" placeholder="Numéro de téléphone" value="{{ old('tel') }}">
              <label for="tel"><i class="bi bi-telephone-fill"></i> Téléphone</label>
              @error('tel')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Mot de passe -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Mot de passe">
              <label for="password"><i class="bi bi-lock-fill"></i> Mot de passe</label>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Confirmation mot de passe -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirmer mot de passe">
              <label for="password_confirmation"><i class="bi bi-lock"></i> Confirmer le mot de passe</label>
              @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Rôle -->
          <div class="col-md-6">
            <div class="form-floating">
              <select id="role" name="role" class="form-select @error('role') is-invalid @enderror">
                <option value="">Sélectionner un rôle</option>
                <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>Utilisateur</option>
              </select>
              <label for="role"><i class="bi bi-person-badge"></i> Rôle</label>
              @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

        </div>

        <!-- Boutons -->
        <div class="row mt-4">
          <div class="col-md-6 text-center">
            <button type="submit" class="btn btn-success w-100">
              <i class="bi bi-check-circle"></i> Ajouter
            </button>
          </div>
          <div class="col-md-6 text-center">
            <a href="/list_utilisateurs" class="btn btn-outline-primary w-100">
              <i class="bi bi-arrow-left"></i> Retourner
            </a>
          </div>
        </div>

      </form>
    </div>
  </div>


@endsection
