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

        $page = new Page();
        $page->title = $request->input('title');
        $page->slug = str_replace(" ", '-', strtolower($request->input('title')));
        $page->text = $request->input('text');

        if($request->hasFile('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $page->img = $filename;
        }

        $page->save();
        return redirect()->back()->with('success', 'Stránka bola úspešne vytvorená');
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'title' => 'required'
        ]);

        $page = Page::findOrFail($id);
        $page->title = $request->input('title');
        $page->slug = str_replace(" ", '-', $request->input('title'));
        $page->text = $request->input('text');


        if($request->hasFile('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $page->img = $filename;
        }

        return redirect()->back()->with('success', 'Stránka bola úspešne aktualizovaná');
    }

    public function destroy($id){
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->back()->with('success', 'Stránka bola úspešne vymazaná');
    }
}
