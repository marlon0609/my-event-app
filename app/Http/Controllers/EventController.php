<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        // Afficher tous les événements, du plus récent au plus ancien
        $events = Event::orderBy('date', 'desc')
            ->paginate(12);
            
        return view('events.index', compact('events'));
    }
    
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }
    
    public function featured()
    {
        $events = Event::featured()
            ->upcoming()
            ->orderBy('date', 'asc')
            ->limit(6)
            ->get();
            
        return $events;
    }

    // Dashboard: list events of authenticated user
    public function myIndex()
    {
        $user = Auth::user();
        $events = $user->events()->latest()->paginate(10);
        return view('dashboard.events.index', compact('events'));
    }

    // Dashboard: show create form
    public function create()
    {
        return view('dashboard.events.create');
    }

    // Dashboard: store new event for authenticated user
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'capacity' => 'nullable|integer|min:1',
            'status' => 'nullable|string|in:draft,published,cancelled',
            'category' => 'nullable|string|max:100',
            'featured' => 'sometimes|boolean',
        ], [
            'image.image' => "Le fichier doit être une image.",
            'image.mimes' => "L'image doit être de type: :values.",
            'image.max' => "L'image ne doit pas dépasser :max kilo-octets.",
            'title.required' => 'Le titre est obligatoire.',
            'title.max' => 'Le titre ne doit pas dépasser :max caractères.',
            'date.required' => 'La date est obligatoire.',
            'date.date' => 'La date fournie est invalide.',
            'location.required' => 'Le lieu est obligatoire.',
            'price.numeric' => 'Le prix doit être un nombre.',
            'capacity.integer' => 'La capacité doit être un entier.',
            'capacity.min' => 'La capacité doit être au moins de :min.',
        ], [
            'title' => 'titre',
            'description' => 'description',
            'image' => 'image',
            'date' => 'date',
            'location' => 'lieu',
            'price' => 'prix',
            'capacity' => 'capacité',
            'status' => 'statut',
            'category' => 'catégorie',
            'featured' => 'mise en avant',
        ]);

        $data['featured'] = $request->boolean('featured');

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event = Auth::user()->events()->create($data);

        return redirect()->route('dashboard.events.index')->with('success', 'Événement créé avec succès.');
    }

    // Dashboard: edit form
    public function edit(Event $event)
    {
        $this->authorizeEvent($event);
        return view('dashboard.events.edit', compact('event'));
    }

    // Dashboard: update event
    public function update(Request $request, Event $event)
    {
        $this->authorizeEvent($event);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'capacity' => 'nullable|integer|min:1',
            'status' => 'nullable|string|in:draft,published,cancelled',
            'category' => 'nullable|string|max:100',
            'featured' => 'sometimes|boolean',
        ], [
            'image.image' => "Le fichier doit être une image.",
            'image.mimes' => "L'image doit être de type: :values.",
            'image.max' => "L'image ne doit pas dépasser :max kilo-octets.",
            'title.required' => 'Le titre est obligatoire.',
            'title.max' => 'Le titre ne doit pas dépasser :max caractères.',
            'date.required' => 'La date est obligatoire.',
            'date.date' => 'La date fournie est invalide.',
            'location.required' => 'Le lieu est obligatoire.',
            'price.numeric' => 'Le prix doit être un nombre.',
            'capacity.integer' => 'La capacité doit être un entier.',
            'capacity.min' => 'La capacité doit être au moins de :min.',
        ], [
            'title' => 'titre',
            'description' => 'description',
            'image' => 'image',
            'date' => 'date',
            'location' => 'lieu',
            'price' => 'prix',
            'capacity' => 'capacité',
            'status' => 'statut',
            'category' => 'catégorie',
            'featured' => 'mise en avant',
        ]);

        $data['featured'] = $request->boolean('featured');

        // Replace image if a new file is uploaded
        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('dashboard.events.index')->with('success', 'Événement mis à jour.');
    }

    // Dashboard: delete event
    public function destroy(Event $event)
    {
        $this->authorizeEvent($event);
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }
        $event->delete();
        return redirect()->route('dashboard.events.index')->with('success', 'Événement supprimé.');
    }

    // Simple ownership authorization without Policy
    protected function authorizeEvent(Event $event): void
    {
        if ($event->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
