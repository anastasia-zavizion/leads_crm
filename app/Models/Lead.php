<?php

namespace App\Models;

use App\Observers\LeadObserve;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LeadStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;


class Lead extends Model
{
    use HasFactory;
    public static $gender = ['M','F'];
    public static $status = ['New lead','Customer', 'Deleted'];

    protected $fillable = ['name','first_name','phone','email','address','postcode','city','country','gender','description','lead_status_id'];

    public function status(): BelongsTo{
        return $this->belongsTo(LeadStatus::class);
    }

    public function scopeWithCoordinates(Builder $query){
        $query->where('lat','<>','')->where('lng','<>','');
    }

    protected function lat(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => floatval($value)
        );
    }

    protected function lng(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => floatval($value)
        );
    }

}
