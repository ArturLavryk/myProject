<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Canteen;
use Illuminate\Support\Facades\Auth;
use App\CanteenMeals;
use App\Meal;
use App\Options;
use App\Order;
use App\MealOrder;
use App\OrderOptions;


class OrderController extends Controller
{
    
public function selectCanteen (){
        $num=0;
        $canteen = Canteen::all();
            foreach ($canteen as $canteens){        
            $data[$num]=$canteens;
            $num++;
            }
        return view('select' , ['data'=>$data]);
        }
        
        
public function selectCanteenMeals ($id){

   $mymeals = new CanteenMeals();
   $mealsId = $mymeals->getMeal($id);
   //var_dump($meals[3]->id_meals);

   $obMeal = new Meal();
  // var_dump($obMeal->getMeals($mealsId));
   $num = 0;
  foreach ($obMeal->getMeals($mealsId) as $table){
   $data['meal'][$num] = $table;
   $num++;
  }
  //var_dump($data['meal'][0]->description);
  $data['options'] = Options::all();
  //var_dump($data['options']); 
  $data['id_canteen'][0] = $id;
  return view('order' , ['data'=>$data]);
    }
    
    
    public function createOrder (Request $request) {
     
        $order = new Order();
        $order->id_canteen = $request->idCanteen;
        $order->id_user = Auth::id();
        $order->status = 1;
        $order->time = $request->time;
        $order->save();
        
        foreach ($request->meal as $meal){
            $mealOrder = new MealOrder();
            $mealOrder->id_meal = $meal;
            $mealOrder->id_order = $order->id;
            $mealOrder->save();
        }
        if (isset($request->option)){
        foreach ($request->option as $options){
            $opt = new OrderOptions();
            $opt->id_order = $order->id;
            $opt->id_options = $options;
            $opt->save();
                    
        }
        }
        return view('order');
        //var_dump($order->id);
    }
    
}
