<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['id','first_name','last_name','email','phone','registration_year','index_number','user_id'];

    public function user(){
    return $this->belongsTo(User::class);
    }
    function courses(){
        return $this->belongsToMany(Course::class,'courses_students','student_id', 'course_id');
    }
    public function assignments(){
        return $this->hasMany(Assignment::class);
    }
    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }
    public function lecturenotes(){
        return $this->hasMany(LectureNote::class);
    }
    public function submissions(){
        return $this->hasMany(Submission::class);
    }
    public function notices(){
        return $this->hasMany(Notice::class);
    }
    function assignmentsubmissions(){
        return $this->belongsToMany(AssignmentSubmission::class,'student_assignments_submissions','student_id', 'assignment_submission_id');
    }
    function submissionsubmissions(){
        return $this->belongsToMany(SubmitSubmission::class,'student_submissions','student_id', 'submission_submission_id');
    }


}
