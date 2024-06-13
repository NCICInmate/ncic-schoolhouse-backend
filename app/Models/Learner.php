<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Learner extends Authenticatable
{
    use HasFactory, HasApiTokens;

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

    public const PASSWORD_RULES = [
        'required',
        'string',
        'min:6'
    ];
}
