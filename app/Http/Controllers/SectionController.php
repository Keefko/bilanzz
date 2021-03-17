<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Section;

class SectionController extends Controller
{
    public function index(){
        return view('dashboard.sections')->with('sections', Section::all());
    }

    public function update(SectionRequest $request, $id){
        $section = Section::findOrFail($id);
        $section->title = $request->input('title');
        $section->text = $request->input('text');
        $section->button_one_text = $request->input('button_one_text');
        $section->button_one_url = $request->input('button_one_url');
        $section->button_two_text = $request->input('button_two_text');
        $section->button_two_url = $request->input('button_two_url');

        if($request->hasFile('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $section->img = $filename;
        }
        $section->save();
        return redirect()->back()->with('success', 'Sekcia úspešne aktualizovaná');
    }
}
