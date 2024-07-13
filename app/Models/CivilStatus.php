<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class civilStatus extends Model
{
    use HasFactory;

    protected $table = 'civilStatus';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];
    public $timestamps = false;
}
