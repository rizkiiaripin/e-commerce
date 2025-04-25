<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'php artisan crud:generate {name} {--model=} {--controller=} {--view=} {--migration=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crud generator for models, controllers, views, and migrations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
    }
    
}
