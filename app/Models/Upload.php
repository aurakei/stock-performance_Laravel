<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = ['created_at'];

    public function stocks()
    {
        return $this->hasMany(StockPrice::class);
    }
}
