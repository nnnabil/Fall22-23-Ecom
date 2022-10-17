@extends('layouts.app')
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Status</th>
            <th>Price</th>
        </tr>
        @foreach($orders as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->price}}</td>
            </tr>
        @endforeach
    </table>
@endsection 