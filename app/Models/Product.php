<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function setPrice()
    {
        $val = sprintf('%01.2f', $this->price / 100);
        return '$'.$val;
    }
}
