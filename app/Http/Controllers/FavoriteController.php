<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FavoriteController extends Controller
{
    // Liste des favoris de l'utilisateur
    public function index()
    {
        $user = Auth::user();
        $favorites = $user->favorites()
            ->orderByDesc('pivot_created_at')
            ->paginate(12);

        return view('dashboard.favorites', compact('favorites'));
    }

    // Ajouter un événement aux favoris
    public function store(Event $event)
    {
        $user = Auth::user();
        $user->favorites()->syncWithoutDetaching([$event->id]);
        return Redirect::back()->with('success', 'Événement ajouté aux favoris.');
    }

    // Retirer un événement des favoris
    public function destroy(Event $event)
    {
        $user = Auth::user();
        $user->favorites()->detach($event->id);
        return Redirect::back()->with('success', 'Événement retiré des favoris.');
    }
}
