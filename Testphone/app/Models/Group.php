<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  public function contacts()
  {
      return $this->belongsToMany(Contact::class);
  }
}
