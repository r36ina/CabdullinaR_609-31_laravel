<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contract extends Model
{
    use HasFactory;
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'list_services',
            'contract_number', 'name_service',
            'contract_number', 'name'
        )->withPivot('contract_price');
    }
    protected $table = 'contract';
}
