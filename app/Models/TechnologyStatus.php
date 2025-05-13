<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechnologyStatus extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'description'];

    protected $searchableFields = ['*'];

    protected $table = 'technology_statuses';
}
