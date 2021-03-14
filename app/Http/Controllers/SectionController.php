<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Section;

class SectionController extends Controller
{
    public function index(){
        return view('dashboard.admin')->with('sections', Section::all());
    }

    public function update(SectionRequest $request, $id){
        $section = Section::findOrFail($id);
        $section->update($request->all());
        return redirect()->back()->with('success', 'Sekcia úspešne aktualizovaná');
    }
}
