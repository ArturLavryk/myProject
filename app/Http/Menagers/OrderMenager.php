<?php
namespace App\Http\Menagers;

use App\Meal;
use App\Options;
use App\Order;

class OrderMenager {
    private $meal;
    private $option;
    private $price;


    
    
    public function getMeal($idMeal){
       
        $num = 0;
            foreach ($idMeal as $myId){
 
                $this->meal[$num] = Meal::find($myId->id_meal);
               
                 $num++;
           }
           // var_dump($myId->id_meal);
           return $this->meal;
    }
    
    
    
    public function getOption($optOrd){
            foreach ($optOrd as $opt){
                $this->option[] = Options::find($opt->id_options);
           }
           return $this->option;
    }
    
    
    public function getPrice(){

        foreach ($this->meal as $val){
            $this->price += intval($val->price); 
        }
        foreach ($this->option as $opt){
            $this->price += $opt->price;
        }
        return $this->price;
        
    }
    
    
    
    
}
