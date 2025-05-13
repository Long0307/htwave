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
        'background3',
        'Title',
        'Description',
        'Solution1',
        'Solution2',
        'Solution3',
        'Solution4',
        'Solution5',
        'Solution6',
        'Solution7',
        'Solution8',
        'Solution9',
        'Solution10',
        'Solution11',
        'Solution12',
        'Solution13',
        'Solution14',
        'Solution15',
        'Solution16',
        'Solution17',
        'Solution18',
        'Solution19',
        'Solution20',
    ];

    protected $searchableFields = ['*'];
}
