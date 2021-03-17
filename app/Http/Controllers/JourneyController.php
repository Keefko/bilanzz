<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    public function index(){
        return view('dashboard.journey')->with('journeys',Journey::all());
    }

    public function store(Request $request){
        Journey::create($request->all());
        return redirect()->back()->with('success', 'Krok úspešne vytvorený');
    }

    public function update(Request $request, $id){
        $journey = Journey::findOrFail($id);
        $this->validate($request, [
            'title' => 'required'
        ]);
        $journey->update($request->all());

        return redirect()->back()->with('success', 'Krok úspešne aktualizovaný');
    }

    public function destroy($id){
        $journey = Journey::findOrFail($id);
        $journey->delete();
        return redirect()->back()->with('success', 'Krok bol zmazaný');
    }
}
