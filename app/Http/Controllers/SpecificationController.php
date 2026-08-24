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
    $specifications = Specification::latest()->paginate(10);

    return view('admin.fonctionnalite.specifications.index', compact('specifications'));
}
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.fonctionnalite.specifications.create');
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


        public function edit(Specification $specification)
        {
            return view('admin.fonctionnalite.specifications.edit', compact('specification'));
        }

        public function update(Request $request, Specification $specification)
        {
            $validation = $request->validate(
                [
                    'name' => 'required|string|max:255|unique:specifications,name,' . $specification->id,
                    'icon' => 'nullable|string|max:255',
                ],
                [
                    'required' => 'Ce champ est obligatoire.',
                    'unique' => 'Cette spécification existe déjà.',
                    'max' => 'Ce champ dépasse la longueur autorisée.',
                ]
            );

            $specification->update($validation);

            return redirect()->route('specifications.index')->with('success', 'Spécification modifiée avec succès.');
        }

        public function destroy(Specification $specification)
        {
            $specification->delete();

            return redirect()->route('specifications.index')->with('success', 'Spécification supprimée avec succès.');
        }
}
