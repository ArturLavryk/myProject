<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    
    public $meals;
    
    public function getMeals($id){
        $num = 0;
        foreach ($id as $idMeal){
            $this->meals[$num] = Meal::find($idMeal->id_meals);
            $num++;
        }
        return $this->meals;
        
    }
}
