<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $fillable = [
        'item_id',
        'receiver_id',
        'name',
        'email',
        'address',
        'status',
        'claimed_at',
        'approved_at'
    ];

    protected $casts = [
        'claimed_at' => 'datetime',
        'approved_at' => 'datetime', // sekalian kalau kamu pakai
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
