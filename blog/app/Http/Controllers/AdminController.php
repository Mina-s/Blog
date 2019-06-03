<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Post;
use App\User;
use App\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $billet = Post::Orderby('id', 'desc')->limit(10)->get();
        $comment = Comment::Orderby('id', 'desc')->limit(10)->get();
        $user = User::Orderby('id', 'desc')->limit(10)->get();
        return view('admin.admin',[
            'billet'=> $billet,
            'user' => $user,
            'comment' => $comment
        ]);
    }

    public function showUser()
    {
        $user = User::paginate(1);
        return view('admin.show-user',[
            'user' => $user
        ]);
    }

    public function showBillet()
    {
        $billet = Post::paginate(10);
        return view('admin.show-post',[
            'billet' => $billet
        ]);
    }

    public function showComment()
    {
        $comment = Comment::paginate(2);
        return view('admin.show-comment',[
            'comment' => $comment
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
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
