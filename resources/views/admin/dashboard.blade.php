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
  </header>
</div>


<a href="{{route('dashboard.product_add_form')}}" class="btn btn-outline-secondary m-2 ">Nouveau</a>
<table class=" table table-success table-striped">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Catégorie</th>
        <th scope="col">Prix</th>
        <th scope="col">Etat</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $p)
      <tr>
        <th scope="row">{{$p->name }}</th>
        <td>{{ $p->categories->name }}</td>
        <td>{{number_format($p->price, 2, ',', ' ')}} €</td>
        <td>
          @if ($p->isSale)
              en solde
          @else
              standard
          @endif
      </td>
        <td>
          <a href="{{route('dashboard.product_edit_form',["id" => $p->id])}}"><i class="fa-solid fa-pen-to-square"></i>modifier</a>
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
        <form action="{{route('dashboard.product_delete')}}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$p->id}}">
          <button type="submit" class="btn btn-primary">Confirmer</button>
        </form>
      </div>
    </div>
  </div>
</div>
    @endforeach
</tbody>
    
  </table>
  {{$products->links()}}
  @include('Component.footer')
@endsection
