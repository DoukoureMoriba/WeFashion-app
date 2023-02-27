@extends('Layouts.layout')
@section('content')
@include('Component.header')


    <main role="main">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-6">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ URL::to( $product->image) }}" alt="Card image cap">
                    </div>
                </div>
                <div class="col-6">
                    <h1 class="jumbotron-heading"> {{ $product->name }} </h1>
                    <h5>{{ $product->price }} CFA</h5>
                    <p class="lead text-muted">{{ $product->description }}</p> 
                    <hr>
                    <form>
                        @csrf
                        <label for="size">Choisissez votre taille</label>
                        <select name="size" id="size" class="form-control">
                            @foreach ($product->sizes as $size )
                            <option value="{{$size->id}}">{{$size->name}}</option>
                            @endforeach
                        </select>
                        <p class="pt-3 ">
                            <input type="number" name="quantite" id="quantite" class="form-control" value="1" min="1" >
                        </p>
                        <p>
                            <button type="submit" class="btn btn-cart my-2 btn-block"><i class="fas fa-shopping-cart"></i>
                                Ajouter au Panier
                            </button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </main>

    @include('Component.footer')
@endsection