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
use App\TableOfContent;
use App\QuickFact;
use App\Subscription;

class FrontendController extends Controller
{
    public function index()
    {
        
        $articles = Article::with('articleUser', 'tags')->latest('created_at')->get()->take(4);
        $categories = Category::all();
        $user = User::all();
        $biography = Biography::latest('created_at')->get();
        $dtonemonth = Carbon::now()->addMonth();

        $today_anniversary = Biography::whereMonth('anniversary_date', '=', Carbon::now()->format('m'))->whereDay('anniversary_date', '=', Carbon::now()->format('d'))->get()->take(6);
        $upcoming_anniversary = DB::select("SELECT * FROM biographies  WHERE dayofyear(anniversary_date) - dayofyear(curdate()) between 1 and 10  or dayofyear(anniversary_date) + 365 - dayofyear(curdate()) between 1 and 10");

        //dd($articles[0]->tags[0]);

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
        $allArticle = Article::with('categories')->latest('created_at')->get()->take(6);
        $article = Article::where('slug', $slug)->with('categories', 'articleUser', 'tags')->first();

        $category = Category::find(6)->articles()->orderBy('updated_at', 'desc')->get()->take(4);
        $biography = Biography::latest('created_at')->get()->take(6);


        return view('frontend.article.viewDetail', compact('article', 'allArticle', 'category', 'biography'));
    }

    public function biographyIndex(){

        $biography = Biography:: all();
        //dd($biography);
        return view('frontend.biography.index', compact('biography'));
    }

    public function findTodayAnniversary(){
        

        $today_anniversary = Biography::whereMonth('anniversary_date', '=', Carbon::now()->format('m'))->whereDay('anniversary_date', '=', Carbon::now()->format('d'))->get()->take(6);

        return view('frontend.biography.todaysAnniversary', compact('today_anniversary'));
    }

    public function findUpcomingAnniversary(){
        
        $dtonemonth = Carbon::now()->addMonth();

    $upcoming_anniversary = DB::select("SELECT * FROM biographies  WHERE dayofyear(anniversary_date) - dayofyear(curdate()) between 1 and 10  or dayofyear(anniversary_date) + 365 - dayofyear(curdate()) between 1 and 10");
        return view('frontend.biography.upcomingAnniversary', compact('upcoming_anniversary'));
    }

    public function viewBiographyDetail($slug)
    {
        $biography = Biography::where('slug', $slug)->first();
        $biography->tableofcontent = TableOfContent::where('biography_id',$biography->id)->orderBy('seq_no', 'asc')->get();
        $biography->quickfact = QuickFact::where('biography_id',$biography->id)->orderBy('seq_no', 'asc')->get();

        $recent_biography = Biography::latest('created_at')->get(); 
        //dd($recent_biography[0]->birth_date);
        $sidebar_biography = Biography::latest('created_at')->get()->take(6);

        //$category = Category::where('id', '6')->with('catArt')->first();
        $category = Category::find(6)->articles()->orderBy('updated_at', 'desc')->get()->take(4);
        
        //dd($category);
        return view('frontend.biography.biographyDetail', compact('biography', 'recent_biography', 'sidebar_biography', 'category'));
    }

    public function saveSubscription(Request $request){


        $subscription = Subscription::create([
            'email'            => $request->email,
        ]);

        return redirect()->back()->with('success', 'Successfully Subscribed.'); 
    }

}