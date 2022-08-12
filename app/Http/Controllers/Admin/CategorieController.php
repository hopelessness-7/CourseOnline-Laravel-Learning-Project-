<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CategorieController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:categorie-list|categorie-create|categorie-edit|categorie-delete', ['only' => ['index','show']]);
         $this->middleware('permission:categorie-create', ['only' => ['create','store']]);
         $this->middleware('permission:categorie-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:categorie-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = Categorie::all();

        return view('admin.categories.index', compact('categories'))
                ->with('i',(request()->input('page',1)-1)*5);

    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        Categorie::create($request->all());


        return redirect()->route('categories.index')
                        ->with('success','Категория успешно создана');

    }

    public function show($id)
    {
        $categorie = Categorie::find($id);
        return view('admin.categories.show',compact('categorie'));
    }

    public function edit($id)
    {
        $categorie = Categorie::find($id);
        return view('admin.categories.edit',compact('categorie'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $input = $request->all();

        $categorie = Categorie::find($id);

        $categorie->update($input);

        return redirect()->route('categories.index')
                        ->with('success','Категория успешно обновлена');
    }

    public function destroy($id)
    {
        DB::table("categories")->where('id',$id)->delete();
        return redirect()->route('categories.index')
                        ->with('success','Категория удалена успешно');
    }
}
