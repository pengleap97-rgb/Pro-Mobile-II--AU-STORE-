<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // អនុញ្ញាតឱ្យបញ្ចូលទិន្នន័យជាដុំ
    protected $fillable = [
        'title',
        'author',
        'price',
        'published_date',
    ];

    // --- បន្ថែមនៅទីនេះ (ADD HERE) ---
    // កំណត់ប្រភេទទិន្នន័យឱ្យត្រឹមត្រូវស្វ័យប្រវត្តិ
    protected $casts = [
        'price' => 'decimal:2',
        'published_date' => 'date',
    ];
}