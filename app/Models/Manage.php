<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manage extends Model
{
    use HasFactory;
    // protected
    protected $fillable = [
        "user_id",
        "by_user",
        'cost',
        'description',

    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
