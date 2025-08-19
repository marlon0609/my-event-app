<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title' => 'Conférence Maritime Internationale',
                'description' => 'Rejoignez-nous pour une conférence exceptionnelle sur les innovations dans le transport maritime. Découvrez les dernières technologies et tendances du secteur.',
                'image' => 'conference-maritime.jpg',
                'date' => Carbon::now()->addDays(15),
                'location' => 'Port de Marseille, France',
                'price' => 150.00,
                'capacity' => 200,
                'category' => 'Conférence',
                'featured' => true,
                'status' => 'active'
            ],
            [
                'title' => 'Formation Sécurité Portuaire',
                'description' => 'Formation complète sur les protocoles de sécurité dans les environnements portuaires. Certification officielle incluse.',
                'image' => 'formation-securite.jpg',
                'date' => Carbon::now()->addDays(8),
                'location' => 'Centre de Formation, Le Havre',
                'price' => 350.00,
                'capacity' => 50,
                'category' => 'Formation',
                'featured' => true,
                'status' => 'active'
            ],
            [
                'title' => 'Salon Nautique Premium',
                'description' => 'Le plus grand salon nautique de la région. Découvrez les dernières innovations, rencontrez les professionnels et participez aux démonstrations.',
                'image' => 'salon-nautique.jpg',
                'date' => Carbon::now()->addDays(25),
                'location' => 'Palais des Congrès, Nice',
                'price' => 25.00,
                'capacity' => 1000,
                'category' => 'Salon',
                'featured' => true,
                'status' => 'active'
            ],
            [
                'title' => 'Workshop Logistique Portuaire',
                'description' => 'Atelier pratique sur l\'optimisation des flux logistiques dans les ports. Méthodes modernes et outils digitaux.',
                'image' => 'workshop-logistique.jpg',
                'date' => Carbon::now()->addDays(12),
                'location' => 'Port de Bordeaux',
                'price' => 200.00,
                'capacity' => 75,
                'category' => 'Workshop',
                'featured' => false,
                'status' => 'active'
            ],
            [
                'title' => 'Networking Professionnel Maritime',
                'description' => 'Soirée networking pour les professionnels du secteur maritime. Échanges, partenariats et opportunités d\'affaires.',
                'image' => 'networking-maritime.jpg',
                'date' => Carbon::now()->addDays(20),
                'location' => 'Yacht Club, Cannes',
                'price' => 80.00,
                'capacity' => 150,
                'category' => 'Networking',
                'featured' => false,
                'status' => 'active'
            ],
            [
                'title' => 'Symposium Innovation Maritime',
                'description' => 'Symposium international sur les innovations technologiques dans le secteur maritime. Présentations d\'experts et démonstrations.',
                'image' => 'symposium-innovation.jpg',
                'date' => Carbon::now()->addDays(30),
                'location' => 'Centre des Congrès, Toulon',
                'price' => 300.00,
                'capacity' => 300,
                'category' => 'Symposium',
                'featured' => true,
                'status' => 'active'
            ]
        ];

        foreach ($events as $eventData) {
            Event::create($eventData);
        }
    }
}
