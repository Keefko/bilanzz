<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faqs';
    public $primaryKey = 'id';
    public $timestamps = false;

    private $title;
    private $text;
    private $contact_id;
}
