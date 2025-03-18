<?php
namespace App\Http\Controllers;

use App\Models\Navette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class NavetteController extends Controller
{

    public function index()
    {
       $societeId = Auth::user()->id;
        $navettes = Navette::where('societe_id', $societeId)->get();

        return view('societes.navettes.index', compact('navettes'));
    }


    public function create()
    {
        return view('societes.navettes.create');
    }

 public function store(Request $request)
{
    $request->validate([
        'ville_depart' => 'required|string',
        'ville_arrivee' => 'required|string',
        'date_debut' => 'required|date',
        'date_fin' => 'required|date',
        'heure_depart' => 'required',
        'heure_arrivee' => 'required',
        'places_disponibles' => 'required|integer|min:1',
        'description' => 'nullable|string',
        'logo' => 'nullable|url',
    ]);

    if (Auth::user()->role !== 'societe') {
        return redirect()->back()->with('error', 'Vous n\'avez pas la permission de créer une navette.');
    }

    Navette::create([
        'societe_id' => Auth::user()->id,
        'ville_depart' => $request->ville_depart,
        'ville_arrivee' => $request->ville_arrivee,
        'date_debut' => $request->date_debut,
        'date_fin' => $request->date_fin,
        'heure_depart' => $request->heure_depart,
        'heure_arrivee' => $request->heure_arrivee,
        'places_disponibles' => $request->places_disponibles,
        'description' => $request->description,
        'logo' => $request->logo, // Save the logo URL
    ]);


    return redirect()->route('societes.navettes.index')->with('success', 'Navette créée avec succès.');
}



    public function edit(Navette $navette)
    {
        if ($navette->societe_id != Auth::user()->id) {
            // abort(403, 'Accès non autorisé');
        }

        return view('societes.navettes.edit', compact('navette'));
    }


    public function update(Request $request, Navette $navette)
    {
        if ($navette->societe_id !== Auth::user()->id) {
            abort(403, 'Accès non autorisé');
        }

        $request->validate([
            'ville_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'heure_depart' => 'required',
            'heure_arrivee' => 'required',
            'places_disponibles' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'logo' => 'nullable|url',
        ]);

        $navette->update([
            'ville_depart' => $request->ville_depart,
            'ville_arrivee' => $request->ville_arrivee,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'heure_depart' => $request->heure_depart,
            'heure_arrivee' => $request->heure_arrivee,
            'places_disponibles' => $request->places_disponibles,
            'description' => $request->description,
            'logo' => $request->logo,
        ]);

        return redirect()->route('societes.navettes.index')->with('success', 'Navette mise à jour avec succès.');
    }

    public function destroy(Navette $navette)
    {
        if ($navette->societe_id !== Auth::user()->id) {
            abort(403, 'Accès non autorisé');
        }

        $navette->delete();

        return redirect()->route('societes.navettes.index')->with('success', 'Navette supprimée avec succès.');
    }
}
