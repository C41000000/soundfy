<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Service';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = $this->argument('name');

        $servicePath = app_path('Services/' . $name . '.php');

        if (!is_dir(app_path('Services'))) {
            mkdir(app_path('Services'), 0755, true);
        }

        $stub = $this->getStub();

        $stub = str_replace('{{class}}', $name, $stub);

        if (!file_exists($servicePath)) {
            file_put_contents($servicePath, $stub);
            $this->info('Service created successfully.');
        } else {
            $this->error('Service already exists!');
        }
    }

     /**
     * Get the stub for the service.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return file_get_contents(__DIR__ . '/stubs/service.stub');
    }
}
