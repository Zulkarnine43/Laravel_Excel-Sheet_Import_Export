
    @extends('headerFooter');

    @section('body')


        <div style="margin-left: 350px; margin-top: 80px">
            <h1>{{Session::get('regis_success')}}</h1>

    <form method="post" action="{{route('signup_form_save')}}" enctype="multipart/form-data">
	
	@csrf
        <div>

            <label> Name:</label><br>
            <input type="text" name="f_name" placeholder="Enter your name ..." required="">
            <span class="text-warning">{{$errors->has('f_name') ? $errors->first('f_name'): ' '}}</span>
        </div>
        <div>
            <label> Email:</label><br>
        <input type="email" name="email" placeholder="Enter your email ..." required="">
         <span>{{$errors->has('email') ? $errors->first('email'): ' '}}</span>
        </div>
        <div>
            <label> phone:</label><br>
            <input type="tel" name="phone" placeholder="Enter your phone ..." required="">
             <span>{{$errors->has('phone') ? $errors->first('phone'): ' '}}</span>
        </div>

        <div>
            <label> District:</label><br>
            <select name="district">
                <option value="0">select your district name</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Khulna">Khulna</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Chittagong">Chittagong</option>
            </select>
             <span>{{$errors->has('district') ? $errors->first('district'): ' '}}</span>
        </div>

        <div>
            <label> Zip code:</label><br>
            <input type="int" name="zip_code" placeholder="Enter your postal code ..." required="">
             <span>{{$errors->has('zip_code') ? $errors->first('zip_code'): ' '}}</span>
        </div>


        <div>
            <label> Gender:</label><br>
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">FeMale
             <span>{{$errors->has('gender') ? $errors->first('gender'): ' '}}</span>
        </div>


        <div>
            <label> password::</label><br>

           <input type="text" name="password" placeholder="Enter your password ..." required=""><br>
            <span>{{$errors->has('password') ? $errors->first('password'): ' '}}</span>
        </div>


        <div>
            <label> Confirm_password:</label><br>
            <input type="text" name="confirm_password" placeholder="Enter your Confirm_password ..." required=""><br>
             <span>{{$errors->has('confirm_password') ? $errors->first('confirm_password'): ' '}}</span>

        </div>

        {{--<div>--}}
            {{--<label> your picture:<br> </label>--}}
             {{--<input type="file"><br>--}}

        {{--</div>--}}

        <div>
            <input type="submit"  value="Submit">
        </div>


    </form>

        </div>
    @endsection

