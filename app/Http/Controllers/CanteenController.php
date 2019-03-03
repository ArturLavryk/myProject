<?php

namespace App\Http\Controllers;

use App\Canteen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CanteenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param  array $data
     * @return \Illuminate\Http\Response
     */
    /**
     * Create a new user instance after a valid registration.
     *
     * 
     * @return \App\Canteen
     */
    public function add(Request $request)
    {
        if(isset($request)){
       $data=$request->all();
       var_dump($data['adress']);
//       DB::insert('insert into canteens (name,adress,city,post_code) values (?,?,?,?)',
//        [$data['name'],$data['adress'],$data['city'],$data['post_code']]);
        $canteen = new \App\Canteen();
        $canteen->name = $data['name'];
        $canteen->adress = $data['adress'];
        $canteen->city = $data['city'];
        $canteen->post_code = $data['post_code'];
        $canteen->save();
       
        }
        return view('home');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $num=0;
        $canteen=DB::select('Select * from canteens');
        foreach ($canteen as $canteens){        
          $data[$num]=$canteens;
          $num++;
        }
        if(isset($data)){
        return view('show',['data'=>$data]);
        }
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
    }
    
    public function showSimpleCanteen(Request $request, $id){
//        $id=$request->fromRoute('id');
        $canteent = Canteen::find($id);
        return response()->json($canteent);
    }
}
