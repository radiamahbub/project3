<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Task;
use App\Models\Course;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index(){
        $courses = Course::paginate(16);

        return view('home', compact('courses'));
    }
    public function about(){
        return view("about");
    }

    public function payment(){
        return view("payment");
    }
    public function contact(){
        return view("contact");
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $articles = Article::where('content', 'like', '%' . $query . '%')->get();
        } else {
            $articles = Article::all();
        }

        return view('search-results', compact('articles'));
    }

    public function file()
    {

        if (Auth::user()->role === 'trainer' || Auth::user()->role === 'user') {

            $allBooks = Book::paginate(3);
        }

        // $$books = Book::with('user')
        // ->inRandomOrder()
        // ->paginate(10);

        return view("file", compact("allBooks"));
    }
    public function task()
    {
        //$allTasks = Task::where('user_id',Auth::id())->paginate(5);
        if (Auth::user()->role === 'trainer' || Auth::user()->role === 'user') {

            $allTasks = Task::paginate(5);
        } else {

            //$allTasks = Task::where('user_id', Auth::id())->paginate(5);
        }

        return view('task', compact('allTasks'));
    }

    public function course(){

        //if (Auth::user()->role === 'trainer' || Auth::user()->role === 'user'){

            $allCourses = Course::paginate(16);
        //}

        return view("course", compact('allCourses'));
    }
}
