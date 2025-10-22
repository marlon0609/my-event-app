<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    // Affichage du tableau de bord Paiements avec historique
    public function dashboard(Request $request)
    {
        $transactions = Transaction::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('dashboard.payments', compact('transactions'));
    }

    // INITIATE: Moov Money
    public function initiateMoov(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required|string|min:8',
            'amount' => 'required|numeric|min:100',
            'description' => 'nullable|string|max:255',
        ], [
            'phone.required' => 'Le numéro Moov est requis.',
            'amount.required' => 'Le montant est requis.',
            'amount.min' => 'Le montant minimum est de :min FCFA.',
        ]);

        // Créer la transaction locale (pending)
        $reference = strtoupper(Str::ulid());
        $tx = Transaction::create([
            'user_id' => Auth::id(),
            'provider' => 'moov',
            'phone' => $data['phone'],
            'amount' => (int) $data['amount'],
            'currency' => 'FCFA',
            'status' => 'pending',
            'reference' => $reference,
            'description' => $data['description'] ?? null,
            'meta' => [
                'initiated_at' => now()->toIso8601String(),
            ],
        ]);

        // TODO: Appeler l’API Moov Money ici (placeholders pour l’instant)
        Log::info('Moov initiate request', [
            'reference' => $reference,
            'payload' => $data,
        ]);

        // Marquer comme initiated (en attente de confirmation utilisateur opérateur)
        $tx->update(['status' => 'initiated']);

        return Redirect::back()->with('success', 'Demande de paiement Moov Money initiée. Référence: ' . $reference);
    }

    // CALLBACK: Moov Money (webhook / retour opérateur)
    public function moovCallback(Request $request)
    {
        Log::info('Moov callback payload', $request->all());
        // Exemple générique: on récupère la référence et le statut depuis le payload
        $reference = $request->input('reference') ?? $request->input('transaction_id');
        $status = $request->input('status'); // expected: success|failed|cancelled

        if ($reference) {
            $tx = Transaction::where('reference', $reference)->first();
            if ($tx) {
                $newStatus = in_array($status, ['success', 'failed', 'cancelled']) ? $status : 'failed';
                $meta = $tx->meta ?? [];
                $meta['moov_callback'] = $request->all();
                $tx->update([
                    'status' => $newStatus,
                    'meta' => $meta,
                ]);
            }
        }
        return response()->json(['status' => 'ok']);
    }

    // INITIATE: Mixx by Yas
    public function initiateMixx(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required|string|min:8',
            'amount' => 'required|numeric|min:100',
            'description' => 'nullable|string|max:255',
        ], [
            'phone.required' => 'Le numéro Mixx est requis.',
            'amount.required' => 'Le montant est requis.',
            'amount.min' => 'Le montant minimum est de :min FCFA.',
        ]);

        // Créer la transaction locale (pending)
        $reference = strtoupper(Str::ulid());
        $tx = Transaction::create([
            'user_id' => Auth::id(),
            'provider' => 'mixx',
            'phone' => $data['phone'],
            'amount' => (int) $data['amount'],
            'currency' => 'FCFA',
            'status' => 'pending',
            'reference' => $reference,
            'description' => $data['description'] ?? null,
            'meta' => [
                'initiated_at' => now()->toIso8601String(),
            ],
        ]);

        // TODO: Appeler l’API Mixx by Yas ici (placeholders pour l’instant)
        Log::info('Mixx initiate request', [
            'reference' => $reference,
            'payload' => $data,
        ]);

        // Marquer comme initiated
        $tx->update(['status' => 'initiated']);

        return Redirect::back()->with('success', 'Demande de paiement Mixx by Yas initiée. Référence: ' . $reference);
    }

    // CALLBACK: Mixx by Yas (webhook / retour opérateur)
    public function mixxCallback(Request $request)
    {
        Log::info('Mixx callback payload', $request->all());
        $reference = $request->input('reference') ?? $request->input('transaction_id');
        $status = $request->input('status');

        if ($reference) {
            $tx = Transaction::where('reference', $reference)->first();
            if ($tx) {
                $newStatus = in_array($status, ['success', 'failed', 'cancelled']) ? $status : 'failed';
                $meta = $tx->meta ?? [];
                $meta['mixx_callback'] = $request->all();
                $tx->update([
                    'status' => $newStatus,
                    'meta' => $meta,
                ]);
            }
        }
        return response()->json(['status' => 'ok']);
    }
}
