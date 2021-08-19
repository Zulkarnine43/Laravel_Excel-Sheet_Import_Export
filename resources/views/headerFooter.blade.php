
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
            <a class="dropbtn" href="{{route('home')}}">{{__('home.Home')}}</a>
        </div>

        <div class="dropdown">
            <button class="dropbtn">{{__('home.Register')}}</button>
            <div class="dropdown-content">
                <a href="{{route('signup_form')}}">{{__('home.Framer')}}</a>
                <a href="#">{{__('home.Customer')}}</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">{{__('home.registration_details')}}</button>
            <div class="dropdown-content">
                <a href="{{route('all_farmers')}}">{{__('home.Farmer_register_details')}}</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">{{__('home.Login')}}</button>
            <div class="dropdown-content">
                <a href="{{route('f_login')}}">{{__('home.Farmer_log')}}</a>
                <a href="#">{{__('home.Customer_log')}}</a>
            </div>
        </div>

        <div class="dropdown">
            <button href="" class="dropbtn">{{__('home.About Us')}}</button>
        </div>

        @if (session()->has('f_name'))


       <div class="dropdown">
            <button class="">
                <h1 style="font-size: 8px">{{Session::get('f_name')}}</h1>
            </button>
            <div class="dropdown-content">
                <a href="">{{__('home.profile')}}</a>
                <a href="{{route('f_logout')}}">{{__('home.logout')}}</a>
            </div>
        </div>
            @endif

            <div>
                <a href="locale/bn">Bangla</a>
                 <a href="locale/en">English</a>
            </div>

    </div>

@yield('body')

</div>

</body>
</html>

