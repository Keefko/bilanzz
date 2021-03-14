<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    use HasFactory;
    protected $table = 'journeys';
    public $primaryKey = 'id';
    public $timestamps = false;

    private $title;
    private $text;
}
