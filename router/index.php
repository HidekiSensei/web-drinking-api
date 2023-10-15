<?php

use Controller\QuestionController;

$uri = $_SERVER['REQUEST_URI'];
$uri = explode('?', $uri)[0];

$request_method = $_SERVER['REQUEST_METHOD'];

$questionController = new QuestionController();

if ($uri === '/' && $uri === '') {
  http_response_code(404);
  echo 'Seite nicht gefunden';
  return;
} else if ($uri === '/api/get_question' && $request_method === 'GET') {
  if (array_key_exists('id', $_GET)) {
    echo json_encode($questionController->getQuestion(intval($_GET['id'])));
    return;
  }
  echo json_encode($questionController->getQuestionsSet());
  return;
}
 else {
  http_response_code(404);
  echo 'Seite nicht gefunden';
  return;
}