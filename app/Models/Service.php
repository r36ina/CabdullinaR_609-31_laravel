<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Service extends Model
{
    use HasFactory;
    public function contracts(): BelongsToMany
    {
        return $this->belongsToMany(Contract::class,'list_services',
            'name_service', 'contract_number',
            'name', 'contract_number'
        )->withPivot('contract_number', 'id');
    }
}
