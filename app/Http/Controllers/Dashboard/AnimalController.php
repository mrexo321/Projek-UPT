<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Error;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.animals.index' , [
            'animals' => Animal::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Animal $animal)
    {
        //
        $data = [
            'name' => 'required|unique:animals',
            'slug' => 'required|unique:animals'
        ];

        

        $finalData = $request->validate($data);

        Animal::create($finalData);

        return redirect('dashboard/animals')->with('success' , 'Hewan Berhasil Ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        //
        $data = [
            'animal' => $animal 
        ];

        return view ('dashboard.animals.edit' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        //
        $data = [
            'name' => 'required|unique:animals'
        ];

        if($request->slug != $animal->slug){
            $data['slug'] = 'required|unique:animals';
        }

        $finalData = $request->validate($data);

        Animal::where('id' , $animal->id)->update($finalData);

        return redirect ('dashboard/animals')->with('success' , 'Data berhasil diubah');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        //
        $hewan = Animal::where('slug' , $animal->slug);
        $hapus = $hewan->delete();

        if($hapus > 0){
            return redirect('dashboard/animals')->with('success' , 'Data Berhasil Dihapus Njing');
        }

        return redirect('dashboard/animals')->with('failed' , 'Data Gagal Dihapus Njing');
    }
}
