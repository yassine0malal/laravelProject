<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulair extends Model
{
    use HasFactory;
    protected $fillable = ['company', 'budget', 'collaborator', 'destination', 'date','description','profil_id','id','is_download'];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profil_id');
    }
}
