<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Administrator;

class AdministratorRole extends Model
{
    protected $fillable = [
        'role'    
    ];

    public function administrator(){
        return $this->belongsTo(Administrator::class, 'administrator_id');
    }
}
