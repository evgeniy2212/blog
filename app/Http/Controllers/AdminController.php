<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\User;
use App\Comments;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = new Articles();
        $articles = $articles->orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.main_page',
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * Store Comment for article
     */
    public function store(Request $request)
    {
        $data = $request->only('text', 'article_id');
        $comment = new Comments($data);
        $comment -> save();
        $id = $data['article_id'];
        return redirect()->route('admin.show', [$id]);
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
//        ->paginate(5)
//        dd($comments);
        return view('admin.post', [
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
