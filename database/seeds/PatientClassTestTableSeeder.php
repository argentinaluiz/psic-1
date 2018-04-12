<?php

use Illuminate\Database\Seeder;

class PatientClassTestTableSeeder extends Seeder
{
    public function run()
    {
        $classTests = \App\Models\Painel\ClassTest::byPsychoanalyst(1)->get();

        foreach ($classTests as $classTest){
            $classMeeting = $classTest->classMeeting;
            $classInformation = $classMeeting->classInformation;
            $patients = $classInformation->patients;
            $totalPatients = (int)($patients->count() * 0.7);
            $patientsRandom = $patients->random($totalPatients);
            $halfPatients = $patientsRandom->count()/2;
            $patientsRandom100 = $patientsRandom->slice(0,$halfPatients);
            $self = $this;
            $patientsRandom100->each(function($patient) use($self,$classTest){
                $self->makeResults($patient,$classTest,1);
            });
            $patientsRandom60 = $patientsRandom->slice($halfPatients,$patientsRandom->count());
            $patientsRandom60->each(function($patient) use($self,$classTest){
                $self->makeResults($patient,$classTest,0.6);
            });
        }
    }

    public function makeResults($patient,$classTest, $perc){
        $questions = $classTest->questions;
        $numQuestionsCorrect = (int)($questions->count() * $perc);
        $questionsCorrect = $questions->slice(0,$numQuestionsCorrect);
        $questionsIncorrect = $questions->slice($numQuestionsCorrect,$questions->count());
        $choices = [];
        foreach ($questionsCorrect as $question){
            $choices[] = [
                'question_id' => $question->id,
                'question_choice_id' => $question->choices->first()->id
            ];
        }

        foreach ($questionsIncorrect as $question){
            $choices[] = [
                'question_id' => $question->id,
                'question_choice_id' => $question->choices->last()->id
            ];
        }

        \Illuminate\Database\Eloquent\Model::reguard();
        \App\Models\Painel\PatientClassTest::createFully([
            'class_test_id' => $classTest->id,
            'patient_id' => $patient->id,
            'choices' => $choices
        ]);
        \Illuminate\Database\Eloquent\Model::unguard();
    }
}
