@extends('Layouts.layout')
@section('content')
    
<main class="form-signin w-25 m-auto p-2">
    <form method="POST" action="{{route('authenticate')}}">
      @csrf
      <h1 class="h3 mb-3 fw-normal">Connexion au compte</h1>
      <div class="form-floating">
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        <label for="email">Adresse E-mail</label>
      </div>
      <div class="form-floating p-2">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <label for="password">Mot de passe</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
    </form>
  </main>
@endsection
