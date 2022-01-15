<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Carbon\Carbon;
use App\Post;
use App\Category;
use App\Subcategory;
use App\User;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      
        $posts=Post::where('user_id',Auth::id())
                    ->where('status','=',1)
                    ->get();
        
        return view('author.post.index',compact('posts'));
        
    }

    
    public function create()
    {
     
        $posts=Post::all();
        
        // $catid=Auth::user()->category_id;  // [1,2,7]
        // =implode(',',$catid)

        // 1
        // 2
        // 7

        //$data=Auth::user()->category_id;
       

        // $data = json_decode($data);
        // foreach($data as $item){
        //     if (isset($item->Type1)) {
        //         return $item->Type1;
        //         };
        // };
       

        //$categories[]=implode(',',$catid);
        //$categories = explode(',',$catid);
       
         //$categories=DB::table('categories')->where('id',Auth::user()->category_id)->first();

     
                   
        //$categories=Category::where('id',Auth::user()->category_id)->get();
        $categories=Category::where('status',1)->get();
        
       

        $subcategories=Subcategory::all();
        
    return view('author.post.create',compact('posts','categories','subcategories'));
       
    }

    public function GetSubCatAgainstMainCatEdit($id){
        

        echo json_encode(DB::table('subcategories')->where('category_id', $id)->get());
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            
            'title_bn' => 'required|unique:posts',
           
            'details_bn' => 'required',
            //'subcategory_id' => 'required',
            'category_id' => 'required',
         
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $posts= new Post();
        
           
        $image = $request->file('image');
        $slug = Str::of($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //if(!Storage::disk('public')->exists('post'))
            //{
            //    Storage::disk('public')->makeDirectory('post');
            //}
            if (!file_exists('uploads/post'))
            {
                mkdir('uploads/post',0777,true);
            }
            //$image->move('uploads/item',$imagename);

          
           // $img = Image::make('public/foo.jpg')->resize(320, 240)->insert('public/watermark.png');
            //Image::make($image)->resize(500, 333)->save(storage_path('app/public/post/') .$imageName);
            Image::make($image)->resize(320, 240)->save('uploads/post/'.$imageName);

        } else {
            $imageName = "default.png";
        }
       
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->title_bn);
        $slugen = Str::of($request->title_en)->slug('-');

        $posts->slug_bn= $slug;
     

     
        $posts->title_bn= $request->title_bn;
        
        $posts->details_bn= $request->details_bn;


       
        $posts->published_date = Carbon::now()->toDateTimeString();

        $posts->category_id= $request->category_id;
       
        $posts->user_id = Auth::id();
        $posts->thumbnail= 0;
        $posts->image = $imageName;
      
        $posts->status= 2;

      

        $posts->save();

  
            
        return redirect('/author/post')->with('successMsg', 'Post saved!');
    }

    // public function edit($id)
    // { 
    //     $posts=Post::findOrFail($id);
    //     $categories=Category::where('id',Auth::user()->category_id)->get();
    //     $subcategories=Subcategory::all();
    //     $users=User::all();
    //     return view('author.post.edit',compact('posts','categories','subcategories','users'));
    // }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
          
            'title_bn' => 'required',
         
            'details_bn' => 'required',
          
            'tages_bn' => 'required',
            'category_id' => 'required',
           
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);


        $posts = Post::find($id); 
        $image = $request->file('image');
        $slug = Str::of($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //if(!Storage::disk('public')->exists('post'))
            //{
            //    Storage::disk('public')->makeDirectory('post');
            //}
            if (!file_exists('uploads/post'))
            {
                mkdir('uploads/post',0777,true);
            }
            //$image->move('uploads/item',$imagename);

          
           // $img = Image::make('public/foo.jpg')->resize(320, 240)->insert('public/watermark.png');
            //Image::make($image)->resize(500, 333)->save(storage_path('app/public/post/') .$imageName);
            Image::make($image)->resize(320, 240)->save('uploads/post/'.$imageName);

        } else {
            $imageName = "default.png";
        }
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        
        $slug = make_slug($request->title_bn);

        //$slug = Str::of($request->title_bn)->slug('-');
        $slugen = Str::of($request->title_en)->slug('-');

        $posts->slug_bn= $slug;
       

       
        $posts->title_bn= $request->title_bn;
        
       
        $posts->details_bn= $request->details_bn;

        

       
        $posts->published_date = Carbon::now()->toDateTimeString();

        $posts->category_id= $request->category_id;
       
        $posts->thumbnail= 0;
        $posts->user_id = Auth::id();

        $posts->image = $imageName;
      
        $posts->status= 1;
    
        $posts->update();

            
        return redirect('/author/post')->with('successMsg', 'Post Update!');

    }



    public function show($id)
    {
     
        $post=Post::findOrFail($id);
        return view('author.post.show',compact('post'));
    }




    public function destroy( $id)
    {
        

        // $post = Post::find($id);
        // if (Storage::disk('public')->exists('post/'.$post->image))
        // {
        //     Storage::disk('public')->delete('post/'.$post->image);
        // }
     
        // $post->delete();

        $post = Post::find($id);
        if (file_exists('uploads/post/'.$post->image))
        {
            unlink('uploads/post/'.$post->image);
        }
        $post->delete();
     
        return redirect()->route('author.post.index')->with('successMsg', 'Post delete!');
    }


}
