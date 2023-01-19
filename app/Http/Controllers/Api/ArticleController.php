<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $article = Article::latest()->paginate(10);

        // return response()->json(ArticleResource::collection($article));

        return $article;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $article = Article::create($request->all());

        return response()->json($article, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return response()->json([new ArticleResource($article)], 200);

        // return $article;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return response()->json($article, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);

        return response()->json(null, 204);
    }

    public function views($id)
    {
        $article = Article::findOrFail($id);
        $article->increment('views');
        return response([
            'status' => 'success',
            'message' => "Your message has been successfully sent",
        ], 200);
    }

    public function likes($id)
    {
        $article = Article::findOrFail($id);
        $article->increment('likes');

        return response([
            'status' => 'success',
            'message' => "Your message has been successfully sent",
        ], 200);
    }
}
