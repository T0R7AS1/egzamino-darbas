<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;


class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function tasks(){
        return $this->hasMany('App\Models\Task', 'Task_id', 'id');
    }
}
