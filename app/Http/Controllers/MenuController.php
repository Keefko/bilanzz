<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;


class MenuController extends Controller
{
    public function index(){
        return view('dashboard.menu')->with('menus', Menu::all());
    }

    public function store(MenuRequest $request){
        Menu::create($request->all());
        return redirect()->back()->with('success', 'Odkaz úspešne pridaný');
    }

    public function update(MenuRequest $request, $id){
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());
        return redirect()->back()->with('success', 'Odkaz úspešne aktualizovaný');
    }

    public function destroy($id){
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->back()->with('success', 'Odkaz úspešne zmazaný');
    }
}
