<?php

namespace App\Models;

use App\Models\Branch;
use App\Models\Maneger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'tax_number', 'owner'];
    public function branches()
    {
        return $this->hasMany(Branch::class, 'company_id', 'id');
    }

    public function maneger()
    {
        return $this->hasOne(Maneger::class);
    }
}
