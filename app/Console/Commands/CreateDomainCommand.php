<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
class CreateDomainCommand extends Command
{
        /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:domain {name : The name of the directory to create}';
   
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new domain';
   
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = base_path('domain/' . $name);
        $subdirs = ['Actions', 'DataTransferObjects', 'Database', 'Models'];
   
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true);
            $this->info("Domain '$name' created successfully.");
        } else {
            $this->error("Domain '$name' already exists.");
            return 1;
        }
   
        foreach ($subdirs as $subdir) {
            $subdirPath = $path . '/' . $subdir;
            if (!File::exists($subdirPath)) {
                File::makeDirectory($subdirPath, 0777, true);
                $this->info("Subdirectory '$subdir' created successfully.");
            } else {
                $this->error("Subdirectory '$subdir' already exists.");
            }
        }
        return 0;
    }
}
