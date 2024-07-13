<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'mediaSystem';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];
    public $timestamps = false;
}
