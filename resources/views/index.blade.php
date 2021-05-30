@extends('headerFooter');


@section('body')
    <style>
        input{
            border: none;
        }
    </style>

    <form method="post" action="{{route('add_cart')}}">
        @csrf
        <div class="gallery">
            <a target="_blank" href="">
                <img src="{{url('public/myfile/images/ph1.png')}}" alt="images" style="width:200px; height: 200px">
            </a>
            <div class="desc"><h1 id="n"></h1>
                <input type="text" name="p_name"  value="phone" ><br>
                <input type="int" name="price"  value="10000" ><br>
                <input type="number" name="quentity" min="1" value="1" ><br>
                <input type="submit" name="add_cart" value="ADD TO CART"><br>
            </div>
        </div>
    </form>
    @endsection