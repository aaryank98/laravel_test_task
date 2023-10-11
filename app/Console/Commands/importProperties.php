<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Properties;
use Illuminate\Support\Facades\DB;

class importProperties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-properties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To import properties from the API and update it.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {

            $previous_info = DB::table('properties_migration')->select('next_page')->where('id', 1)->first();
            $page_nuber = $previous_info?->next_page??1;
            $response = Http::get('https://trial.craig.mtcserver15.com/api/properties?' . http_build_query(
                array(
                    'api_key' => '3NLTTNlXsi6rBWl7nYGluOdkl2htFHug',
                    'page' => array('number' => $page_nuber, 'size' => 100)
                )
            ));
            if ($response->status() === 200) {
                $data = $response->json();
                // To set next page number
                $next_page = $data['last_page'] == $data['current_page'] ? 0 : $data['current_page'] + 1;

                $propertis = $data['data'];
                $prepared_properties = array();
                foreach ($propertis as $property) {
                    // Prepare array of proeties with the details
                    $prepared_properties[] = array(
                        'uuid'                  => $property['uuid'],
                        'property_type_id'      => $property['property_type_id'],
                        'county'                => $property['county'],
                        'country'               => $property['country'],
                        'town'                  => $property['town'],
                        'description'           => $property['description'],
                        'address'               => $property['address'],
                        'image_full'            => $property['image_full'],
                        'image_thumbnail'       => $property['image_thumbnail'],
                        'latitude'              => $property['latitude'],
                        'longitude'             => $property['longitude'],
                        'num_bedrooms'          => $property['num_bedrooms'],
                        'num_bathrooms'         => $property['num_bathrooms'],
                        'price'                 => $property['price'],
                        'property_for'          => $property['type'],
                        'created_at'            => $property['created_at'],
                        'updated_at'            => $property['updated_at'],
                    );
                }

                if (count($prepared_properties) > 0) {
                    Properties::upsert($prepared_properties, ['uuid']);
                }

                DB::table('properties_migration')->updateOrInsert(['id' => 1], ['last_migrated_page' => $data['current_page'], 'next_page' => $next_page]);
            } else {
                throw new \Exception('API returned a non-200 status code');
            }
        } catch (\Exception $e) {
            \Log::error('API request failed: ' . $e->getMessage());
        }
    }
}
