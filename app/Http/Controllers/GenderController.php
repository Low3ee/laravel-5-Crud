<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Validator;

class GenderController extends Controller
{

    public function index()
    {
        $genders = Gender::all();
        return view(compact('genders'));
    }

    public function show($id)
    {
        $gender = Gender::find($id);
        return view(compact('gender'));
    }
}
