<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'firstname',
        'lastname',
        'email',
    ];

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }
}
