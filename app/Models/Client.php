<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ColumnFillable;

class Client extends Model
{
    use HasFactory, ColumnFillable;

    protected $guarded = ['id'];

    public function bdm()
    {
        return $this->belongsToMany(User::class, 'bdm_clients');
    }
}
