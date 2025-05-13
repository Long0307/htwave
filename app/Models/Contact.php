<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'favicon',
        'address',
        'phone',
        'email',
        'fax',
        'logo1',
        'logo2',
        'map',
    ];

    protected $searchableFields = ['*'];
}
