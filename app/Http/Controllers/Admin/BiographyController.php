<?php

namespace App\Http\Controllers\Admin;

use App\Biography;
use App\QuickFact;
use App\TableOfContent;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Tag;
use App\Role;
use Str;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Yajra\DataTables\DataTables;

class BiographyController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('biography_access'), 403);
        $articles = Biography::all();
        return view('admin.biography.index', compact('articles'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('biography_access'), 403);

        $tags = Tag::all()->pluck('tag_name', 'id');

        return view('admin.biography.create', compact('tags'));
    }

    public function store(Request $request){


        /* start image part */
        if ($request->hasFile('biography_photo')) {
           $file = $request->file('biography_photo');
           $biography_photo = 'biography_photo_'.md5(mt_rand(11111111,99999999)).'.'.$file->getClientOriginalExtension();
           $file->move(public_path('uploads/biography-image'),$biography_photo);
       }
       /* end image part */

       $biography = Biography::create([
           'title'            => $request->title,
           'slug'             => Str::slug($request->slug),
           'title_tag'            => $request->title_tag,
           'relationship_status'    =>    $request->relationship_status,
           'anniversary_date'    =>    $request->anniversary_date,
           'birth_date'    =>    $request->birth_date,
           'relationship_fact'    =>    $request->relationship_fact,
           'more_about_relationship'    =>    $request->more_about_relationship,
           'biography_photo'     => $biography_photo,
           'facebook_link'       => $request->facebook_link,
           'twitter_link'       => $request->twitter_link,
           'instagram_link'       => $request->instagram_link,
           'tiktok_link'       => $request->tiktok_link,
           'youtube_link'       => $request->youtube_link,
           'imdb_link'       => $request->imdb_link,
           'website_link'       => $request->website_link,
           'twitch_link'       => $request->twitch_link,
           'meta_title'       => $request->meta_title,
           'meta_description' => $request->meta_description,
           'created_by'=>Auth::user()->id,
       ]);
        $biography->tags()->sync($request->input('tags', []));
       return redirect()->route('admin.biography.index');
   }

   public function edit(Biography $biography)
    {
        abort_unless(\Gate::allows('article_edit'), 403);
        $tags = Tag::all()->pluck('tag_name', 'id');
        $biography->load('tags');

        return view('admin.biography.edit', compact('biography', 'tags'));
    }

    public function update(Request $request, $id)
    {

        $biography = Biography::findOrFail($id);
        /* start image part */
        if ($request->hasFile('biography_photo')) {
            $file = $request->file('biography_photo');
            @unlink(public_path('uploads/biography-image'.$article->biography_photo));
            $biography_photo = 'biography_photo'.md5(mt_rand(11111111,99999999)).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/biography-image'),$biography_photo);
            $article['biography_photo'] = $biography_photo;
        }
        /* end image part */

        $biography->title            = $request->title;
        $biography->slug             = Str::slug($request->slug);
        $biography->title_tag          = $request->title_tag;
        $biography->relationship_status          = $request->relationship_status;
        $biography->anniversary_date          = $request->anniversary_date;
        $biography->birth_date          = $request->birth_date;
        $biography->relationship_fact          = $request->relationship_fact;
        $biography->more_about_relationship          = $request->more_about_relationship;
        $biography->facebook_link       = $request->facebook_link;
        $biography->twitter_link       = $request->twitter_link;
        $biography->instagram_link       = $request->instagram_link;
        $biography->tiktok_link       = $request->tiktok_link;
        $biography->youtube_link       = $request->youtube_link;
        $biography->imdb_link       = $request->imdb_link;
        $biography->website_link       = $request->website_link;
        $biography->twitch_link       = $request->twitch_link;
        $biography->meta_title       = $request->meta_title;
        $biography->meta_description = $request->meta_description;
        $biography->update();

        $biography->tags()->sync($request->input('tags', []));
        return redirect()->route('admin.biography.index');
    }

    public function insertQuickFact(Request $request){

        $id =  $request->input('qf_id');
        if($id != 0)
        $quickFact = QuickFact::find($id);
        else
        $quickFact = new QuickFact();

        $quickFact->biography_Id = $request->input('articleid');
        $quickFact->title = $request->input('title');
        $quickFact->content = $request->input('content');
        $quickFact->seq_no = $request->input('seq_no');
        $quickFact->save();

    }

    public function QuickFacts($id)
    {

        $quickFact= QuickFact::where('biography_id', $id)->orderBy('seq_no', 'asc')->get();
        
        return Datatables::of($quickFact)
        ->addColumn('action', function ($user) {
            $html = '<div class="btn-group">';
            $html .= '<a data-toggle="tooltip" href="#" id="' . $user->id . '" class="btn btn-xs btn-info mr-1 edit" title="edit"><i class="fa fa-pencil-square-o"></i> </a>';
            $html .= '<a data-toggle="tooltip" href="#" id="' . $user->id . '" class="btn btn-xs btn-info ml-2 delete" title="delete"><i class="fa fa-trash"></i> </a>';
            
            $html .= '</div>';
            return $html;
        })
        ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function QuickFactsDelete(Request $request){
       
        $quickFact = QuickFact::where('id', $request->get('id'))->first();
        $quickFact->delete();
        return response()->json(['type' => 'success', 'message' => "Successfully Deleted"]);
    }

    public function QuickFactsEdit(Request $request){
       
        $quickFact = QuickFact::where('id', $request->get('id'))->first();
        return response()->json($quickFact);
    }

    public function insertTableOfContent(Request $request){

        $id =  $request->input('toc_id');
        if($id != 0)
        $tableOfContent = TableOfContent::find($id);
        else

        $tableOfContent = new TableOfContent();
        $tableOfContent->biography_Id = $request->input('articleid');
        $tableOfContent->seq_no = $request->input('seq_no');
        $tableOfContent->question = $request->input('question');
        $tableOfContent->answer = $request->input('answer');
        $tableOfContent->save();

    }

    public function TableOfContents($id)
    {

        $tableOfContent= TableOfContent::where('biography_id', $id)->orderBy('seq_no', 'asc')->get();
        
        return Datatables::of($tableOfContent)
        ->addColumn('action', function ($user) {
            $html = '<div class="btn-group">';
            $html .= '<a data-toggle="tooltip" href="#" id="' . $user->id . '" class="btn btn-xs btn-info mr-1 edit" title="edit"><i class="fa fa-pencil-square-o"></i> </a>';
            $html .= '<a data-toggle="tooltip" href="#" id="' . $user->id . '" class="btn btn-xs btn-info mr-1 delete" title="delete"><i class="fa fa-trash"></i> </a>';

            $html .= '</div>';
            return $html;
        })
        ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function TableOfContentsDelete(Request $request){
       
        $tableOfContent = TableOfContent::where('id', $request->get('id'))->first();
        $tableOfContent->delete();
        return response()->json(['type' => 'success', 'message' => "Successfully Deleted"]);
    }

    public function TableOfContentsEdit(Request $request){
       
        $tableOfContent = TableOfContent::where('id', $request->get('id'))->first();
        return response()->json($tableOfContent);
    }
}
