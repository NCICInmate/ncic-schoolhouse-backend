<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
    use HasFactory;

    protected $table = 'learners';

    protected $gaurded = ['uuid'];

    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    protected $fillable = [
        'first_name',
        'last_name',
        'motivation',
        'release_date',
        'accomplishments',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
