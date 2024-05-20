<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];
    protected $appends = ['created_date'];

    public function lead(){
        return $this->belongsTo(Lead::class);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function scopeWithLead(Builder $query){
        $query->with('lead');
    }

    public function scopeFilterLead(Builder $query, $request){
        $query->where('lead_id',$request->lead);
    }
}
