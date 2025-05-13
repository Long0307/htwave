<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technology extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'Background',
        'Slogan',
        'SubTitle',
        'Description',
        'categories_id',
        'Technology1',
        'Technology2',
        'Technology3',
        'Technology4',
        'Technology5',
        'Technology6',
        'Technology7',
        'Technology8',
        'Technology9',
        'Technology10',
        'Technology11',
        'Technology12',
        'Technology13',
        'Technology14',
        'Technology15',
        'Technology16',
        'Technology17',
        'Technology18',
        'Technology19',
        'Technology20',
    ];
 
    protected $searchableFields = ['*'];

    public function technologyCategory()
    {
        return $this->hasOne(TechnologyCategory::class, 'category_id');
    }
}
