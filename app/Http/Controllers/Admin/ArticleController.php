<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Tag;
use App\Role;
use Str;
use Illuminate\Http\Request;
use Auth;

class ArticleController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('article_access'), 403);

        $articles = Article::with('articleUser')->latest('created_at')->get();
        $articles = Article::with('categories')->get();
        // dd($articles);

        return view('admin.article.index', compact('articles'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('article_create'), 403);

        $categories = Category::all()->pluck('category_name', 'id');
        $tags = Tag::all()->pluck('tag_name', 'id');

        return view('admin.article.create', compact('categories', 'tags'));
    }

    // public function store(StoreArticleRequest $request)
    // {
    //     abort_unless(\Gate::allows('article_create'), 403);

    //     $article = Article::create($request->all());
    //     $article->categories()->sync($request->input('categories', []));
    //     $article->tags()->sync($request->input('tags', []));

    //     return redirect()->route('admin.article.index');
    // }

    public function store(Request $request){


         /* start image part */
         if ($request->hasFile('featured_photo')) {
            $file = $request->file('featured_photo');
            $featured_photo = 'article_photo_'.md5(mt_rand(11111111,99999999)).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/article-featured-image'),$featured_photo);
        }
        /* end image part */

        $article = Article::create([
            'title'            => $request->title,
            'slug'             => Str::slug($request->slug),
            'content'    =>    $request->content,
            'posted_date'        => date('Y-m-d',strtotime($request->posted_date)),
            'featured_photo'     => $featured_photo,
            'meta_title'       => $request->meta_title,
            'meta_description' => $request->meta_description,
            'created_by'=>Auth::user()->id,
        ]);
        $article->categories()->sync($request->input('categories', []));
         $article->tags()->sync($request->input('tags', []));
        return redirect()->route('admin.article.index');
    }

    public function edit(Article $article)
    {
        abort_unless(\Gate::allows('article_edit'), 403);

        $categories = Category::all()->pluck('category_name', 'id');
        $tags = Tag::all()->pluck('tag_name', 'id');
        $article->load('categories');
        $article->load('tags');

        return view('admin.article.edit', compact('categories', 'tags', 'article'));
    }

    // public function update(UpdateArticleRequest $request, Article $article)
    // {
    //     abort_unless(\Gate::allows('article_edit'), 403);

    //     $article->update($request->all());
    //     $article->categories()->sync($request->input('categories', []));
    //     $article->tags()->sync($request->input('tags', []));

    //     return redirect()->route('admin.article.index');
    // }

    public function update(Request $request, $id)
    {

        $article = Article::findOrFail($id);
        $request['slug'] = Str::slug($request['slug'],'-');
        /* start image part */
        if ($request->hasFile('featured_photo')) {
            $file = $request->file('featured_photo');
            @unlink(public_path('uploads/article-featured-image'.$article->featured_photo));
            $featured_photo = 'featured_photo'.md5(mt_rand(11111111,99999999)).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/article-featured-image'),$featured_photo);
            $article['featured_photo'] = $featured_photo;
        }
        /* end image part */

        $article->title            = $request->title;
        $article->slug             = Str::slug($request->slug);
        $article->content          = $request->content;
        $article->posted_date        = date('Y-m-d',strtotime($request->posted_date));
        $article->meta_title       = $request->meta_title;
        $article->meta_description = $request->meta_description;
        $article->update();
        $article->categories()->sync($request->input('categories', []));
        $article->tags()->sync($request->input('tags', []));
        return redirect()->route('admin.article.index');
    }

    public function show(Article $article)
    {
        abort_unless(\Gate::allows('article_show'), 403);

        $article->load('categories');
        $article->load('tags');

        return view('admin.article.show', compact('article'));
    }

    public function destroy(Article $article)
    {
        abort_unless(\Gate::allows('article_delete'), 403);

        $article->delete();

        return back();
    }

    public function massDestroy(MassDestroyArticleRequest $request)
    {
        Article::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
