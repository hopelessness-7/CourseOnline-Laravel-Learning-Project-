<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Record;

class CheckController extends Controller
{
    public function index()
    {
        $recordAll = Record::latest()->paginate(5);
        return view('admin.check.index', compact('recordAll'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(Record $record,$id)
    {
        $record = Record::find($id);
        return view('admin.check.edit',compact('record'));
    }

    public function update(Request $request, $id)
    {
        $record = Record::find($id);
        request()->validate([
            'status' => 'required',
        ]);

        $record->update($request->all());

        return redirect()->route('checks.index')
                        ->with('success','Задание успешно проверено');
    }

    public function destroy($id)
    {
        //
    }
}
