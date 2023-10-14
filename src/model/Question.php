<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $table = 'question';

  protected $primaryKey = 'id';

  public $timestamps = false;

}
