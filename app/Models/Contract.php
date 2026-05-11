<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contract extends Model
{
    use HasFactory;
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'list_services'
        )->withPivot('contract_price')->withTrashed();
    }
    protected $table = 'contract';
}
