<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
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
    protected $description = 'Generate a new Service class in App\Services';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         $name = $this->argument('name');
        $servicePath = app_path('Services/' . $name . '.php');

        // Check if file already exists
        if (File::exists($servicePath)) {
            $this->error('Service already exists!');
            return;
        }

        // Ensure directory exists
        File::ensureDirectoryExists(app_path('Services'));

        // Create basic service class content
        $serviceTemplate = <<<PHP
<?php

namespace App\Services;

class {$name}
{
    //
}
PHP;

        File::put($servicePath, $serviceTemplate);

        $this->info("Service created successfully: {$name}");
    }
}
