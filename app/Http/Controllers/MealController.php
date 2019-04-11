<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\Ingredients;
use App\MealIngredients;
use Illuminate\Support\Facades\DB;


class MealController extends Controller
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
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    //   var_dump($request->ingredient);
        
        $meal = new Meal();
        $meal->name = $request->name;
        $meal->description = $request->description;
        $meal->price = $request->price;
        $meal->save();
        $num = count($request->ingredient);


        for($i=0;$i<$num;$i++){
            $mealIng = new MealIngredients();
            $mealIng->id_meal = $meal->id;
            $mealIng->id_ingredients = $request->ingredient[$i];
            $mealIng->save();
            //var_dump($request->ingredient[$i]);         
        }

        return redirect('storemeal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $num=0;
                $meal= Meal::All();
                foreach($meal as $meals){
                   $data[$num]=$meals;
                   $num++;
                }
        return view('storemeal',['data'=>$data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        var_dump($id);
        $meal=Meal::find($id);
       // var_dump($meal);
        return response()->json($meal);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
    
    
    public function showp(Request $request){
        $id=$request->id;
        return response()->json(Meal::find($id));
    }
    
    public function addview(){
        $ingreient = Ingredients::all();
        return view('meal',['data'=>$ingreient]);
    }
}
