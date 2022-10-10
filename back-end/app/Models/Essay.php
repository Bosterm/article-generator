<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Essay extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'body'];

    public static function generate()
    {
        self::insert(['title' => 'default title', 'slug' => 'default-slug', 'body' => 'default body']);
    }
}
