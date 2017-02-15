<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Request;


class CommentController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request|Request $request
     * @param $post_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'content' => 'required|min:1'
            ],
            [
                'content.required' => 'Contenu requis',
                'content.min' => 'Minimum 1 caractères'
            ]);

        $comment = new Comment();
        $input = $request->input();


        $comment
            ->fill($input)
            ->save();



        $id = $input['post_id'];
        return redirect()->route('article.show', compact('id'))
            ->with('success', 'Le commentaire a bien été ajouté !');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit', compact('comment'));
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
        $this->validate($request,
            [
                'content' => 'required|min:1'
            ],
            [
                'content.required' => 'Contenu requis',
                'content.min' => 'Minimum 1 caractères'
            ]);

        $comment = Comment::find($id);
        $input = $request->input();

        $comment
            ->fill($input)
            ->save();

        $post_id = $request->post_id;
        return redirect()->route('article.show', compact('post_id'))
            ->with('success', 'Le commentaire a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();


        return Redirect::back()->with('success', 'Le commentaire a bien été supprimé !');
    }
}
