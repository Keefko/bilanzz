<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'sections';
    public $primaryKey = 'id';
    public $timestamps = false;

    private $img;
    private $title;
    private $text;
    private $button_one_text;
    private $button_one_url;
    private $button_two_text;
    private $button_two_url;
}
