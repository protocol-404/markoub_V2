<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Navette;
use App\Models\Abonnement;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $navettes = Navette::where('places_disponibles', '>', 0)->get();
        return view('users.index', compact('navettes'));
    }

    public function sabonner($id)
    {
        $user = Auth::user();
        // dd($user->id);
        $navette = Navette::findOrFail($id);

        if (Abonnement::where('user_id', $user->id)->where('navette_id', $id)->exists()) {
            return redirect()->route('navettes.index')->with('error', 'Vous êtes déjà abonné à cette navette.');
        }

        Abonnement::create([
            'user_id' => $user->id,
            'navette_id' => $id,
            'status' => 'en attente',
        ]);

        return redirect()->route('navettes.index')->with('success', 'Votre abonnement est en attente de validation.');
    }

    public function myAbonnement()
    {
        $user = Auth::user();
        $abonnements = Abonnement::where('user_id', $user->id)->with('navette')->get();
        // dd($abonnements);
        return view('users.myAbonnements', compact('abonnements'));
    }

    public function annuler($id)
    {
        $abonnement = Abonnement::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($abonnement->status !== 'en attente') {
            return redirect()->route('abonnements.all')->with('error', 'Vous ne pouvez pas annuler un abonnement confirmé.');
        }

        $abonnement->delete();

        return redirect()->route('abonnements.all')->with('success', 'Votre abonnement a été annulé.');
    }
}
