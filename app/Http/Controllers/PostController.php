<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Http\Requests\SavePostRequest;
use App\Post;
use App\Setting;
use App;

class PostController extends Controller
{
    
    protected $repo;
    
    /**
     * Use Laravel's dependency injection to get a PostRepository and save as
     * a property of the controller.
     * @param PostRepository $repo
     */
    public function __construct(PostRepository $repo){
        $this->repo = $repo;
        
        //authentication middleware for certain routes
        $this->middleware('auth', ['except' => [
            'index',
            'view',
        ]]);
    }
    
    /**
     * Run when the user is viewing the homepage. Displays a list of all the
     * posts in a paginated fashion.
     * @return type
     */
    public function index(){
        //retrieve the posts from the repository
        $posts = $this->repo->byPage(10, ['is_published' => 1]);
        
        //return the index view with the list of posts
        return view('index', [
            'posts' => $posts,
        ]);
    }
    
    /**
     * View a particular post.
     * @param Request $request
     */
    public function view(Request $request){
        //search for a post by its URL.
        $post = $this->repo->byUrl($request->post);
        
        //if the post cannot be found, redirect to the error page
        if(is_null($post) || $post->is_published == 0){
            App::abort(404);
        }
        
        //return th view which displays the post
        return view('post', [
            'post' => $post,
        ]);
    }
    
    /**
     * Simply display the create page
     * @return view
     */
    public function showCreateForm(){
        return view('create', [
            'mode' => 'create'
        ]);
    }
    
    /**
     * Create a new post
     * @param SavePostRequest $request
     * @return redirect
     */
    public function create(SavePostRequest $request){
        //create and populatea post object and save to the database.
        $post = new Post;
        $post->title = $request->title;
        $post->published_at = $request->published_at;
        $post->url = $request->url;
        $post->contents = $request->contents;
        if($request->is_published == 'on'){
            $post->is_published = 1;
        }else{
            $post->is_published = 0;
        }
        $this->repo->create($post);
        
        //and redirect back to the admin page
        return redirect('/admin');
    }
    
    /**
     * Handle an upload
     * @param Request $request
     * @return JSON
     */
    public function upload(Request $request){
        //get the file from the request
        $file = $request->file('upload');
        
        //work out the folder/filename to create
        $folder = public_path().'/img';
        $newName = 'img_'.time().'.'.$file->extension();
        
        //move the file into the new folder
        $file->move($folder, $newName);
        
        //and respond to the CKEditor with the appropriate parameters
        return response()->json([
            'uploaded' => true, 
            'fileName' => $folder.'/'.$newName,
            'url' => url('img/'.$newName)
        ]);
    }
    
    /**
     * Show the admin page, which lists all of the existing posts
     * @return view
     */
    public function admin(){
        //retrieve the posts from the repository
        $posts = $this->repo->byPage(10);
        
        //return the index view with the list of posts
        return view('admin', [
            'posts' => $posts,
        ]);
    }
    
    /**
     * Edit an existing post
     * @param integer $id
     * @return view
     */
    public function showEditForm($id){
        $post = $this->repo->byId($id);
        return view('create', [
            'mode' => 'edit',
            'published_at' => $post->published_at,
            'is_published' =>$post->is_published,
            'title' => $post->title,
            'url' => $post->url,
            'contents' => $post->contents,
            'id' => $post->id
        ]);
    }
    
    /**
     * Update a post
     * @param SavePostRequest $request
     */
    public function update(SavePostRequest $request){
        //find the post by ID - it will fail with an error if the post doesn't exist
        $post = $this->repo->byId($request->id);
        
        //update the various fields
        $post->published_at = $request->published_at;
        $post->title = $request->title;
        $post->url = $request->url;
        $post->contents = $request->contents;        
        if($request->is_published == 'on'){
            $post->is_published = 1;
        }else{
            $post->is_published = 0;
        }
        
        //and then save back to the DB
        $this->repo->update($post);
        
        //finally, redirect back to the admin page
        return redirect('/admin');
    }
    
    /**
     * Delete a post
     * @param Request $request
     */
    public function delete(Request $request){
        //find the post by ID - it will fail with an error if the post doesn't exist
        $post = $this->repo->byId($request->id);
        
        //use the repo to delete the 
        $this->repo->delete($post);
        
        //and redirect
        return redirect('/admin');
    }
}
