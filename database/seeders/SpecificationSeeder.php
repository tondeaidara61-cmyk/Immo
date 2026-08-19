<?php

namespace Database\Seeders;

use App\Models\Specification;
use Illuminate\Database\Seeder;

class SpecificationSeeder extends Seeder
{
    public function run(): void
    {
        $specifications = [
            'Piscine',
            'Parking',
            'Climatisation',
            'Ascenseur',
            'Balcon',
            'Terrasse',
            'Jardin',
            'Cour',
            'Cuisine équipée',
            'Garage',
            'Groupe électrogène',
            'Forage / Château d\'eau',
            'Portail automatique',
            'Système de sécurité / Alarme',
            'Caméras de surveillance',
            'Gardiennage',
            'Meublé',
            'Internet / Wifi',
            'Salle de sport',
            'Buanderie',
            'Dressing',
            'Chauffe-eau',
            'Véranda',
            'Vue sur mer',
            'Vue panoramique',
            'Proche école',
            'Proche commerces',
            'Accès goudronné',
        ];

        foreach ($specifications as $specification) {
            Specification::create(['name' => $specification]);
        }
    }
}