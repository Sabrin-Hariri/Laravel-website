<?php

namespace App\Http\Controllers; 
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Auth;
class PostController extends Controller
{
    //// security  
    public function __construct(){
         $this->middleware('auth');
    }

    public function index()
    {

      $post=Post::all( );
      return view('posts.index')->with('post' , $post);
    }

    public function create()
    {
        $tags=Tag::all( );
        if($tags->count() ==0){
        return redirect()->route('tag.create');
        }
        return view('posts.create')->with('tags' , $tags);
        
    }

    public function postTrashed()
    {   
       $posts=Post::onlyTrashed()->get();
       return view('posts.trashed')->with('posts' , $posts);

    } 
/// slug : ليس اليوزر بختارها مشان ما تصير في اخطاء في الداتابيس
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'contnet'=>'required',
            'photo'=>'required|image',
        ]);

        $photo=$request->photo;
        //لازم جزء الصوره لاضمن انو كل ما تصير  احطاء 
    $newphoto=time().$photo->getClientOriginalName();///  بفصل الصوره عن امتدادها وبربطها بالوقت 
    $photo->move('public/uploads/posts' ,$newphoto);      
    //لسا الداتا ببي فارغه 
    $post=Post::create([
        'user_id'=>Auth::id(),
        'title'=>$request->title,
        'contnet'=>$request->contnet,
        'photo'=>'public/uploads/posts/'.$newphoto,
        'slug'=>str_slug('$request->title'),  
       
    ]) ;  
    return redirect()->back();
    }

    public function edit($id)
    {    //$post = Post::findOrFail($id);

        $post=Post::find($id);
      return view('posts.edit')->with('post', $post);
    //return '$post'.$id; 

    }

    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required'

        ]); 
        ///$post->id 
        session()->flash('success', 'Post updated succesfully.');

        dd($request->all());
        ///في حاله بدو يغير الصوره 
        if($request->has('photo')){
            $photo=$request->photo;
            $newphoto=time().$photo->getClientOriginalName();
            $photo->move('public/uploads/posts',$newphoto);   
            $post->photo='public/uploads/posts/'.$newphoto;    

        }

        $post->title=$request->title; 
        $post->content=$request->content;
        $post->save() ;
    return redirect()->back();
    }

    public function show($slug)
    {
        $post=Post::where('slug' , $slug)->first();
        return view('posts.show')->with('post', $post);
        ///return view('posts.show', ['post' => $post]);



    }


    public function destroy($id)
    {
    $post=Post::find($id);
    $post->delete(); 
    return redirect()->back();
        

    }
    public function hdelete($id)
    {
        
    $post=Post::withTrashed()->where('id',$id)->first();
    $post->forceDelete();
    return redirect()->back();
        
    }
    public function restore($id)
    {
    //$post=Post::withTrashed()->where('id',$id)->first();
       /// $post = Post::withTrashed()->findOrFail($id);
      //  Post::withTrashed()->find($id)->restore();
     //Post::onlyTrashed()->where('id', $id)->restore();
   // $post = Post::findOrFail($id);
  
  $post=Post::onlyTrashed()->restore();
  
//       if ($post != null) {
//         $post->restore();}
 return redirect()->back();
 //  return redirect('/blog/post?status=trash',$post->$id);

            }





}
