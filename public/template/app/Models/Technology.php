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
    ];

    protected $searchableFields = ['*'];

    public function technologyCategory()
    {
        return $this->hasOne(TechnologyCategory::class, 'category_id');
    }
}
