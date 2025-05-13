<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AwardsAndCertification extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['images', 'title', 'description', 'link'];

    protected $searchableFields = ['*'];

    protected $table = 'awards_and_certifications';
}
