<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Connexion - JobFinder</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  @vite(['resources/css/StyleIndex/login.css'])
</head>
<body>
    <!-- Navbar -->
   <x-compoIndex.navbar activePage='4'/>

  <div class="login-container">
    <div class="container">
      <div class="login-card mx-auto">
        <h2>Connexion</h2>
        <form action="{{ route('login') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Votre adresse email" value="{{ old('email') }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Votre mot de passe">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Se souvenir de moi</label>
          </div>
          @error('error')
            <x-alert type="danger" >
              {{ $message }}
            </x-alert>
          @enderror
          <button class="btn btn-primary">Se connecter</button>
          <div class="text-center mt-3">
            <a href="#" class="text-decoration-none">Mot de passe oublié ?</a>
          </div>
        </form>
        
        <div class="divider">ou</div>

        <div class="text-center mt-4">
          Pas encore de compte ? <a href="{{ route('choixInscription') }}" class="text-decoration-none">S'inscrire</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
