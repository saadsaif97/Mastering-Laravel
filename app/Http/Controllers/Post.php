<?php

namespace App\Http\Controllers;

use App\Models\Post as ModelsPost;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class Post extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = DB::table('posts')->get();
        return view('post.index', compact('posts'));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required|max:100|unique:posts,title',
        ],[
            'title.required' => 'To create, please provide title',
            'title.unique' => 'To create, please provide title that is unique',
            'title.max' => 'To create, please provide title that is shorter than 100 charecters',
        ]);

        ModelsPost::create($data);

        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = DB::table('posts')->where('id','=',$id)->get();
        return $post;
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
        $data = request()->validate([
            'title' => 'required|max:100|unique:posts,title',
        ],[
            'title.required' => 'To edit, please provide title',
            'title.unique' => 'To edit, please provide title that is unique',
            'title.max' => 'To edit, please provide title that is shorter than 100 charecters',
        ]);

        DB::table('posts')->where('id',$id)->update($data);

        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('posts')->delete($id);
        return back();
    }
}
