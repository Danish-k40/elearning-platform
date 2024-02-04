<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class setupProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $this->info('Dropping all tables...');
        $this->call('migrate:fresh');

        $this->info('Migrating database...');
        $this->call('migrate');

        $this->info('Seeding database...');
        $this->call('db:seed');
        
        $this->info('Project setup completed successfully.');
    }
}
