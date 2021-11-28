<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Race;
use App\Models\Animal;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'patients' => Patient::all()
        ];
        return view('dashboard.patients.index' , $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
        $data = [
            'patient' => $patient,
            'animals' => Animal::all(),
            'races' => Race::all()
        ];

        return view('dashboard.patients.edit' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //

        $data = [
            'owner' => 'required|max:255',
            'address' => 'required',
            'animal_id' => 'required',
            'pet_name' => 'required|max:255',
            'age' => 'required',
            'gender' => 'required|max:50',
            'race_id' => 'required'
        ];

        if($request->slug != $patient->slug){
            $data['slug'] = 'required|unique:patients';
        }
        
        $finalData = $request->validate($data);

        Patient::where('id' , $patient->id)->update($finalData);

        return redirect('dashboard/patients')->with('success' , 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
        $data = Patient::where('slug' , $patient->slug);

        $delete = $data->delete();
        
        if($delete > 0){
            Alert::success('Berhasil', 'Data Berhasil Dihapus');
            return redirect('dashboard/patients')->with('success');
        }
    }
}
