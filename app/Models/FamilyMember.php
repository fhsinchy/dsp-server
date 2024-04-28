<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender',
        'age',
        'relationship',
    ];

    public function familyMember() {
        return $this->belongsTo(UserSocioDemographicProfile::class);
    }
}
