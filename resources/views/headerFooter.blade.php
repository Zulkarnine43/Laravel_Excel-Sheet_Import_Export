
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{url('public/myfile/css/style.css')}}" rel="stylesheet">
    <style>


    </style>
</head>
<body class="bdy">

<div class="page">

    <div class="menu">

        <div class="dropdown">
            <a class="dropbtn" href="{{route('home')}}">Home</a>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Register</button>
            <div class="dropdown-content">
                <a href="{{route('signup_form')}}">Framer</a>
                <a href="#">Customer</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">registration_details</button>
            <div class="dropdown-content">
                <a href="{{route('all_farmers')}}">Farmer</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Login</button>
            <div class="dropdown-content">
                <a href="{{route('f_login')}}">Framer</a>
                <a href="#">Customer</a>
            </div>
        </div>

        <div class="dropdown">
            <button href="" class="dropbtn">About Us</button>
        </div>

        @if (session()->has('f_name'))


       <div class="dropdown">
            <button class="">
                <h1 style="font-size: 8px">{{Session::get('f_name')}}</h1>
            </button>
            <div class="dropdown-content">
                <a href="">profile</a>
                <a href="{{route('f_logout')}}">logout</a>
            </div>
        </div>
            @endif

    </div>

@yield('body')

</div>

</body>
</html>

