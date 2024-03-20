<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="antialiased font-sans bg-gray-200">
<nav class="bg-gray-800">
  <div class="container mx-auto px-4 py-2 md:flex md:items-center">
    <div class="flex items-center justify-between">
      <div class="flex items-center space-x-4">
        <a href="#" class="text-gray-300 hover:text-gray-100 px-3 py-2 rounded-md text-sm">Accueil</a>
        <a href="#" class="text-gray-300 hover:text-gray-100 px-3 py-2 rounded-md text-sm">À propos</a>
        <a href="#" class="text-gray-300 hover:text-gray-100 px-3 py-2 rounded-md text-sm">Services</a>
      </div>
    </div>
  </div>
</nav>
<div class="min-h-screen flex items-center justify-center py-6">
    <div class="bg-white shadow-md rounded-lg px-8 py-8 pb-8 flex flex-col md:w-1/2 w-full">
        <div class="text-center pb-8">
            <h1 class="text-3xl font-bold">Connexion</h1>
        </div>
        <form method="POST" action="{{ route('login.action') }}">
            @csrf
            <div class="mb-6">
                <label for="email" class="text-gray-700 font-bold mb-2 block">Adresse Email</label>
                <input type="email" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-1 @error('email') border-red-500 @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="text-red-500 text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="text-gray-700 font-bold mb-2 block">Mot de passe</label>
                <input type="password" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-1 @error('password') border-red-500 @enderror" id="password" name="password" required autocomplete="current-password">
                @error('password')
                <span class="text-red-500 text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox text-indigo-600" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="ml-2 text-gray-700">Se souvenir de moi</span>
                    
                </label>

            </div>

            <div class="mb-6">
                <button type="submit" class="w-full bg-indigo-500 text-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">Connexion</button>
            </div>

            @if (Route::has('password.request'))
            <div class="text-center">
                <a class="text-gray-700 text-sm" href="{{ route('password.request') }}">
                    Mot de passe oublié?
                </a>
            </div>
            @endif

        </form>
        <div class="text-center">
            <a class="small" href="{{route('register')}}">Create an Account!</a>
        </div>
    </div>
</div>
</body>
</html>