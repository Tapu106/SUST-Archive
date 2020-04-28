<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $primaryKey = 'file_id';
    protected $fillable = ['file_name', 'file_path','file_description', 'department_id','session_id','semester_id','course_id','user_name','file_size','file_ext',];


    public function user()
    {
            return $this->belongsTo('App\User');
    }
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
}
