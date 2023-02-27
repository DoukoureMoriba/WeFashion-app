@extends('Layouts.layout')
@section('content')


<div class="container-fluid navbar-dark bg-dark shadow-sm">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    
      <i class="fa-brands fa-shopify mx-1" style="color:#66EB9A;"><strong style="color:#66EB9A;">WeFashion</strong></i>
        
    

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="{{ route('dashboard.product_list') }}" class="nav-link px-2 " style="color:#66EB9A;">Produits</a></li>
      <li><a href="{{ route('dashboard.categorie_list') }}" class="nav-link px-2" style="color:#66EB9A;">Catégories</a></li>
    </ul>

    <div class="col-md-3 text-end">
        <a href="{{Route('all')}}" class="btn btn-outline-primary me-2"><i class="fa-solid fa-house"></i> Revenir a l'acceuil</a>
        
      </div>

</div>

<div>

    <a href="{{route('dashboard.categorie_add_form')}}">Ajouter categorie</a><br> 
        <table class=" table table-success table-striped">
            <thead>
              <tr>
                <th scope="col">Nom de la catégorie</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($categories as $c)
              <tr>
                <th scope="row">{{$c->name}}</th>
                <td>
                  <a href="{{route('dashboard.categorie_edit_form',["id" => $c->id])}}"><i class="fa-solid fa-pen-to-square"></i>modifier</a>
                </td>
                <td>
                    <button type="submit" class="btn btn-error" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash-can"></i>supprimer</button>
                
                </td>
        
              </tr>
             
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Voulez-vous supprimer le produit?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Cette action est irréversible.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{route('dashboard.categorie_delete')}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{$c->id}}">
                  <button type="submit" class="btn btn-primary">Confirmer</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        </tr>
        @endforeach
        </tbody>
            
          </table>

          
@endsection
</div>


   
    