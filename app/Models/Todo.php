<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'id',
        'title',
        'datestart',
        'dateend',
        'dateupdate',
        'status',
        'priority',
        'employeeid',
        'creatorid',
    ];
    public $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}
