<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Categories;
use App\Models\CivilStatus;
use App\Models\Media;

use Illuminate\Support\Facades\DB;

class PersonsController extends Controller
{
    public function getViewPersons() {
        $categories = Categories::all();
        $civilStatus = CivilStatus::all();
        $mediaSystem = Media::all();

        $persons = DB::table('persons')->join('categories', 'persons.category', '=', 'categories.id')->join('civilStatus', 'persons.civil_status', '=', 'civilStatus.id')->join('mediaSystem', 'persons.media', '=', 'mediaSystem.id')->select('persons.*', 'categories.name as category_name', 'civilStatus.name as civil_status_name', 'mediaSystem.name as media_name')->get();
        
        return view('dashboard.persons', [
            'persons' => $persons,
            'categories' => $categories,
            'civilStatus' => $civilStatus,
            'mediaSystem' => $mediaSystem
        ]);
    }
}
