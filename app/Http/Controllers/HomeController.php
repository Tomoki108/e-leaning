<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard', [
            'user' => Auth::user(),
            'count_words_learned' => Auth::user()->countWordsLearned(),
            'activities' => Auth::user()->getActivitiesToDisplay()
        ]);
    }

    public function wordsLearned()
    {
        $words_learned = Auth::user()->wordsLearned();
        return view('wordsLearned', [
            'user' => Auth::user(),
            'count_words_learned' => Auth::user()->countWordsLearned(),
            'words' => $words_learned['words'],
            'word_answers' => $words_learned['word_answers']
        ]);
    }

    public function followers()
    {
        return view('dashboardFollowers', [
            'user' => Auth::user(),
            'count_words_learned' => Auth::user()->countWordsLearned(),
            'followers' => Auth::user()->getFollowers()
        ]);
    }

    public function following()
    {
        return view('dashboardFollowing', [
            'user' => Auth::user(),
            'count_words_learned' => Auth::user()->countWordsLearned(),
            'followings' => Auth::user()->getFollowings()
        ]);
    }
}
