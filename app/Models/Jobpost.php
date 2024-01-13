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
    
    public function scopeFilter(Builder $query,$filter){
        if($filter){
            return $query->where('company','like','%'.$filter.'%')
            ->orWhere('title','like','%'.$filter.'%')
            ->orWhere('skills','like','%'.$filter.'%');
        }
            
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


}
