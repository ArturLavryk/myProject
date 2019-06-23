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
use App\Http\Menagers\OrderMenager;

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
        return view('order' , ['data' => $data]);
    }
    
    
    public function createOrder (Request $request) {
        if(Auth::check()){
            $menager = new OrderMenager();
            $order = $menager->createOrder($request->idCanteen, $request->time, Auth::id());
            $menager->createMealOrder($request->meal, $order->id);
            if (isset($request->option)){
               $menager->createOrderOptions($request->option, $order->id);
            }
            return redirect('success');
        } 
        else {
            return redirect('register');
        }
    }
    
    
    public function boxMeal(){
        
        if(Auth::id()){
            $order = new Order();
            $data = $order->getUserOrder(Auth::id());
            if (isset($data[0]->id)){
                $mealOrder = new MealOrder();
                $idMeal = $mealOrder->getIdMeal($data[0]->id);
                $optionOrder = new OrderOptions();
                $optOrd = $optionOrder->getIdOption($data[0]->id);
                $menager = new OrderMenager();
                $datas['meal'] = $menager->getMeal($idMeal);
                $datas['option'] = $menager->getOption($optOrd);
                $datas['price'] = $menager->getPrice();
                $datas['order'] = $data[0]->id;
                return view('box', ['data'=>$datas]);
            } else {
                return redirect('selectCanteen');    
            }
        } else {
            return redirect('selectCanteen');    
        }
    }
    
    
    public function enter(Request $request){
        $order = Order::find($request->orderId);
        $order->status = 2;
        $order->save();
        return redirect('selectCanteen');
    }
    
    
    public function getOrder(){
        if(Auth::check()){
                $order = Order::where('id_user', Auth::id())->where('status', 2)->get();
                $num = 0;
                $menager = new OrderMenager();
                foreach ($order as $ord){
                    
                    $mealOrder = new MealOrder();
                    $idMeal = $mealOrder->getIdMeal($ord->id);
                    $data['meal'][$num] = $menager->getMeal($idMeal);
                    $optionOrder = new OrderOptions();
                    $optOrd = $optionOrder->getIdOption($ord->id);
                    $data['option'][$num] = $menager->getOption($optOrd);
                    $num++;
                   
                }
                var_dump($data['option'][0][0]->name);
             //var_dump($data['option'][0][1]->name);
            
            //$data['price'] = $menager->getPrice();
            
           // return view('myOrders',['data' => $data]);
        } else {
            //return redirect('login');    
        }
    }
    
}
