<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

   // protected $fillable=[
   //     'title','company','location','website','email','description','tags'
   // ];

    public function scopeFilter($query ,array $filters){

        //if tag not false
        if($filters['tag'] ?? false){
            $query->where('tags','like','%'.request('tag').'%');
        }


        if($filters['search'] ?? false){
            $query->where('title','like','%'.request('search').'%')
            ->orwhere('description','like','%'.request('search').'%')
            ->orwhere('tags','like','%'.request('search').'%')
            ->orwhere('company','like','%'.request('search').'%')
            ->orwhere('location','like','%'.request('search').'%');
        }
    }

    //relationship to user
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
