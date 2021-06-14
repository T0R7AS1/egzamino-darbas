<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_name',
        'task_description',
        'status_id',
        'add_date',
        'completed_date',
    ];
    public function statusName(){
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }
}
