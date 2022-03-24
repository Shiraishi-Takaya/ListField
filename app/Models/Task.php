<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'date',
        'time',
        'is_done',
        'x_position',
        'y_position',
        'width',
        'height',
        'color'
    ];

    public function user() {
		return $this->belongsTo(User::class);
	}
}
