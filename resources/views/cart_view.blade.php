@extends('headerFooter');


@section('body')

<table border="5px">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>quentity</th>
        <th>price</th>
        <th>Action</th>
    </tr>
    </thead>
    @php($i=0)

    @foreach($carts as $cart)
    <tbody>
    <tr>
        <th>{{ $i++}}</th>
        <th>{{ $cart->name}}</th>
        <th>{{ $cart->qty}}</th>
        <th>{{ $cart->price*$cart->qty}}</th>
        <th><a href="{{route('cart_delete',['id'=>$cart->rowId])}}">delete</a></th>

    </tr>
    </tbody>
        @endforeach
</table>
<p><a href="{{route('d_pdf')}}">downloadpdf</a></p>
@endsection