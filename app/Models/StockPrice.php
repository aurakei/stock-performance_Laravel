<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPrice extends Model
{
    use HasFactory;

    protected $fillable = ['symbol', 'date', 'price', 'upload_id'];

    public function upload()
    {
        return $this->belongsTo(Upload::class);
    }
}
