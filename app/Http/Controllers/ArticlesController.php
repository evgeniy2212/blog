<?php

namespace App\Http\Controllers;

use App\Articles;
use App\User;
use Illuminate\Http\Request;
use App\Comments;

class ArticlesController extends Controller
{
    public function sort_date(Request $request){

        $data = $request->all();

        $date_sort = $data['date'];
//        dd($date_sort);
        $articles = new Articles();
        $articles = $articles->orderBy('created_at', "$date_sort")->paginate(5);
        return view('main_page',
            [
                'articles' => $articles,
            ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = new Articles();
        $articles = $articles->orderBy('created_at', 'DESC')->paginate(5);
        return view('main_page',
            [
                'articles' => $articles,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_article');
    }

    /**
     * Store a newly created resource in storage.
     *w
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('text', 'title', 'user_id');
        $article = new Articles($data);
        $article->save();

        $request->session()->flash('success', 'Article'."\"$article->title\"".'created');

        return redirect()->route('main');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = new Articles();
        $article = $article->find($id);
        $name = $article->user()->get();

        $comments = new Comments();
        $comments = $comments->where('article_id', $id)->orderBy('id', 'DESC')->get();
        return view('post', [
            'article' => $article,
            'name' => $name[0]->name,
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only('text', 'title');

        $article =  Articles::find($id);
        $article->text = $data['text'];
        $article->title = $data['title'];
        $article->id = $id;
        $article->save();

        $request->session()->flash('success', 'Article '."\"$article->title\"".' updated');

        return redirect()->route('admin.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = new Articles();
        $article = $article->find($id);
        $article->delete();

        return redirect()->route('admin.index');
    }
}
