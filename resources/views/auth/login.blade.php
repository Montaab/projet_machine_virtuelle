<!DOCTYPE html>
<html lang="fr" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template-no-customizer">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Connexion - La Poste Tunisienne</title>
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/js/config.js"></script>
</head>
<body class="authentication-wrapper authentication-cover authentication-bg">

    <div class="col-lg-5 mx-auto d-flex align-items-center p-4" style="width:31%; margin: 20px;">
        <div class="w-100 card p-4 shadow">
            <div class="text-center mb-3">
                <img src="../../assets/img/illustrations/logoPoste.png" alt="Logo Poste Tunisienne" width="35%" />
                <h2 class="fw-bold mt-2">Bienvenue</h2>
                <p class="text-muted">Connectez-vous à votre compte</p>
            </div>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form id="formAuthentication" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Entrez votre e-mail" value="{{ old('email') }}" autofocus >
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 form-password-toggle">
                    <label for="password" class="form-label">Mot de passe</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" >
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" id="remember-me" class="form-check-input" name="remember">
                    <label for="remember-me" class="form-check-label">Se souvenir de moi</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            </form>

            <p class="text-center mt-3">
                <a href="{{ route('password.request') }}" class="text-decoration-none">Mot de passe oublié ?</a>
            </p>
        </div>
    </div>

    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <script src="../../assets/js/main.js"></script>

</body>
</html>
