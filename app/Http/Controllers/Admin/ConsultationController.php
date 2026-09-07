<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index(Request $request)
    {
        $query = Consultation::query();

        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('q')) {
            $search = trim($request->input('q'));
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('telepon', 'like', "%{$search}%")
                    ->orWhere('bisnis', 'like', "%{$search}%")
                    ->orWhere('kebutuhan', 'like', "%{$search}%");
            });
        }

        $consultations = $query->latest()->paginate(15)->withQueryString();

        $statusCounts = [
            'all' => Consultation::count(),
            'baru' => Consultation::where('status', 'baru')->count(),
            'dihubungi' => Consultation::where('status', 'dihubungi')->count(),
            'selesai' => Consultation::where('status', 'selesai')->count(),
        ];

        return view('admin.consultations.index', compact('consultations', 'statusCounts'));
    }

    public function show(Consultation $consultation)
    {
        return view('admin.consultations.show', compact('consultation'));
    }

    public function updateStatus(Request $request, Consultation $consultation)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:baru,dihubungi,selesai,dibatalkan',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $consultation->update($validated);

        return back()->with('success', "Status konsultasi dari '{$consultation->nama}' berhasil diperbarui.");
    }

    public function destroy(Consultation $consultation)
    {
        $name = $consultation->nama;
        $consultation->delete();

        return redirect()->route('admin.consultations.index')
            ->with('success', "Data konsultasi dari '{$name}' telah dihapus.");
    }
}
