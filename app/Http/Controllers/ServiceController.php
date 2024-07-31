<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $services = Service::all();
        return view('service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $services = ['Online', 'Offline'];
        $pakets = [
            'Paket A (1 mapel, konseling private)',
            'Paket B (2 mapel, konseling private, robo guru)',
            'Paket C (3 mapel, konseling private, robo guru, ruang belajar, kelas elite)'
        ];
        $kelas = ['10', '11', '12'];

        return view('service.create', compact('services', 'pakets', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'service' => 'required|string',
            'email' => 'required|email|unique:services,email',
            'kelas' => 'required|string',
            'paket' => 'required|string',
        ]);

        Service::create($request->only('service', 'email', 'kelas', 'paket'));

        return redirect()->route('services.index')->with('success', 'Service added successfully!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $services = ['Online', 'Offline'];
        $pakets = [
            'Paket A (1 mapel, konseling private)',
            'Paket B (2 mapel, konseling private, robo guru)',
            'Paket C (3 mapel, konseling private, robo guru, ruang belajar, kelas elite)'
        ];
        $kelas = ['10', '11', '12'];

        return view('service.edit', compact('service', 'services', 'pakets', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'service' => 'required|string',
            'email' => 'required|email',
            'kelas' => 'required|string',
            'paket' => 'required|string',
        ]);

        $service = Service::findOrFail($id);
        $service->update($request->only('service', 'email', 'kelas', 'paket'));

        Log::info('Service updated, redirecting with success message.');

        return redirect()->route('services.index')->with('update', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete(); // Prefer delete() over destroy() for consistency

        return redirect()->route('services.index')->with('delete', 'Data deleted successfully!!');
    }
}
