<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidences extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'priority_id', 'title', 'description', 'incident_status', 'assignment_date', 'assigned_user'];

   
    public function category(){
        return $this->belongsTo(Categories::class);
    }

    public function priority(){
        return $this->belongsTo(Priorities::class);
    }

    public function assignedUser(){
        return $this->belongsTo(User::class, 'assigned_user', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
