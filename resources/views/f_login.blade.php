
@extends('headerFooter');

@section('body')


    <div style="margin-left: 350px; margin-top: 80px">



        <form method="post" action="{{route('f_login_check')}}">

            @csrf

            <div>
                <label> Email:</label><br>
                <input type="email" name="email" placeholder="Enter your email ...">
            </div>

            <div>
                <label> password::</label><br>

                <input type="text" name="password" placeholder="Enter your password ..."><br>
            </div>

                <div class="form-group mt-3">
                {!! NoCaptcha::renderJs('en', false, 'onloadCallback') !!}
                {!! NoCaptcha::display() !!}
                </div>

            <div>
                <input type="submit"  value="Submit">
            </div>


        </form>

    </div>

<script>
    var onloadCallback = function() {
    alert("grecaptcha is ready!");
  };
</script>
@endsection

