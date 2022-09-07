<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use File;
use DB;
use App\Category;
use App\Article;
use App\User;
use App\Tag;
use App\Biography;

class FrontendController extends Controller
{
    public function index()
    {
        
        $articles = Article::with('articleUser')->latest('created_at')->get()->take(4);
        $categories = Category::all();
        $user = User::all();
        $biography = Biography::all();


        $today_anniversary = Biography::whereMonth('anniversary_date', '=', Carbon::now()->format('m'))->whereDay('anniversary_date', '=', Carbon::now()->format('d'))->get()->take(6);
        $upcoming_anniversary = Biography::whereMonth('anniversary_date', '=', Carbon::now()->format('m'))->whereDay('anniversary_date', '=', Carbon::now()->addDays(7)->format('d'))->get();
        
        
        
        //dd($today_anniversary);
        return view('frontend.article.index', compact('articles', 'categories', 'user', 'biography', 'today_anniversary', 'upcoming_anniversary'));
    
    }

    public function category_wise_article($slug){
        $single_cat = Category::where('slug',$slug)->with('articles')->first();
        $articles = $single_cat->articles()->with('tags')->get();
        //dd($single_cat);
        return view('frontend.article.article_wise_category', compact('single_cat', 'articles'));
    }

    public function viewDetail($slug)
    {
        // dd($slug);
        $allArticle = Article::with('categories')->get();
        $article = Article::where('slug', $slug)->with('categories', 'articleUser', 'tags')->first();
        //$articles = Article::with('categories','tags')->get();
        //dd($allArticle); 
        return view('frontend.article.viewDetail', compact('article', 'allArticle'));
    }

    public function biographyIndex(){

        $biography = Biography:: all();
        //dd($biography);
        return view('frontend.biography.index', compact('biography'));
    }

    public function findTodayAnniversary(){
        
        $today_date = Carbon::now()->toDateTimeString();
        //dd($today_date);

        $today_anniversary = Biography::where('anniversary_date','=',$today_date)
        ->get();

        return $get_all_user;
    }
}