<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LeadStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    use HasFactory;
    public static $gender = ['M','F'];
    public static $status = ['New lead','Customer', 'Deleted'];

    protected $fillable = ['name','first_name','phone','email','address','postcode','city','country','gender','description','lead_status_id'];

    public function status(): BelongsTo{
        return $this->belongsTo(LeadStatus::class);
    }
}
