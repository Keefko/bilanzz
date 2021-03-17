<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';
    public $primaryKey = 'id';
    public $timestamps = false;

    private $img;
    private $title;
    private $text;
    private $slug;

    protected $fillable = ['title', 'img', 'text', 'slug'];
}
