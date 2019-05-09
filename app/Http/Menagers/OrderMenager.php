<?php
namespace App\Http\Menagers;

use App\Meal;
use App\Options;
use App\Order;
use App\MealOrder;
use App\OrderOptions;

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
    
    public function createOrder($idCanteen, $time, $id){
         $order = new Order();
         $order->id_canteen = $idCanteen;
         $order->id_user = $id;
         $order->status = 1;
         $order->time = $time;
         $order->save();
         return $order;
    }
    
    
    public function createMealOrder($meal, $id){
        foreach ($meal as $meals){
            $mealOrder = new MealOrder();
            $mealOrder->id_meal = $meals;
            $mealOrder->id_order = $id;
            $mealOrder->save();
            }
    }
    
    
    public function createOrderOptions($option, $id){
        foreach ($option as $options){
            $opt = new OrderOptions();
            $opt->id_order = $id;
            $opt->id_options = $options;
            $opt->save();  
        }
    }
    
    
    
    
}
