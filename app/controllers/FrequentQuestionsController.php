<?php

namespace app\controllers;

use app\models\FrequentQuestionsModel;

class FrequentQuestionsController {
  private $frequent_questions;

  public function __construct() {
    $this->frequent_questions = new FrequentQuestionsModel();
  }

  public function getFrequentQuestions() {
    return $this->frequent_questions->getFrequentQuestions();
  }

  public function updateFrequentQuestion($data) {
    return $this->frequent_questions->updateFrequentQuestion($data);
  }

  public function deleteFrequentQuestion($data) {
    return $this->frequent_questions->deleteFrequentQuestion($data);
  }

  public function createFrequentQuestion($data) {
    return $this->frequent_questions->createFrequentQuestion($data);
  }
}