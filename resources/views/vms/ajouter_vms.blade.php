@extends('layouts')
@section('content')

<div class="card shadow-lg rounded-3">
  <div class="card-header bg-primary " style="margin: 13px; ">
    <h5 class="mb-0 text-white "><i class="ti ti-plus me-2"></i> Ajouter une machine virtuelle</h5>
  </div>

  <div class="card-body">
    @if (session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="ti ti-check-circle me-2"></i> VM ajoutée avec succès.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <form action="/ajouter_vm/traitement" method="POST">
      @csrf
      
      <div class="row g-3">
        <!-- Nom -->
        <div class="col-lg-6">
          <div class="form-floating">
            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" placeholder="Nom" value="{{ old('nom') }}">
            <label for="nom"><i class="ti ti-device-desktop me-2"></i>Nom</label>
            @error('nom')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <!-- Adresse IP -->
        <div class="col-lg-6">
          <div class="form-floating">
            <input type="text" class="form-control @error('adresse_ip') is-invalid @enderror" id="adresse_ip" name="adresse_ip" placeholder="Adresse IP" value="{{ old('adresse_ip') }}">
            <label for="adresse_ip"><i class="ti ti-network me-2"></i>Adresse IP</label>
            @error('adresse_ip')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>

      <div class="row g-3 mt-2">
        <!-- CPU -->
        <div class="col-lg-6">
          <div class="form-floating">
            <input type="text" class="form-control @error('cpu') is-invalid @enderror" id="cpu" name="cpu" placeholder="CPU" value="{{ old('cpu') }}">
            <label for="cpu"><i class="ti ti-cpu me-2"></i>CPU</label>
            @error('cpu')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <!-- Mémoire -->
        <div class="col-lg-6">
          <div class="form-floating">
            <input type="text" class="form-control @error('memoire') is-invalid @enderror" id="memoire" name="memoire" placeholder="Mémoire" value="{{ old('memoire') }}">
            <label for="memoire"><i class="ti ti-memory me-2"></i>Mémoire</label>
            @error('memoire')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>

      <div class="row g-3 mt-2">
        <!-- État -->
        <div class="col-lg-6">
          <div class="form-floating">
            <select id="etat" name="etat" class="form-select">
              <option value="">Sélectionner</option>
              <option value="Activer">Activer</option>
              <option value="Désactiver">Désactiver</option>
            </select>
            <label for="etat"><i class="ti ti-toggle-right me-2"></i>État</label>
          </div>
        </div>

        @if(Auth::user()->role == "Admin")
          <!-- Utilisateur -->
          <div class="col-lg-6">
            <div class="form-floating">
              <select id="user_id" name="user_id" class="form-select">
                <option value="">Sélectionner un utilisateur</option>
                @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
              <label for="user_id"><i class="ti ti-user me-2"></i>Utilisateur</label>
            </div>
          </div>
        @endif
      </div>

      <!-- Description -->
      <div class="mt-3">
        <div class="form-floating">
          <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description" style="height: 100px;">{{ old('description') }}</textarea>
          <label for="description"><i class="ti ti-file-text me-2"></i>Description</label>
          @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <!-- Boutons -->
      <div class="row mt-4">
        <div class="col-md-6">
          <button type="submit" class="btn btn-success w-100">
            <i class="ti ti-check me-2"></i>Ajouter
          </button>
        </div>
        <div class="col-md-6">
          <a href="/list_vms" class="btn btn-outline-primary w-100">
            <i class="ti ti-arrow-left me-2"></i>Retourner
          </a>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
