<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['quote'];

    public function episode()
    {
      return $this->belongsTo(Episode::class);
    }

    public function character()
    {
      return $this->belongsTo(Character::class);
    }
}
