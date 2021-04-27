<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bot_menu_items extends Model
{
    use HasFactory;

    protected $table = "bot_menu_items";
    protected $fillable = ['menu_name','is_main','status'];
    
}
