@extends('Layouts.layout')
@section('content')
<center>
    <form class="container p-1 w-50" method="POST" action="{{route('register_user')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="name" class="form-control" id="name" name="name" placeholder="Entrez votre nom" >
          </div>
        <div class="mb-3">
          <label for="email" class="form-label" >Adresse E-mail</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Creer votre Mot de passe" >
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
</center>
  