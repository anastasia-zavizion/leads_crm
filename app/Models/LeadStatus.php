<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lead;
use Illuminate\Database\Eloquent\Relations\HasMany;
class LeadStatus extends Model
{
    use HasFactory;

    public function leads(): HasMany{
        return $this->hasMany(Lead::class, 'status_id');
    }
}
