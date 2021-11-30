<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function race() {
        $race = Race::where('animal_id', request('id'))->get();

        return $race;
    }
}
