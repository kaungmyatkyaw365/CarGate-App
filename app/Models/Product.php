<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function outdriver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class , 'id');
    }
    public function historyout()
    {
        return $this->belongsToMany(Historyout::class);
    }
}
