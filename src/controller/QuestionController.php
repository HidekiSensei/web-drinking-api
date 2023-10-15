<?php

namespace Controller;

use Model\Question;

class QuestionController
{
  public function getQuestion (int $id): Array
  {
    $returnValue = Question::where('id', '=', $id)->first()->toArray();
    $returnValue = $this->generatePunishment($returnValue);
    
    return $returnValue;
  }

  public function getQuestionsSet (): Array
  {
    $returnValue = Question::inRandomOrder()->limit(50)->get()->toArray();
    foreach ($returnValue as $key => $question) {
      $returnValue[$key] = $this->generatePunishment($question);
    }

    return $returnValue;
  }

  private function generatePunishment(Array $question): Array
  {
    $question['punishment'] = random_int(2, 5);

    return $question;
  }
}