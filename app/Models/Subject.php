<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_subject',
        'description',
        'credits',
        'area',
        'category'
    ];
    /**
     * The table.
     *
     * @var array<int, string>
     */
    protected $table = 'subjects';
    /**
     * The table primary key.
     *
     * @var int
     */
    protected $primary_key = 'id';

    public function students(){
        return $this->belongsToMany(Student::class, 'student_subject', 'subject_id');
    }
    public function teachers(){
        return $this->belongsToMany(Teacher::class, 'teacher_subject', 'subject_id');
    }
}
