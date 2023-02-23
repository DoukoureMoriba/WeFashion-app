@extends('Layouts.layout')
@section('content')
@include('Component.header')

  <main>
    <div class="album py-5 bg-light">
      <div class="container p-2">
        {{$products->count()}} résultats
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($products as $p)
            <div class="col">
              <div class="card shadow-sm card-image">
                <img src="{{URL::to($p->image)}}" alt="">
                <div class="card-body">
                  <h4>{{$p->name}}</h4>
                  <p class="card-text">{{number_format($p->price, 2, ',', ' ')}} €</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
  
        </div>
      </div>
      {{$products->links()}}
    </div>
   
  </main>
  
  @include('Component.footer')
  
@endsection
    


