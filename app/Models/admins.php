<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admins extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',//fi intithar naraf chmch nzidou
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
