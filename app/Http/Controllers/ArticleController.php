<?php

namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(10);

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new Article();
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;
        $this->validate($request,
            [
                'title' => 'required|min:5',
                'content' => 'required|min:10',
                'image' => 'required'
            ],
            [
                'title.required' => 'Titre requis',
                'title.min' => 'Minimum 5 caractères',

                'content.required' => 'Contenu requis',
                'content.min' => 'Minimum 10 caractères'
            ]);
        $image->title = $request->title;
        $image->content = $request->content;
        if ($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp . '-' . $file->getClientOriginalName();

            $image->filePath = $name;

            $file->move(public_path() . '/images/', $name);
        }
        $image
            ->fill($input)
            ->save();
        return redirect()->route('article.index')->with('success', 'L\'article a bien été publié');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = new Article();
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;
        $this->validate($request,
            [
                'title' => 'required|min:5',
                'content' => 'required|min:10',
                'image' => 'required'
            ],
            [
                'title.required' => 'Titre requis',
                'title.min' => 'Minimum 5 caractères',

                'content.required' => 'Contenu requis',
                'content.min' => 'Minimum 10 caractères'
            ]);
        $image->title = $request->title;
        $image->content = $request->content;
        if ($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp . '-' . $file->getClientOriginalName();

            $image->filePath = $name;

            $file->move(public_path() . '/images/', $name);
        }
        $image
            ->fill($input)
            ->save();

        return redirect()->route('article.index')->with('success', 'L\'article a bien été modifié');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->route('article.index')->with('success', 'L\'article a bien été supprimé');
    }
}
