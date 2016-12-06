<?php

namespace MyApp\Exception;

class DuplicateName extends \Exception{
  protected $message = 'Duplicate Chat Name!';
}