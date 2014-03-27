<?php

/**
 * This class seeds the back-end with several definitions with different source types.
 */

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Eloquent::unguard();

        // Add the json files
        $this->seedUsers();

    }

    /**
     * Seed the Users
     */
    private function seedUsers(){
        $faker = Faker\Factory::create('nl_BE');

        $faker->addProvider(new Faker\Provider\nl_BE\Person($faker));
        $faker->addProvider(new Faker\Provider\nl_BE\PhoneNumber($faker));
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        $faker->addProvider(new Faker\Provider\Internet($faker));

        for ($i=0; $i < 200; $i++) { 
            $user = new User;
            $user->email = $faker->email;
            $user->first_name = $faker->firstName;
            $user->last_name = $faker->lastName;
            $user->password = Hash::make('qwerty');
            $user->token = $faker->randomNumber(20);
            $user->details = $faker->text(60);
            $user->phone = $faker->phoneNumber;
            $user->save();
        }
    }


}
