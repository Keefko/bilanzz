<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    public $primaryKey = 'id';
    public $timestamps = false;

    private $title;
    private $link;

    public function parent() {

        return $this->hasOne(Menu::class, 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany(Menu::class, 'parent_id', 'id');

    }

    public static function tree() {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', NULL)->get();

    }
}
