<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon;
use File;
use DB;
use App\Category;
use App\Article;
use App\User;
use App\Tag;

class FrontendController extends Controller
{
    public function index()
    {
        
        $articles = Article::with('articleUser')->latest('created_at')->get()->take(4);
        $categories = Category::all();
        $user = User::all();

//        dd($articles);
        
        return view('frontend.article.index', compact('articles', 'categories', 'user'));
    
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
}