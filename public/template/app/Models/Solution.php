<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solution extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'Background1',
        'Slogan',
        'Background2',
        'Title',
        'Description',
        'Content',
    ];

    protected $searchableFields = ['*'];
}
