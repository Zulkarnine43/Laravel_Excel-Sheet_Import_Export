<?php

namespace App\Http\Controllers;

use App\farmer_login_save;
use App\Model\classes;
use Barryvdh\DomPDF\Facade as PDF;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Nexmo\Laravel\Facade\Nexmo;
use Excel;

class MyController extends Controller
{
    //
        public function import(){
                
                return view ('import');
                
            }

            public function postImport(Request $request){
                  if($request->hasFile('file')){
                    $path= $request->file('file')->getRealPath();
                    $data=Excel::load($path)->get();
                    // return $data;

                    foreach ($data as $row) {
                        $farmer_register = new farmer_login_save();

                            $Activity = "active";
                            $farmer_register['f_name'] = $row['f_name'];
                            $farmer_register['email'] = $row['email'];
                            $farmer_register['phone'] = $row['phone'];
                            $farmer_register['district'] = $row['district'];
                            $farmer_register['zip_code'] = $row['zip_code'];
                            $farmer_register['gender'] = $row['gender'];
                            $farmer_register['password'] = $row['password'];
                            $farmer_register['confirm_password'] = $row['confirm_password'];
                            $farmer_register['Activity'] = $Activity;
                            $farmer_register->save();
                    }

                    return redirect()->back()->with('success',count($data).'added successfully');
                  }
            }
            
        public function fileExport(Request $request){


        Excel::create('contact-list', function($excel){

        $excel->sheet('Sheet 1', function($sheet){
            $data=farmer_login_save::all();
            $sheet->fromArray($data);
        });

        $excel->sheet('Sheet 2', function($sheet){
            $data=farmer_login_save::select(['f_name'])->get();
            $sheet->fromArray($data);
        });
        })->download('xlsx');
             return redirect()->back()->with('success','Exported successfully');
        }


	public function index(){
		
		return view ('index');
		
	}

        public function indexx(){
        
        $person=classes::all();
        return response()->json($person);
        
    }

  public function store(Request $request){
        classes::create($request->all());
        return response("success");
    }
	
		public function signup(){
		
		return view ('signup');
		
	}
    public function signup_form_save(Request $request){


        
        $this->validate($request,[
            'f_name'=>'min:1|max:255',
            'email'=>'email|unique:farmer_login_saves,email',
            'phone'=>'numeric|digits:11',
            'district' => 'required',
            'zip_code'=>'required|max:5|string',
            'gander'=> 'required|in:male,female',
            'password'=>'Max:10|Min:5',
            'confirm_password'=>'Max:10|Min:5'
        ]);

        $user=farmer_login_save::find($request->f_name);
	    if(empty($user)) {


            $farmer_register = new farmer_login_save();
            $Activity = "active";

            $farmer_register['f_name'] = $request['f_name'];
            $farmer_register['email'] = $request['email'];
            $farmer_register['phone'] = $request['phone'];
            $farmer_register['district'] = $request['district'];
            $farmer_register['zip_code'] = $request['zip_code'];
            $farmer_register['gender'] = $request['gender'];
            $farmer_register['password'] = $request['password'];
            $farmer_register['confirm_password'] = $request['confirm_password'];
            $farmer_register['Activity'] = $Activity;
            $farmer_register->save();

//        $basic  = new \Nexmo\Client\Credentials\Basic('501b1ba2', 'p9tOyatkVQ5QbYH7');
//        $client = new \Nexmo\Client($basic);
//
//        $message = $client->message()->send([
//            'to' => '8801989419776',
//            'from' => '8801989419776',
//            'text' => 'Hello from Green Bangla'
//        ]);

            return redirect('/Farmer/signup')->with('regis_success', 'Your Registration are success');
        }
        return redirect('/Farmer/signup')->with('regis_success','username exists! Try another ');

    }


    public function all_farmers(){

        $Activity="active";
	    $farmers=farmer_login_save::all()->where('Activity',$Activity);

        return view ('all_farmers_info',['farmers'=>$farmers]);

    }

    public function farmer_deactive($id){

        $DeActivity="deactive";

        $farmer=farmer_login_save::find($id);

        $farmer['Activity']=$DeActivity;
        $farmer->save();

        return redirect('/Farmers');


    }

    public function f_login(){

        return view ('f_login');

    }

    public function f_login_check(Request $request){

         $request->validate([
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $f=farmer_login_save::where('email',$request->email)->first();
        $f2=farmer_login_save::where('password',$request->password)->first();

        if($f && $f2) {
            Session::put('f_name',$f['f_name']);
            return redirect('/Farmer/login/page');
        }

    }

    public function f_logout(){

       Session::flush();
        return redirect('/Farmer/login/page');

    }
    public function about (){
	    $path="demo.txt";
	    return response()->print($path);
    }

    public function add_cart(Request $request){
//
        Cart::add(['id' => $request->p_name,
            'name' => $request->p_name,
            'qty' => $request->quentity,
            'price' => $request->price
        ]);

        $allCart=Cart::content();
		return view('cart_view',['carts'=>$allCart]);

    }

    public function cart_delete($id){
//
        Cart::remove($id);
        $allCart=Cart::content();
        return view('cart_view',['carts'=>$allCart]);

    }
    public function d_pdf(){
       $allCart=Cart::content();
       $pdf=PDF::loadView('download_invoice',compact('allCart'));
       return $pdf->stream('invoice.pdf');

    }

}
