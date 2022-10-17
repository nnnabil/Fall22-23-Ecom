@extends('layouts.app')
@section('content')
    <div class="col-md-3">
        @foreach ($products as $item)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{$item->image}}" alt="Card image cap">
                <div class="card-body">
                <p class="card-text text-center">{{$item->name}}<br>
                <span>Price: BDT{{$item->price}}</span><br>
                <a href="{{route('products.addtocart',['id'=>$item->id])}}" class="btn btn-primary" style="color:white">Add to Cart</a></p>
                </div>
            </div>
        @endforeach
    </div>       
@endsection 