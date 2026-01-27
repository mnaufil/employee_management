<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 
        'email',
        'phone',
        'designation'
    ];

    public function scopeSearch($query, $search){

        if(!$search){
            return $query;
        }

        return $query->where(function ($q) use ($search){
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('phone', 'like', "%{$search}%")
              ->orWhere('designation', 'like', "%{$search}%");
        });
    }

}
