<?php

namespace app\controllers;

use app\models\ViewsModel;

class ViewsController extends ViewsModel {
  public function getViewsController($view, $role) {
    return $this->getViewsModel($view, $role);
  }
}
