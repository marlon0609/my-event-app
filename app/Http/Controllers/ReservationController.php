<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // Liste des réservations de l'utilisateur connecté
    public function myIndex(Request $request)
    {
        $query = Reservation::with(['event'])
            ->where('user_id', Auth::id())
            ->latest();

        // Filtres simples
        if ($status = $request->get('status')) {
            $query->where('status', $status);
        }
        if ($search = $request->get('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('reference', 'like', "%{$search}%")
                  ->orWhereHas('event', fn($qe) => $qe->where('title', 'like', "%{$search}%"));
            });
        }

        $reservations = $query->paginate(10)->withQueryString();

        return view('dashboard.reservations', compact('reservations'));
    }
}
