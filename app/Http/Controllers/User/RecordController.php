<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Record;


class RecordController extends Controller
{
    public function update(Request $request, $id)
    {
        request()->validate([
            'reply' => 'required',
        ]);

        $record = Record::find($id);

        $record->status = '1';

        $record->reply = $request->input('reply');

        $record->save();

        return redirect()->back()->with('success','Ответ отправлен');;
    }
}
