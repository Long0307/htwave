<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inquiry extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'email', 'phoneNumber', 'enquiries'];

    protected $searchableFields = ['*'];
}
