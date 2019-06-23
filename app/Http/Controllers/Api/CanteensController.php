<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\CanteensService;

class CanteensController extends Controller {
    

    protected $_service;

    public function __construct() {
        $this->_service = new CanteensService();
    }

    /**
     * GET METHOD
     */
    public function canteens() {
        $result = Response()->json($this->_service->getAll());
        return $result;
    }
    
    public function meals($canteenId = 0){
        if($canteenId !=0){
        $result = Response()->json($this->_service->getMeal($canteenId));
        } else {
        $result = Response()->json($this->_service->meal());    
        }
        if(!empty($result)){
            return $result;
        }else {
            return "Ta jadalnia nie posiada jeszcze potraw";
        }
    }
    
    public function options(){
        $result = Response()->json($this->_service->getOptions());
        return $result;
    }

}