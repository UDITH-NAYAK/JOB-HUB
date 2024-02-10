<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class JobPost extends Model
{
    
    use HasFactory;
    protected $fillable=['user_id','company','title','logo','experience','salary','skills','location','job_link','description'];
    
    public function scopeFilter(Builder $query, $search_filter, $filter)
    {
        if ($search_filter) {
            return dd($query->where('company', 'like', '%' . $search_filter . '%')
                ->orWhere('title', 'like', '%' . $search_filter . '%')
                ->orWhere('skills', 'like', '%' . $search_filter . '%'));
        }
        if ($filter) {

            if ($filter == "company") {
                return $query->orderByRaw('LOWER(company) DESC');
            } elseif ($filter == "salary") {
                return $query->orderByRaw('salary ASC');
            } elseif ($filter == "experience") {
                return $query->orderByRaw('experience ASC');
            }
            
        }
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


}
