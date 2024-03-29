<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'price',
        'publishment_date',
        'genre',
        'publisher_id',
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }
}
