<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footnote extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'text', 'essay_id'];

    public static function generate()
    {
        self::insert(['number' => 1, 'slug' => 'default text', 'essay_id' => 1]);
    }
}
