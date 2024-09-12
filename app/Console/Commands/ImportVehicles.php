<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\VehiclesImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportVehicles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-vehicles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import vehicles from the CSV file provided by vAuto';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = storage_path('app/public/' . 'vauto_inventory.csv');

        if (!file_exists($path)) {
            $this->error('File does not exist.');
            return 1;
        }

        Excel::import(new VehiclesImport, $path);

        $this->info('Vehicles imported successfully.');
        return 0;
    }
}
