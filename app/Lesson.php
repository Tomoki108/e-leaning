<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
use App\LessonWord;
use App\Activity;

class Lesson extends Model
{
    protected $table = 'lesson';

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function category()
    {
       return $this->belongsTo(Category::class);
    }

    public function lessonWords()
    {
       return $this->hasMany(LessonWord::class);
    }

    public function activity()
    {
       return $this->hasOne(Activity::class, 'action_id');
    }

    public function create($category_id, $user_id)
    {
       $this->category_id = $category_id;
       $this->user_id = $user_id;
       $this->save();
       return $this;
    }

}
