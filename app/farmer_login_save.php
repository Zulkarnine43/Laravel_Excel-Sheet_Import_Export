<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class farmer_login_save extends Model
{
    //
    protected $fillable=['f_name','email','phone','district','zip_code','gender','password','confirm_password','Activity'];
}
