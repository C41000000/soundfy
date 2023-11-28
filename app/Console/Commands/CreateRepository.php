<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class CreateRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Interface and Eloquent';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $nameEloquent = $this->argument('name') . "Eloquent";
        $nameInterface = $this->argument('name') . "Interface";

        $servicePathEloquent = app_path('Repositories/Eloquents/' . $nameEloquent . '.php');
        $servicePathInterface = app_path('Repositories/Interfaces/' . $nameInterface . '.php');

        if (!is_dir(app_path('Repositories'))) {
            mkdir(app_path('Repositories'), 0755, true);
        }
        if (!is_dir(app_path('Repositories/Eloquents'))) {
            mkdir(app_path('Repositories/Eloquents'), 0755, true);
        }
        if (!is_dir(app_path('Repositories/Interfaces'))) {
            mkdir(app_path('Repositories/Interfaces'), 0755, true);
        }
        if($this->option('base') != null){
            $stubEloquent = $this->getStubEloquent(true);
            $stubInterface = $this->getStubInterface(true);
        }else{
            $stubEloquent = $this->getStubEloquent();
            $stubInterface = $this->getStubInterface();

        }

        $stubEloquent = str_replace('{{class}}', $nameEloquent, $stubEloquent);
        $stubEloquent = str_replace('{{interface}}', $nameInterface, $stubEloquent);
        $stubInterface = str_replace('{{class}}', $nameInterface, $stubInterface);

        if (!file_exists($servicePathEloquent) && !file_exists($servicePathInterface) ) {
            file_put_contents($servicePathEloquent, $stubEloquent);
            file_put_contents($servicePathInterface, $stubInterface);
            $this->info('Repository created successfully.');
        } else {
            $this->error('Repository already exists!');
        }
    }

    protected function getStubEloquent($option = false)
    {
        if($option){
            return file_get_contents(__DIR__ . '/stubs/eloquent.base.stub');
        }else{
            return file_get_contents(__DIR__ . '/stubs/eloquent.stub');
        }
    }

    protected function getStubInterface($option = false)
    {
        if($option){
            return file_get_contents(__DIR__ . '/stubs/interface.base.stub');
        }else{
            return file_get_contents(__DIR__ . '/stubs/interface.stub');
        }
    }

    protected function configure()
    {
        $this->setName('make:repository')
            ->setDescription('Create a new Interface and Eloquent')
            ->addOption('base', null, InputOption::VALUE_OPTIONAL, 'Create a basics resources if you pass any value', null);
    }
}
