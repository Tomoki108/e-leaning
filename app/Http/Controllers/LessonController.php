<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Word;
use App\WordAnswer;
use App\Lesson;
use App\LessonWord;
use App\Activity;
use Session;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function lessonIndex()
    {    
        session()->forget('result');
        $category = new Category;
        return view('category')->with('categories', $category->getCategories(6));    
    }

    public function lessonAnswer(Category $category, $page_number, $correct)
    {    
        $words = $category->words()->get();

        //In case that the lesson has no words yet.
        if (count($words) === 0) {
            session()->flash($category->title, 'no contents');
            return back();
        }
    
        //For storing answers to array in session. Second condition is to help duplication by page reload.
        if(session()->get('result') == NULL) {
            session(['result' => array()]);
        }
        if(count(session()->get('result')) == $page_number) {
            Session::push('result', $correct);
        }

        //For going to next lessonAnswer page.
        $word_answers = $words->get($page_number)->wordAnswers()->get();
        $route = count($words) == $page_number+1 ? 'lessonResult' : 'lessonAnswer';
        return view('lessonAnswer')->with([
            'category' => $category,
            'words' => $words,
            'word_answers' => $word_answers,
            'page_number' => $page_number,
            'route' => $route
        ]);
    }


    public function lessonResult(Category $category, $page_number, $correct)
    {
        $words = $category->words()->get();

        //Storing last answer to array in session. A condition is to help duplication by page reload.
        if(count(session()->get('result')) == $page_number ) {
            Session::push('result', $correct);
        }

        //Storing taken lesson record to lesson model.
        $lesson = new Lesson;
        $lesson->create($category->id, Auth::user()->id);

        //Storing content data of taken lesson to lesson_word model.
        $word_answers = WordAnswer::all()->where('correct', 1);
        for($count = 1; $count <= count($words); $count++) {
            $word_id = $words->get($count-1)->id;
            $lesson_word = new LessonWord;
            $lesson_word->create($lesson->id, $word_id, $word_answers->where('word_id', $word_id)->first()->id);
        }

        //Processing user answers data to display.
        $result = session()->get('result');
        $success = (in_array('1', $result)) ? array_count_values($result)[1] : 0;

        //Storing activity record to activity model.
        $activity = new Activity;
        $activity->create([
            'user_id' => Auth::id(),
            'action_id' => $lesson->id,
            'action_type' => 'learned '. $success. ' of '. count($words). ' words in'   
        ]);

        return view('lessonResult')->with([
            'category' => $category,
            'words' => $words,
            'word_answers' => $word_answers,
            'result' => $result,
            'success' => $success
        ]);
    }
}
