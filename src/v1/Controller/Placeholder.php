<?php
namespace Product\v1\Controller;
use Slim\Slim;
use Product\v1\Model;
use Product\v1\Exception;

class Placeholder {
  public $app;

  public function __construct() {
    $this->app = Slim::getInstance();
  } // __construct

}
