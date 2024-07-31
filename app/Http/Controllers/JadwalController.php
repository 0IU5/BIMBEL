<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::where('id_user', Auth::id())->get();
        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $pakets = [
            'Paket A (1 mapel, konseling private)',
            'Paket B (2 mapel, konseling private, robo guru)',
            'Paket C (3 mapel, konseling private, robo guru, ruang belajar, kelas elite)'
        ];
        return view('jadwal.create', compact('pakets'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'paket' => 'required|string',
            'start_time' => 'required|date_format:Y-m-d H:i|after_or_equal:now',
            'end_time' => 'required|date_format:Y-m-d H:i|after:start_time',
        ]);

        // Tambahkan id_user dari user yang sedang login
        $validated['id_user'] = Auth::id();

        // Jika validasi berhasil, simpan jadwal
        Jadwal::create($validated);

        return redirect()->route('jadwals.index')->with('success', 'Timetable added successfully!!');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $pakets = [
            'Paket A (1 mapel, konseling private)',
            'Paket B (2 mapel, konseling private, robo guru)',
            'Paket C (3 mapel, konseling private, robo guru, ruang belajar, kelas elite)'
        ];
        return view('jadwal.edit', compact('jadwal', 'pakets'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'paket' => 'required|string|max:255',
            'start_time' => 'required|date_format:Y-m-d H:i|after_or_equal:now',
            'end_time' => 'required|date_format:Y-m-d H:i|after:start_time',
        ]);

        $jadwal = Jadwal::findOrFail($id);

        // Update the jadwal with the validated data
        $jadwal->update($validated);

        return redirect()->route('jadwals.index')->with('success', 'Timetable updated successfully!!');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        // Hapus jadwal jika milik pengguna yang sedang login
        if ($jadwal->id_user === Auth::id()) {
            $jadwal->delete();
            return redirect()->route('jadwals.index')->with('delete', 'Timetable deleted successfully!!');
        } else {
            return redirect()->route('jadwals.index')->with('error', 'Unauthorized action.');
        }
    }
}
