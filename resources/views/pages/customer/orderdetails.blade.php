@extends('layouts.app')
@section('content')
    <h1>Order Details</h1>
    <h4>Order Id: {{$order->id}}</h4>
    <h4>Order By: {{$order->customer->name}}</h4>
    <h4>Phone: {{$order->customer->phone}}</h4>
    <h5>Order Details </h5>
    <table class="table table-bordered">
        <tr>
            <td>Name</td>
            <td>Image</td>
            <td>Unit Price</td>
            <td>Qty</td>
        </tr>
        @foreach($order->orderdetails as $od)
            <tr>
                <td>{{$od->product->name}}</td>
                <td><img width="100px" height="100px" src="{{asset('images/'.$od->product->image)}}"></td>
                <td>{{$od->unit_price}}</td>
                <td>{{$od->qty}}</td>
            </tr>
        @endforeach
    </table>
@endsection
<!-- 
select p.name, p.image, od.unit_price, od.qty,c.name,c.phone,o.id
from orderdetails od 
left join products p on p.id = od.product_id 
left join orders o on o.id = od.o_id 
left join customers c on c.phone = o.customer_id 
where o.id = 1;
--> 