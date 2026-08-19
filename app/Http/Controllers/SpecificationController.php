<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specification;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.fonctionnalite.specifications.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   
public function store(Request $request)
{
    $validation = $request->validate(
        [
            'name' => 'required|string|max:255|unique:specifications,name',
          
        ],
        [
            'required' => 'Ce champ est obligatoire.',
            'unique' => 'Cette spécification existe déjà.',
            'max' => 'Ce champ dépasse la longueur autorisée.',
        ]
    );

    Specification::create($validation);

    return redirect()->route('specifications.index')->with('success', 'Spécification ajoutée avec succès.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
