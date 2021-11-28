<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\Animal;
use App\Models\Patient;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class DataController extends Controller
{
    //
    public function index()
    {
        

        $data = [
            'animals' => Animal::all(),
            'races' => Race::all(),
            
        ];
        
        return view('index' , $data);
    }


    public function store(Request $request)
    {
        $data = [
            'owner' => 'required|max:255',
            'address' => 'required',
            'animal_id' => 'required',
            'pet_name' => 'required|max:255',
            'age' => 'required',
            'gender' => 'required|max:50',
            'race_id' => 'required',
            'slug' => 'required|unique:patients'
        ];

        

        $finalData = $request->validate($data);

        $input = Patient::create($finalData);

        

        
        if($input){
            Alert::success('Berhasil', 'Daftar Berhasil');
            return redirect('/')->with('success');
        }
    }
}
