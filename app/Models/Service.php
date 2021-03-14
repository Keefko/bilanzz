<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    public $primaryKey = 'id';
    public $timestamps = false;

    private $icon;
    private $title;
    private $text;
    private $img;
    private $button_text;
    private $button_url;
    private $slug;
    private $calc;
    private $journey;
    private $others;
}
