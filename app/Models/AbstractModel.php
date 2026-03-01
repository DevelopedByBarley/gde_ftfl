<?php

namespace App\Models;



use App\Models\Model;

  class AbstractModel extends Model
  {
    protected $table = 'abstracts';
    protected $abstract_type = 'drone_abstract';


  }
?>