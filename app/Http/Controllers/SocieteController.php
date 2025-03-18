<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Societe;

class SocieteController extends Controller
{
    public function index()
    {
        $societes = Societe::all();
        return view('admin.societes.index', compact('societes'));
    }

    public function create()
    {
        return view('admin.societes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:societes',
            'telephone' => 'required|string|max:20',
        ]);

        Societe::create($request->all());

        return redirect()->route('societes.index')->with('success', 'Société ajoutée avec succès.');
    }

    public function show(Societe $societe)
    {
        return view('admin.societes.show', compact('societe'));
    }

    public function edit(Societe $societe)
    {
        return view('admin.societes.edit', compact('societe'));
    }

    public function update(Request $request, Societe $societe)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:societes,email,' . $societe->id,
            'telephone' => 'required|string|max:20',
        ]);

        $societe->update($request->all());

        return redirect()->route('societes.index')->with('success', 'Société mise à jour avec succès.');
    }

    public function destroy(Societe $societe)
    {
        $societe->delete();
        return redirect()->route('societes.index')->with('success', 'Société supprimée avec succès.');
    }
}
