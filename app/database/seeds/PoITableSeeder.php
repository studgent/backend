<?php

/**
 * This class seeds the back-end with several definitions with different source types.
 */

class PoITableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Eloquent::unguard();

        // Add the json files
        $this->seedCafes();

    }

    /**
     * Seed the JSON files
     */
    private function seedCafes(){

        $file = __DIR__ 
                . '/../../storage/data/json/' 
                . 'cafeplan' 
                . '.json';

        $payload = file_get_contents($file);
        $json = json_decode($payload,true);


        $added = false;
        foreach ($json as $root => $cafes) {
            foreach ($cafes as $key => $value) {
                $cafe = new PoI;
                $cafe->type = 'cafe';

                if( array_key_exists('geo', $value) ){
                    $cafe->latitude = $value['geo'][0];
                    $cafe->longitude = $value['geo'][1];
                }
                if( array_key_exists('id', $value) ){
                    $cafe->cafeplan_id = $value['id'];
                }
                if( array_key_exists('uri', $value) ){
                    $cafe->cafeplan_uri = $value['uri'];
                }
                if( array_key_exists('content', $value) ){
                    $cafe->details = $value['content'];
                }
                if( array_key_exists('nameid', $value) ){
                    $cafe->name = $value['nameid'];
                }
                $cafe->save();
            }
            $added = true;
        }


        if(!$added){
            $this->command->info("No JSON files have been added.");
        } else {
            $this->command->info("JSON file sucessfully added");
        }
    }


}