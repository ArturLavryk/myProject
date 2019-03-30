<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanteenMeals extends Model
{
    public $meal;
    
    
    public function getMeal ($canteenId) {
        $this->meal = CanteenMeals::where('id_canteen' ,'=', $canteenId)->get(); 
        return $this->meal;
    }
}
