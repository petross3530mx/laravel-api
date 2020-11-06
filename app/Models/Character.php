<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birthday', 'occupations', 'img', 'nickname', 'portrayed'];

    public function quotes()
    {
      return $this->hasMany(Quote::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function episodes()
    {
    return $this->belongsToMany(Episode::class);
    }

    public static $default_limit = 10;
}
