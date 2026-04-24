<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualMachine extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nom',
        'adresse_ip',
        'description',
        'cpu',
        'memoire',
        'etat',
        'alert',

        
    ];
    // Relation "Many to One"
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
