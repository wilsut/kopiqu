<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleMaster extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'address', 'status', 'shipping', 'random_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }
}
