<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    use HasFactory;

    protected $table = 'overtimes';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'date',
        'time_started',
        'time_ended'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
