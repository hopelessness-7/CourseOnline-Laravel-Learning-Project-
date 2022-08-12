<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserCategorieController extends Controller
{

    public function index($id)
    {
        $categorie = Categorie::find($id);
        return view('user.categories.index', compact('categorie'));
    }

}
