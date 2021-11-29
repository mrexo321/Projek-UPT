<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function animal() {
        $animal = Animal::all();

        return $animal;
    }
}
