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
DB::insert('insert into canteens (name,adress,city,post_code) values (?,?,?,?)',
        [$data['name'],$data['adress'],$data['city'],$data['post_code']]);
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
        $canteen=DB::select('Select * from users');
        foreach ($canteen as $canteens){
        $data['name']=$canteens->name;
        //$data['adress']=$canteens->adress;
        $data['city']=$canteens->city;
        $data['post_code']=$canteens->post_code;
        }
        if(isset($data)){
        return view('show',['canteen'=>$canteen]);
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
}
