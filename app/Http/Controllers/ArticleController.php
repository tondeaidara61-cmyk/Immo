<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Specification;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $articles = Article::latest()->paginate(10);
        return view('admin.fonctionnalite.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = [
            'Abidjan',
            'Yamoussoukro',
            'Bouaké',
            'Daloa',
            'San-Pédro',
            'Korhogo',
            'Man',
            'Divo',
            'Gagnoa',
            'Abengourou',
            'Anyama',
            'Agboville',
            'Grand-Bassam',
            'Dabou',
            'Bondoukou',
            'Séguéla',
            'Bouna',
            'Odienné',
            'Soubré',
            'Aboisso',
        ];

        $communes = [
            ' Abobo',
            'Adjamé',
            'Attécoubé',
            'Cocody',
            'Koumassi',
            'Marcory',
            'Plateau',
            'Port-Bouët',
            'Treichville',
            'Yopougon',
            'Bingerville',
            'Songon',
            'Anyama',
             'Yamoussoukro',
            'Bouaké',
            'Daloa',
            'San-Pédro',
            'Korhogo',
            'Man',
            'Divo',
            'Gagnoa',
            'Abengourou',
            'Anyama',
            'Agboville',
            'Grand-Bassam',
            'Dabou',
            'Bondoukou',
            'Séguéla',
            'Bouna',
            'Odienné',
            'Soubré',
            'Aboisso',
        ];

        $specifications = Specification::all();

        return view('admin.fonctionnalite.articles.create', compact('villes', 'communes', 'specifications'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'title' => 'required|string|max:255',
                'surface' => 'required|numeric|min:1',
                'prix' => 'required|numeric|min:1',
                'piece' => 'required|integer|min:1',
                'chambre' => 'required|integer|min:0',
                'etage' => 'nullable|integer|min:0',
                'ville' => 'required|string',
                'commune' => 'required|string',
                'quatier' => 'nullable|string|max:255',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'description' => 'nullable|string',
                'images' => 'nullable|array',
                'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
                'specifications' => 'nullable',
                'specifications.*' => 'exists:specifications,id',
            ],
            [
                'required' => 'Ce champ est obligatoire.',
                'numeric' => 'Ce champ doit être un nombre.',
                'integer' => 'Ce champ doit être un nombre entier.',
                'max' => 'Ce champ dépasse la longueur ou la taille autorisée.',
                'min' => 'Ce champ ne respecte pas la valeur minimale requise.',
                'image' => 'Le fichier doit être une image.',
                'mimes' => 'Le format accepté est : jpg, jpeg, png, webp.',
                'exists' => 'Une spécification sélectionnée est invalide.'
            ]
        );

        $imagePath = $request->file('image')->store('articles', 'public');

        $article =  Article::create(
            [
                'title' => $validation['title'],
                'surface' => $validation['surface'],
                'piece' => $validation['piece'],
                'ville' => $validation['ville'],
                'commune' => $validation['commune'],
                'etage' => $validation['etage'],
                'quatier' => $validation['quatier'],
                'chambre' => $validation['chambre'],
                'description' => $validation['description'],
                'prix' => $validation['prix'],
                'image' => $imagePath,
            ]
        );

        $article->Specifications()->sync($validation['specifications'] ?? []);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('articles/galerie', 'public');

                $article->galeries()->create([
                    'chemin' => $path,
                    'ordre' => $index,
                ]);
            }
        }

        return redirect()->route('articles.create')->with('success', 'Article ajouté avec succès.');
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
    public function edit(Article $article)
    {

         $villes = [
            'Abidjan',
            'Yamoussoukro',
            'Bouaké',
            'Daloa',
            'San-Pédro',
            'Korhogo',
            'Man',
            'Divo',
            'Gagnoa',
            'Abengourou',
            'Anyama',
            'Agboville',
            'Grand-Bassam',
            'Dabou',
            'Bondoukou',
            'Séguéla',
            'Bouna',
            'Odienné',
            'Soubré',
            'Aboisso',
        ];

        $communes = [
            ' Abobo',
            'Adjamé',
            'Attécoubé',
            'Cocody',
            'Koumassi',
            'Marcory',
            'Plateau',
            'Port-Bouët',
            'Treichville',
            'Yopougon',
            'Bingerville',
            'Songon',
            'Anyama',
             'Yamoussoukro',
            'Bouaké',
            'Daloa',
            'San-Pédro',
            'Korhogo',
            'Man',
            'Divo',
            'Gagnoa',
            'Abengourou',
            'Anyama',
            'Agboville',
            'Grand-Bassam',
            'Dabou',
            'Bondoukou',
            'Séguéla',
            'Bouna',
            'Odienné',
            'Soubré',
            'Aboisso',
        ];

         $specifications = Specification::all();

    return view('admin.fonctionnalite.articles.edit', compact('article', 'villes', 'communes', 'specifications'));
    }

    /**
     * Update the specified resource in storage.
     */
   
public function update(Request $request, Article $article)
{
    $validation = $request->validate(
        [
            'title' => 'required|string|max:255',
            'surface' => 'required|numeric|min:1',
            'prix' => 'required|numeric|min:1',
            'piece' => 'required|integer|min:1',
            'chambre' => 'required|integer|min:0',
            'etage' => 'nullable|integer|min:0',
            'ville' => 'required|string',
            'commune' => 'required|string',
            'quatier' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
            'specifications' => 'nullable|array',
            'specifications.*' => 'exists:specifications,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ],
        [
            'required' => 'Ce champ est obligatoire.',
            'numeric' => 'Ce champ doit être un nombre.',
            'integer' => 'Ce champ doit être un nombre entier.',
            'max' => 'Ce champ dépasse la longueur ou la taille autorisée.',
            'min' => 'Ce champ ne respecte pas la valeur minimale requise.',
            'image' => 'Le fichier doit être une image.',
            'mimes' => 'Le format accepté est : jpg, jpeg, png, webp.',
            'exists' => 'Une spécification sélectionnée est invalide.',
        ]
    );

    // Remplace l'image principale seulement si une nouvelle a été envoyée
    if ($request->hasFile('image')) {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        $validation['image'] = $request->file('image')->store('articles', 'public');
    } else {
        unset($validation['image']); // garde l'ancienne image si aucune nouvelle n'est envoyée
    }

    $article->update([
        'title' => $validation['title'],
        'surface' => $validation['surface'],
        'piece' => $validation['piece'],
        'ville' => $validation['ville'],
        'commune' => $validation['commune'],
        'etage' => $validation['etage'],
        'quatier' => $validation['quatier'],
        'chambre' => $validation['chambre'],
        'description' => $validation['description'],
        'prix' => $validation['prix'],
        'image' => $validation['image'] ?? $article->image,
    ]);

    $article->specifications()->sync($validation['specifications'] ?? []);

    if ($request->hasFile('images')) {
        $lastOrdre = $article->galeries()->max('ordre') ?? -1;

        foreach ($request->file('images') as $index => $image) {
            $path = $image->store('articles/galerie', 'public');

            $article->galeries()->create([
                'chemin' => $path,
                'ordre' => $lastOrdre + $index + 1,
            ]);
        }
    }

    return redirect()->route('articles.edit', $article->id)->with('success', 'Article modifié avec succès.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
         $article->delete();

    return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès.');
    }
}
