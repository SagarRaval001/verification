<?php

namespace App\Models;

use App\Traits\ColumnFillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, ColumnFillable;

    protected $guarded = ['id'];

    protected $casts = [
        'start_date'  => 'date:d/m/Y',
        'end_date' => 'date:d/m/Y',
        'estimate_date' => 'date:d/m/Y',
        'due_date' => 'date:d/m/Y',
    ];

    public function projectManagers()
    {
        return $this->belongsToMany(User::class, 'project_projectmanager');
    }

    public function teamLeaders()
    {
        return $this->belongsToMany(User::class, 'project_teamleader');
    }

    public function developers()
    {
        return $this->belongsToMany(User::class, 'developer_project');
    }

    public function client()
    {
        return $this->belongsTo(User::class);
    }
}
