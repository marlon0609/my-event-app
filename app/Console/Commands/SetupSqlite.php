<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class SetupSqlite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup-sqlite {--seed : Exécuter aussi les seeders après la migration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Crée database/database.sqlite s'il n'existe pas, puis lance php artisan migrate (et db:seed si --seed)";

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $dbPath = base_path('database/database.sqlite');
        $dbDir = dirname($dbPath);

        if (!File::exists($dbDir)) {
            File::makeDirectory($dbDir, 0755, true);
            $this->info("Dossier créé: {$dbDir}");
        }

        if (!File::exists($dbPath)) {
            File::put($dbPath, '');
            $this->info("Fichier SQLite créé: {$dbPath}");
        } else {
            $this->info('Fichier SQLite déjà présent.');
        }

        $this->info('Nettoyage de la configuration...');
        Artisan::call('config:clear');
        $this->line(Artisan::output());

        $this->info('Exécution des migrations...');
        $exitCode = Artisan::call('migrate', ['--force' => true]);
        $this->line(Artisan::output());
        if ($exitCode !== 0) {
            $this->error('La migration a échoué.');
            return $exitCode;
        }

        if ($this->option('seed')) {
            $this->info('Exécution des seeders...');
            $exitCode = Artisan::call('db:seed', ['--force' => true]);
            $this->line(Artisan::output());
            if ($exitCode !== 0) {
                $this->error('Le seeding a échoué.');
                return $exitCode;
            }
        }

        $this->info('Configuration SQLite terminée.');
        return Command::SUCCESS;
    }
}
