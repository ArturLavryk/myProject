<?php

namespace App\Http\Services;

use App\Canteen;
use App\CanteenMeals;
use App\Meal;
use App\Options;
use App\MealOrder;
use App\OrderOptions;

class CanteensService  {

    public function getAll() {

        return Canteen::all();

    }
    
    public function getMeal($id){
        $mealId = CanteenMeals::where('id_canteen', $id)->get();
        if(!empty($mealId)){
            $num = 0;
            foreach ($mealId as $m){
                $meal[$num] = Meal::find($m->id_meals);
                $num++;
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
            $optOrd->save();
        }
    }

}