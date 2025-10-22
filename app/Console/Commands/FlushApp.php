<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FlushApp extends Command
{
    protected $signature = 'app:flush {--store= : Forcer le store de cache à vider (sinon le store par défaut est utilisé)}';

    protected $description = "Vider les caches de l'application (config, routes, vues, events, optimize). Si le store est 'database', vider aussi les tables 'cache' et 'cache_locks'.";

    public function handle(): int
    {
        $this->info('Nettoyage des caches Laravel...');

        // Clear optimized/cache files
        Artisan::call('optimize:clear');
        $this->line(Artisan::output());

        // Clear cache store
        $store = $this->option('store') ?: Config::get('cache.default');
        $this->info("Vidage du cache applicatif (store: {$store})...");
        Artisan::call('cache:clear', ['--store' => $store]);
        $this->line(Artisan::output());

        // Clear specific caches (redundant with optimize:clear but explicit)
        Artisan::call('config:clear');
        $this->line(Artisan::output());
        Artisan::call('route:clear');
        $this->line(Artisan::output());
        Artisan::call('view:clear');
        $this->line(Artisan::output());
        Artisan::call('event:clear');
        $this->line(Artisan::output());

        // If database cache store, truncate tables for a hard reset
        if ($store === 'database') {
            $this->info("Store 'database' détecté: purge des tables 'cache' et 'cache_locks' si elles existent...");
            try {
                if (Schema::hasTable('cache')) {
                    DB::table('cache')->truncate();
                    $this->line("- Table 'cache' vidée");
                }
                if (Schema::hasTable('cache_locks')) {
                    DB::table('cache_locks')->truncate();
                    $this->line("- Table 'cache_locks' vidée");
                }
            } catch (\Throwable $e) {
                $this->warn('Impossible de vider les tables cache: ' . $e->getMessage());
            }
        }

        $this->info('Tous les caches ont été vidés.');
        return Command::SUCCESS;
    }
}
