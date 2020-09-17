<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screens extends Model
{
  use HasFactory;
  protected $hidden = ["created_at", "updated_at", "deleted_at"];

  public function theater()
  {
    return $this->belongsTo('App\Models\Theaters');
  }
}
