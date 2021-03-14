<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;


class PageController extends Controller
{
    public function index(){
        return view('dashboard.page')->with('pages',Page::all());
    }

    public function show($slug){
        return view('page.show')->with('page',Page::where('slug', $slug)->firstOrFail());
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required'
        ]);
        Page::create($request->all());
        return redirect()->back()->with('success', 'Stránka bola úspešne vytvorená');
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'title' => 'required'
        ]);

        $page = Page::findOrFail($id);
        $page->update($request->all());

        return redirect()->back()->with('success', 'Stránka bola úspešne aktualizovaná');
    }

    public function destroy($id){
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->back()->with('success', 'Stránka bola úspešne vymazaná');
    }
}
