<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemStatusLog;

class Item extends Model
{
    protected $fillable = [
        'name',
        'description',
        'condition',
        // 'address',
        // 'phone',
        'category_id',
        'user_id',
        'status',
        'foto',
        // 'images',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }

    public function images()
    {
        return $this->hasMany(ItemImage::class);
    }

    protected static function booted()
    {
        static::updated(function ($item) {
            if ($item->isDirty('status')) {
                ItemStatusLog::create([
                    'item_id' => $item->id,
                    'status' => $item->status,
                    'changed_at' => now()->toDateTimeString(),
                ]);
            }
        });
    }

    public function statusLogs()
    {
        return $this->hasMany(ItemStatusLog::class);
    }
}
