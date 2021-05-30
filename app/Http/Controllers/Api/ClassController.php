<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\classes;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $class= DB::table('classes')->get();
        // return response()->json($class);

         return classes::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validateData=$request->validate([
         'class_name' => 'required|unique:classes|max:25'
        ]);

       classes::create($request->all());
        // $data=array();
        // $data['class_name']=$request->class_name;

        // DB::table('classes')->insert($data);

        return response('done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
             $data=classes::findorfail($id);
             return response()->json($data);

        // $show=DB::table('classes')->where('id', $id)->first();
        // return response()->json($show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $data=array();

        // $data['class_name']=$request->class_name;

        //  DB::table('classes')->where('id', $id)->update($data);

        $data=classes::findorfail($id);
        $data->update($request->all());

         return response('updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // 
        // DB::table('classes')->where('id',$id)->delete();

        classes::where('id', $id)->delete();
        return response('delete');
    }
}
