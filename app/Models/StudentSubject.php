<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Subset;

class StudentSubject extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subject_id',
        'student_id'
    ];
    /**
     * The table.
     *
     * @var array<int, string>
     */
    protected $table = 'student_subject';
    /**
     * The table primary key.
     *
     * @var int
     */
    protected $primary_key = 'id';

}
