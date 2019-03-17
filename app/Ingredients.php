<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    public $meal;
    
    
    public function setMeal(){
        $this->meal = App\Meal::find($this->meal_id);
    }  
}
