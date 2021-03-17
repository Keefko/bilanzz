<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


    protected $table = 'contacts';
    public $primaryKey = 'id';
    public $timestamps = false;

    private $img;
    private $title;
    private $address;
    private $phone;
    private $mail;
    private $map;

    public function faqs(){
        return $this->hasMany(Faq::class);
    }
}
