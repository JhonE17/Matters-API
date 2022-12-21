<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'document',
        'names',
        'phone',
        'email',
        'address',
        'city',
        'semester'
    ];
    /**
     * The table.
     *
     * @var array<int, string>
     */
    protected $table = 'students';
    /**
     * The table primary key.
     *
     * @var int
     */
    protected $primary_key = 'id';

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'student_subject');
    }
}
