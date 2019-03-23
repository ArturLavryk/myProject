<?php

namespace App\Http\Controllers;

use App\Canteen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Meal;
use App\CanteenMeals;

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

     */
    /**
     * Create a new user instance after a valid registration.
     *
     * 
     * @return \App\Canteen
     */
    public function add (Request $request)
    {
        //var_dump($request->all());
        if(Auth::id()){
       if(isset($request)){
       $data=$request->all();
     
//       DB::insert('insert into canteens (name,adress,city,post_code) values (?,?,?,?)',
//        [$data['name'],$data['adress'],$data['city'],$data['post_code']]);
        $canteen = new Canteen();
        $canteen->name = $data['name'];
        $canteen->adress = $data['adress'];
        $canteen->city = $data['city'];
        $canteen->post_code = $data['post_code'];
        $canteen->save();
        //$status='success';

       return view('home');
        }
//        else{
//            return false;
//       }
       
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $num=0;
        $canteen = Canteen::all();
        foreach ($canteen as $canteens){        
          $data[$num]=$canteens;
          $num++;
        }
        if($request->url() == route('canteens')){
        if(isset($data)){
        return view('show',['data'=>$data]);
        }
        } else {
        return view('myCanteen' , ['data'=>$data]);    
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
    
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //var_dump($request->id);
        $canteen = Canteen::find($request->id);
        $canteen->name=$request->name;
        $canteen->adress=$request->adress;
        $canteen->city=$request->city;
        $canteen->post_code=$request->post_code;
        $canteen->save();
        return redirect('show');
    }

 


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $canteen=Canteen::find($id);
       $canteen->delete();
       return redirect('show');
    }
    
    public function showSimpleCanteen(Request $request, $id){
      // $id=$request->fromRoute('id');
     //var_dump($id);
        $canteent = Canteen::find($id);
        return response()->json($canteent);
    }
    
    
    public function canteenMeal($id){
        $canteen = Canteen::find($id);
        $meals = Meal::all();
        $data['canteen']=$canteen;
        $num = 0;
        foreach ($meals as $meal){
            $data['meal'][$num]=$meal;
            $num++;
        }
        return view('mealToCanteen' , ['data' => $data]); 
        }
        
        
        public function addMeal (Request $request){
           // var_dump($request->idCanteen);
            
            foreach ($request->meal as $meal){
                $melCan = new CanteenMeals();
                $melCan->id_canteen = $request->idCanteen;
                $melCan->id_meals = $meal;
                $melCan->save();
            }
            return redirect('myCanteens');
        }
    
}
