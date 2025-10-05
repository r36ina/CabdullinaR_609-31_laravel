<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Service extends Model
{
    use HasFactory;
    public function contracts(): BelongsToMany
    {
        return $this->belongsToMany(Contract::class,'list_services'
        )->withPivot('id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServicesCategory::class);
    }

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'cabinet',
        'category_id'
    ];
}
