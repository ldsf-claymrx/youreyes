<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonsController extends Controller
{
    public function getViewPersons() {
        $persons = Person::all();
        return view('dashboard.persons', [
            'persons' => $persons
        ]);
    }
}
