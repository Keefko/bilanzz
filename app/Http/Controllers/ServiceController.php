<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function index()
    {
        return view('dashboard.services')->with('services', Service::all());
    }


    public function store(Request $request)
    {
        $service = new Service();
        $service->icon = $request->input('icon');
        $service->title = $request->input('title');
        $service->text = $request->input('text');
        $service->slug = str_replace(" ", '-', strtolower($request->input('title')));
        $service->button_text = $request->input('button_text');
        $service->button_url = $request->input('button_url');
        $service->calc= $request->input('calc');
        $service->others= $request->input('others');
        $service->journey= $request->input('journey');

        if($request->hasFile('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $service->img = $filename;
        }
        return redirect()->back()->with('success', 'Služba úspešne pridaná');
    }


    public function show($slug)
    {
        return view('service.show')->with('service',Service::where('slug', $slug)->firstOrFail());
    }


    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->update($request->all());
        return redirect()->back()->with('success', 'Služba úspešne aktualizovaná');
    }


    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        $service->delete();
        return redirect()->back()->with('success', 'Služba úspešne zmazaná');
    }
}
