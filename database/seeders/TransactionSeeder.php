<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        if (!$user) {
            return;
        }

        // Transactions de démonstration
        $data = [
            [
                'provider' => 'moov',
                'phone' => '90000000',
                'amount' => 2500,
                'currency' => 'FCFA',
                'status' => 'success',
                'reference' => 'TX-DEMO-'.uniqid(),
                'description' => 'Ticket événement A',
                'meta' => ['seeded' => true],
            ],
            [
                'provider' => 'mixx',
                'phone' => '91000000',
                'amount' => 1200,
                'currency' => 'FCFA',
                'status' => 'failed',
                'reference' => 'TX-DEMO-'.uniqid(),
                'description' => 'Ticket événement B',
                'meta' => ['seeded' => true],
            ],
            [
                'provider' => 'moov',
                'phone' => '90000001',
                'amount' => 5000,
                'currency' => 'FCFA',
                'status' => 'initiated',
                'reference' => 'TX-DEMO-'.uniqid(),
                'description' => 'Ticket événement C',
                'meta' => ['seeded' => true],
            ],
        ];

        foreach ($data as $tx) {
            Transaction::create(array_merge($tx, ['user_id' => $user->id]));
        }
    }
}
