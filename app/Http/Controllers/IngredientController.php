<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredients;
use App\Meal;

class IngredientController extends Controller
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
        $ingredient=new Ingredients();
        $ingredient->name=$request->name;
        $ingredient->meal_id=1;
        $ingredient->save();
        return redirect('ingredient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $num=0;
        
      $ingredient=Ingredients::all();
      foreach ($ingredient as $ingredients){
          $data[$num]=$ingredients;
          $meal= Meal::find($data[$num]->meal_id);
          $data[$num]['mealName']=$meal->name;
      $data[$num]['mealDescription']=$meal->description;
      $num++;
      }
      return view('storeIngredient',['data'=>$data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredient= Ingredients::find($id);
        return response()->json($ingredient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $canteen = Ingredients::find($request->id);
        $canteen->name=$request->name;
        $canteen->save();
        return redirect('storeingredient');
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
    public function delete($id)
    {
        $ingredient= Ingredients::find($id);
        $ingredient->delete();
        return view('storeingredient');
    }
}
