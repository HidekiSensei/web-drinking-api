<?php
require_once __DIR__ . '/../../bootstrap/app.php';

use Model\Question;
use PhpOffice\PhpSpreadsheet\IOFactory;

if (count($argv) != 2) {
  die("Verwendung: php src/import/QuestionImport.php Party-App_Fragen.xls\n");
}

$excelFile = $argv[1];

if (!file_exists($excelFile)) {
  die("Die angegebene Excel-Datei existiert nicht.\n");
}

$spreadsheet = IOFactory::load($excelFile);
$worksheet = $spreadsheet->getActiveSheet();

// Iteriere durch die Zeilen ab Zeile 2
foreach ($worksheet->getRowIterator(2) as $row) {
  $type = $worksheet->getCell('A' . $row->getRowIndex())->getValue();
  $field1 = $worksheet->getCell('B' . $row->getRowIndex())->getValue();
  $field2 = $worksheet->getCell('C' . $row->getRowIndex())->getValue();
  
  $question = new Question;

  $question->question_type = $type;
  $question->question_text_main = $field1;
  $question->question_text_secound = $field2;

  $question->save();
}

?>
