<?php

namespace app\controllers;

use app\models\SuggestionsModel;

class SuggestionsController {
  private $suggestion;
  public function __construct() {
    $this->suggestion = new SuggestionsModel();
  }
  public function createSuggestion($data) {
    return $this->suggestion->createSuggestion($data);
  }
}