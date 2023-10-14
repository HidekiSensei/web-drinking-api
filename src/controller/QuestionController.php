<?php

namespace Controller;

use Model\Question;

class QuestionController
{
  function getQuestion (int $id): Array
  {
    $returnValue = Question::where('id', '=', $id)->first()->toArray();

    return $returnValue;
  }

  function getQuestionsSet (): Array
  {
    $returnValue = Question::inRandomOrder()->limit(50)->get()->toArray();
    return $returnValue;
  }
}