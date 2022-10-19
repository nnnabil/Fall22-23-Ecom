@extends('layouts.app')
@section('content')
    @if(Session::has('cart'))
        <table class="table table-bordered">
            <tr>
                <td></td>
                <td>Name</td>
                <td>Qty</td>
                <td>Unit Price</td>
                <td>Total</td>
            </tr>
            @php
            $total = 0
            @endphp
            @foreach ($cart as $item)
                <tr>
                    <!-- <td><img src="{{$item->image}}" width="50px" height="50px"></td> -->
                    <td><img src="{{asset('images/'.$item->image)}}" width="50px" height="50px"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->price * $item->qty}}</td>
                    @php 
                        $total += $item->price * $item->qty
                    @endphp
                </tr>
            @endforeach
            <tr>
                <td></td><td></td><td></td>
                <td>Grand Total</td>
                <td>{{$total}}</td>
            </tr>
        </table>
        <form action="{{route('checkout')}}" method="post">
            {{@csrf_field()}}
            <input type="hidden" name="total_price" value="{{$total}}">
            <input type="submit" class="btn btn-danger" value="Checkout">
        </form>
    @else
        Cart is empty
    @endif
@endsection