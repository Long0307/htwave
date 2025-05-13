<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechnologyCategory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name'];

    protected $searchableFields = ['*'];

    protected $table = 'technology_categories';

    public function technology()
    {
        return $this->belongsTo(Technology::class, 'category_id');
    }
}
