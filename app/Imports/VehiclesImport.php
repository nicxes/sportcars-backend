<?php

namespace App\Imports;

use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

enum FuelType: string
{
    case GASOLINE = 'Gasoline';
    case FLEX_FUEL = 'Flex Fuel';
    case ELECTRIC = 'Electric';
}

class VehiclesImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Vehicle([
            'stock_number' => $row[1],
            'vin' => $row[2],
            'year' => (int)$row[4],
            'make' => $row[5],
            'model' => $row[6],
            'model_code' => $row[7],
            'price' => (int)$row[19],
            'description' => $row[23],
            'photos' => !empty($row[28]) ? explode('|', $row[28]) : [],
            'tags' => !empty($row[34]) ? explode('|', $row[34]) : [],
            'days_in_stock' => (int)$row[33],

            'features' => !empty($row[24]) ? explode('|', $row[24]) : [],
            'engine' => $row[31],
            'body' => $row[8],
            'transmission' => $row[9],
            'series' => $row[10],
            'series_detail' => $row[11],
            'door_count' => (int)$row[12],
            'odometer' => (int)$row[13],
            'engine_cylinder' => (int)$row[14],
            'engine_displacement' => (float)$row[15],
            'drivetrain' => $row[16],
            'color' => $row[17],
            'interior_color' => $row[18],
            'city_mpg' => (int)$row[25],
            'highway_mpg' => (int)$row[26],
            'fuel_type' => $this->getFuelType($row[32])
        ]);
    }

    /**
     * Converts the fuel type from the CSV file to a standardized value.
     * 
     * This method takes the fuel type provided in the CSV and converts it 
     * to a standardized string that will be saved in the database.
     * If the CSV value does not match any of the expected types, 
     * it defaults to "GASOLINE".
     * 
     * @param string|null $fuel The fuel type from the CSV file.
     * @return string|null The standardized fuel type.
     */
    private function getFuelType(?string $fuel): string|null
    {
        if (empty($fuel)) {
            return null;
        }
        
        $fuelTypes = [
            'Gasoline' => 'GASOLINE',
            'Electric' => 'ELECTRIC',
        ];
        return $fuelTypes[$fuel] ?? null;
    }
}
