<?php

use Carbon\Carbon;

/**
 * This class seeds the back-end with several definitions with different source types.
 */

class CalendarTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Eloquent::unguard();

        // Add the json files
        $this->seedEvents();

    }

    /**
     * Seed the JSON files
     */
    private function seedEvents(){

        $file = __DIR__ 
                . '/../../storage/data/json/' 
                . 'visitgentevents' 
                . '.json';

        $payload = file_get_contents($file);
        $json = json_decode($payload,true);


        $added = false;
        foreach ($json as $root => $calendar) {
            foreach ($calendar as $key => $value) {
                $cal_item = new Calendar;

                if( array_key_exists('id', $value) ){
                    $cal_item->visitgent_id = $value['id'];
                }
                if( array_key_exists('category', $value) ){
                    $cal_item->type = $value['category'][0]['name'];
                }
                if( array_key_exists('title', $value) ){
                    $cal_item->name = $value['title'];
                }
                if( array_key_exists('summary', $value) ){
                    $cal_item->description = $value['summary'];
                }
                if( array_key_exists('description', $value) ){
                    $cal_item->details = $value['description'];
                }

                if( array_key_exists('openinghours_short', $value) ){
                    if (strpos($value['openinghours_short'],'>') !== false) {
                        try {
                            $dates = explode (" > " , $value['openinghours_short'] );
                            $cal_item->date_from = Carbon::createFromFormat('d/m/Y', $dates[0]);
                            $cal_item->date_to = Carbon::createFromFormat('d/m/Y', $dates[1]);
                        } catch (Exception $e) {
                            $this->command->info("no date found");
                        }
                    } else {
                        try {
                            var_dump($value['openinghours_short']);
                            $cal_item->date_from = Carbon::createFromFormat('d/m/Y', $value['openinghours_short']);
                            $cal_item->date_to = Carbon::createFromFormat('d/m/Y', $value['openinghours_short']);
                        } catch (Exception $e) {
                            $this->command->info("no date found");
                        }
                    }
                }


                if( array_key_exists('contact', $value) ){
                    foreach ($value['contact'] as $key2 => $val2) {
                        if( array_key_exists('contact', $val2) ){
                            $cal_item->contact = $val2['contact'];
                        }
                        if( array_key_exists('street', $val2) ){
                            $cal_item->street = $val2['street'];
                        }
                        if( array_key_exists('number', $val2) ){
                            $cal_item->number = $val2['number'];
                        }
                        if( array_key_exists('phone', $val2) ){
                            $cal_item->phone = $val2['phone'][0]['number'];
                        }
                        if( array_key_exists('email', $val2) ){
                            $cal_item->email = $val2['email'][0];
                        }
                        if( array_key_exists('website', $val2) ){
                            $cal_item->uri = $val2['website'][0]['url'];
                        }
                    }
                }
                if( array_key_exists('images', $value) ){
                    $cal_item->image = $value['images'][0];
                }
                if( array_key_exists('thumbs', $value) ){
                    $cal_item->image_small = $value['thumbs'][0];
                }
                if( array_key_exists('prices', $value) ){
                    $cal_item->prices = json_encode($value['prices']);
                }

                /*$geocoder = new \Geocoder\Geocoder();
                $adapter  = new \Geocoder\HttpAdapter\GuzzleHttpAdapter();
                $chain    = new \Geocoder\Provider\OpenStreetMapProvider($adapter);
                $geocoder->registerProvider($chain);
                $latlon = $geocoder->geocode($cal_item->street . ' ' . $cal_item->number . ', Ghent');
                $cal_item->latitude = $latlon['lat'];
                $cal_item->longitude = $latlon['lon'];*/
                $cal_item->save();
            }
            $added = true;
        }


        if(!$added){
            $this->command->info("No JSON files have been added.");
        } else {
            $this->command->info("Events sucessfully added");
        }
    }


}