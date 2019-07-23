<?php

namespace App\Http\Services;

use App\Canteen;
use App\CanteenMeals;
use App\Meal;
use App\Options;
use App\MealOrder;
use App\OrderOptions;
use App\Order;
use Illuminate\Support\Facades\DB;

class CanteensService  {

    public function getAll($id) {
        if($id == 0){
            return Canteen::all();
        }
        else {
            $canteen = Canteen::find($id);
            if($canteen != null){
                return $canteen;
            }else{
                return null;
            }
        }
    }
    
    
    public function getMeal($id){
        $mealId = CanteenMeals::where('id_canteen', '=', $id)->get();
    
        if(isset($mealId[0])){
            foreach ($mealId as $m){
                $meal[] = Meal::find($m->id_meals);
                $meal['id_canteen'] = $id;
            }
            return $meal;
        } else {
            return null;    
        }
    }
    
    
    public function meal(){
        $meal = Meal::all();
        
        return $meal;
    }

    public function getOptions(){
            $optOrd->save();
        $options = Options::all();
        if(!empty($options)){
            return $options;
        }else{
            return nullValue();
        }
    }
    
    public function mealOrder($meal, $idOrd){
        $order = new MealOrder();
        foreach ($meal as $m){
            $order->id_meal = $meal->id_meal;
            $order->id_order = $idOrd;
            $order->save();
        }
        if(!empty($order->id)){
            return "success";
        } 
    }
    
    public function mealOptions($options, $idOrd){
        $optOrd = new OrderOptions();
        foreach ($options as $opt){
            $optOrd->id_options = $opt->id_options;
            $optOrd->id_order = $opt->id_order;
        }
    }
    
    public function getBox($user){
        $order = Order::where('id_user','=', $user, 'and')->where('status','=', 1)->get();
        foreach ($order as $simple){
        $data['meals'] = $this->boxMeals($simple->id);
        //$data['options'] = $this->boxOptions($simple->id);
        $data['order'] = $simple->id;
        }
        if(isset($data)){
            return $data;
        }else{
            return null;
        }
    }
    
    public function boxMeals($idOrder){
        $mealOrdId = MealOrder::where('id_order', '=', $idOrder)->get();
        foreach ($mealOrdId as $mealId){
            $meal[] = Meal::find($mealId->id_meal);
        }
        return $meal;
    }
    
    public function boxOptions($idOrder){
        $optionOrder = OrderOptions::where('id_order', '=', $idOrder)->get();
        foreach ($optionOrder as $optionsId){
            $options[] = Options::find($optionsId->id_options);
        }
        return $options;
    }
    
    public function mealCanteen($id) {
        $ids = CanteenMeals::where('id_canteen', '=', $id)->get();
        $meals = array();
        
        foreach ($ids as $idmeal) {
            $meals[] = Meal::find($idmeal->id_meals);
        }
        
        if(isset($meals)){
            return $meals;
        }
        return null;
        
    }

}