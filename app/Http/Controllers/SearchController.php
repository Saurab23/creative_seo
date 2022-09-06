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
    // public function getData(Request $request)
    // {
    //     $data['search'] = $request['search_string'];

    //     $search = $request['search_string'] ?? '';
    //     if ($search != "") {
    //         $data['news'] = News::where('lang_id',session('session_lang_id'))
    //                             ->where('title','LIKE',"%$search%")
    //                             ->orWhere('content','LIKE',"%$search%")
    //                             ->orderBy('id','desc')->get();
    //     } else {
    //        $data['news'] = News::where('lang_id',session('session_lang_id'))
    //                             ->orderBy('id','desc')->get();
    //     }
    //     $data['page_search'] = PageSearch::where('lang_id',session('session_lang_id'))->first();

    //     return view('frontEnd.view-search',$data);
    // }

}