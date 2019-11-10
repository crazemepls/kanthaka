<?php

namespace App;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use GeneratesUuid;

  public function uuidColumn(): string
  {
    return 'id';
  }

  public function getIncrementing()
  {
    return false;
  }


}
