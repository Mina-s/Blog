<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
Use App\Post;
Use App\User;
Use App\Tag;

class PostController extends Controller
{
    
    public function new()
    {
        return view('post.new');

    }

    public function store(Request $request)
    {
        $billet = new Post;
       
        request()->validate([
            'title'=>'required|min:3',
            'content'=>'required',
            // 'tags'=>'required',

        ]);
        if(auth()->check() && auth()->user()->id){
            $user_id = Auth::user()->id;
            // dd($user_id);
        }
        // else{
        //     $user_id= Auth::guard('admin')->user()->id;
            

        // }

        $billet->title = request('title');
        $billet->content = request('content');
        $billet->user_id = $user_id;
        $billet->save();

        $tags=$request->get('tags');
        if($tags!== null){
            $billet->saveTags($tags);

        }
        return redirect()->route('billet.list',['billet'=>'$billet']);
      
       
    }
    public function tag($slug)
    {
        $tag= Tag::where('slug',$slug)->first();
        $billet = $tag->posts()->paginate(5);
        // dd($tag);
        return view('post.list',[
            'billet' => $billet
        ]);

    }

    public function list()
    {
        $billet= Post::with('tags')->paginate(2);
     
        return view('post.list', [
            'billet' => $billet, 
            ]);

    }

    public function show($id)
    {
        $billet = Post::where('id',$id)->firstOrFail();
        // dd($billet);
        return view('post.show',[
            'billet' => $billet,
        ]);
    }

    public function mesbillet($id)
    {
        $user = User::find($id);
        // dd($user);
        return view('post.mesbillet',[
            'user' => $user,
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
    

        $billet = Post::find($id);
        // dd($user);

        if ($billet == null ){
        return redirect('/billet/list')->with('success', 'Post doesnt exit');
        }
        else{
            return view('post.edit', compact('billet'));
        }
       
    }
  
   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $billet = Post::findOrFail($id);
        $billet->delete();

        return redirect('billet/list')->with('success', 'Ads has been delete');
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
        $request->validate([
            'title'=>'required',
            'content'=> 'required',
         
          ]); 
    
          $billet = Post::find($id);
          $billet->title = $request->get('title');
          $billet->content = $request->get('content');
    
          $billet->save();
          
          $tags=$request->get('tags');
          if($tags!== null){
              $billet->saveTags($tags);
  
          }
    
          return redirect('billet/list')->with('success', 'Ads has been updated');
    }


 
}
