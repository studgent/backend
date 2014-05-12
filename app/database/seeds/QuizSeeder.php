<?php

/**
 * This class seeds the back-end with several definitions with different source types.
 */

class QuizSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Eloquent::unguard();

        // Add the json files
        $this->seedQuiz();

    }

    /**
     * Seed the questions
     */
    private function seedQuiz()
    {

        $this->command->info("Question 1");
        $q1 = new Question;
        $q1->question = 'Wanneer is de bouw van de boekentoren gestart?';
        $q1->type = 'single';
        $q1->answer = '1942';
        $q1->points = 2;
        $q1->latitude = '51.044935'; 
        $q1->longitude = '3.725798';
        $q1->save();

        $this->command->info("Question 2");
        $q2 = new Question;
        $q2->question = 'Wat vind je niet terug aan het plafond van café de pi-nuts?';
        $q2->type = 'mc';
        $q2->answer = 'Schoolboeken';
        $q2->points = 2;
        $q2->latitude = '51.0436016'; 
        $q2->longitude = '3.7210573';
        $q2->save();

        $this->command->info("Choices");
        $c1 = new Choice;
        $c2 = new Choice;
        $c3 = new Choice;
        $c4 = new Choice;
        $c1->choice = "Apen";
        $c2->choice = "Bananen";
        $c3->choice = "Lichten";
        $c4->choice = "Schoolboeken";
        $q2->choices()->save($c1);
        $q2->choices()->save($c2);
        $q2->choices()->save($c3);
        $q2->choices()->save($c4);

        $this->command->info("Question 3");
        $q3 = new Question;
        $q3->question = 'Dummy opgeloste vraag.';
        $q3->type = 'single';
        $q3->answer = '2';
        $q3->points = 2;
        $q3->latitude = '51.03431'; 
        $q3->longitude = '3.701';
        $q3->save();

        $this->command->info("Question 4");
        $q4 = new Question;
        $q4->question = 'Dummy vraag mis.';
        $q4->type = 'single';
        $q4->answer = '2';
        $q4->points = 2;
        $q4->latitude = '51.03431'; 
        $q4->longitude = '3.701';
        $q4->save();


        foreach (User::all() as $user)
        {
            $this->command->info("Answer 1 for " . $user->email);
            $a1 = new Answer;
            $a1->question()->associate($q3);
            $a1->user()->associate($user);
            $a1->correct = true;
            $user->score += $q3->points;
            $user->save();
            $a1->save();
            
            $this->command->info("Answer 2 " . $user->email);
            $a2 = new Answer;
            $a2->question()->associate($q4);
            $a2->user()->associate($user);
            $a2->correct = false;
            $a2->save();
        }
        

        $this->command->info("Quiz sucessfully added");
    }


}
