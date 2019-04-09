<?php

namespace App\Http\Services;

use App\Canteen;

class CanteensService  {

    public function getAll() {

        return Canteen::all();

    }

}