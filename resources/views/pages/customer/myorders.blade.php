@extends('layouts.app')
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Status</th>
            <th>Price</th>
            <th>Details</th>
        </tr>
        @foreach($orders as $item)
            <tr>
            <td><a href="{{route('customer.myorders.details',['id'=>$item->id])}}">{{$item->id}}</a></td>
                <td>{{$item->status}}</td>
                <td>{{$item->price}}</td>
                <td><a href="{{route('customer.myorders.details',['id'=>$item->id])}}" class="btn btn-info">Details</a></td>
            </tr>
        @endforeach
    </table>
@endsection 