<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Auth;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //получаем все статьи пользователя
        $articles=Article::where('user_id', Auth::user()->id) ->orderBy('id','DESC')->get();

        return view('home', compact('articles'));
    }

    public function postIndex(Request $request){
        if ($request->hasFile('picture1')){
            $pic= App::make (App\Utils\Imag::class)->url($request->picture1);
            $request['picture'] = 'uploads/'.Auth::user()->id.'/'.$pic;

        }
        unset($request['_token']);
        $request['user_id']=Auth::user()->id;
        Article::create($request->all());
        return redirect()->back();

    }

    public function getDelete(Article $article)
    {
        if ($article->picture) {
            //dd($article->picture);
            //Storage::delete($article->picture);
            unlink(storage_path('app/public/'.$article->picture));

        }
        $article->delete();
        return redirect()->back();
    }

    public function postEdit(Request $request, Article $article ) {

        if ($request->hasFile('picture1')){
            if($article->picture){
                unlink(storage_path(path: 'app/public/'.$article->picture));
            }
            $pic= App::make (App\Utils\Imag::class)->url($request->picture1);
            $newPicture='uploads/'.Auth::user()->id.'/'.$pic;
            $article->picture=$newPicture;
        }
        $article->name = $request->name;
        $article->body = $request->body;
        $article->save();
        return redirect('home');



    }
    public function getEdit(Article $article ) {
       return view('article_edit', compact('article'));

    }
}
