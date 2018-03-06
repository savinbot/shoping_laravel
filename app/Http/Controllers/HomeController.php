<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Course;
use App\Jobs\SendMail;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use SEO;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
//        $job = (new SendMail(User::find(1) , 'dasdaafw'));
//        dispatch($job);




        $locale = app()->getLocale();

        SEO::setTitle(__('messages.title'));
        SEO::setDescription('وبسایت آموزشی');

//        if(cache()->has("articles.$locale")) {
//            $articles = cache('articles.' . $locale);
//        } else {
//            $articles = Article::whereLang($locale)->latest()->take(8)->get();
//            cache(["articles.$locale"  => $articles] , Carbon::now()->addMinutes(10));
//        }
//
//        if(cache()->has('courses')) {
//            $courses = cache('courses');
//        } else {
//            $courses = Course::latest()->take(4)->get();
//            cache(['courses' => $courses] , Carbon::now()->addMinutes(10));
//        }

        $articles = Article::latest()->take(8)->get();
        $courses = Course::latest()->take(4)->get();
        return view('Home.index' , compact('articles' , 'courses'));
    }

    public function search()
    {
        $keyword = request('search');

        $articles = Article::search($keyword)->latest()->get();
        return ;
//        return view('');
    }
    public function comment()
    {
        $this->validate(request(),[
            'comment' => 'required|min:5'
        ]);

//        Comment::create(array_merge([
//            'user_id' => auth()->user()->id
//        ], \request()->all()));

        auth()->user()->comments()->create(\request()->all());
        return back();
    }
}
