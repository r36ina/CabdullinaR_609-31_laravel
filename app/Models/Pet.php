<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pet extends Model
{
    use HasFactory;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function contract() : BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }

    protected $table = 'pet';
    protected $fillable = [
        'med_book',
        'user_id',
        'breed',
        'nickname',
        'date_of_birth',
        'gender',
        'created_at',
        'updated_at'
    ];
}
