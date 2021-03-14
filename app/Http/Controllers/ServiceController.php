<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function index()
    {
        return view('dashboard.service')->with('services', Service::all());
    }


    public function store(Request $request)
    {
       Service::create($request->all());
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
