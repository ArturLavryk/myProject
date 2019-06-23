<?php

namespace App\Http\Services;

use App\Canteen;
use App\CanteenMeals;
use App\Meal;
use App\Options;

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

}