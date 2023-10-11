<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;


class FetchPropertiesAndStore implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        try {

            // Get the properties details from the api and store it into the database
            $response = Http::get('https://trial.craig.mtcserver15.com/api/properties?api_key=3NLTTNlXsi6rBWl7nYGluOdkl2htFHug');
            if ($response->status() === 200) {
                $data = $response->json();
                echo "here";
            } else {
                throw new \Exception('API returned a non-200 status code');
            }
        } catch (\Exception $e) {
            \Log::error('API request failed: ' . $e->getMessage());
        }
    }
}
