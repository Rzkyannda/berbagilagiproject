<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStatusLog extends Model
{
    protected $fillable = ['item_id', 'status', 'changed_at'];

    public $timestamps = false;

    protected $dates = ['changed_at'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
