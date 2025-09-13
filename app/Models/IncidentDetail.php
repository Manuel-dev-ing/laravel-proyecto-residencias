<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentDetail extends Model
{
    use HasFactory;

    protected $table = 'incident_detail';

    protected $fillable = ['incidence_id', 'user_id', 'description', 'status'];


    public function user(){
        return $this->belongsTo(User::class);
    }

}
