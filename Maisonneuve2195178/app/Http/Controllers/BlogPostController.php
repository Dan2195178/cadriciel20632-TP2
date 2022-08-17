<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\ShareFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorie;

use Barryvdh\DomPDF\Facade\PDF;

// use DB;
class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        // if(Auth::check()){
            $posts = BlogPost::all(); //SELECT * FROM Blog_Posts
            return view('blog.index', ['posts' => $posts]); //retourne un objet JSON 
        // }
        // return redirect(route('login'))->withErrors(trans('auth.failed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::selectCategorie();
        
        return view('blog.create', ['categories'=>$categories]);
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
        if (Auth::check()){
            $user_id = Auth::user()->id;
        }

        $newBlog = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'categorie_id' => $request->categorie_id,
            'user_id' => $user_id,
        ]);
         return redirect(route('blog.show', $newBlog->id)); //vers le route/web.php au lieu de view blog/show.blade.php
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        //$blogPost = 1 - SELECT * blog_posts WHERE id = 1
        //return $blogPost;
       
        return view('blog.show', ['blogPost' => $blogPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        $categories = Categorie::selectCategorie();
        
        return view('blog.edit', ['blogPost' => $blogPost, 'categories'=>$categories]); //renvoie la vue 'blog/edit.blade.php avec un tableau associatif qui représent le formulaire bien saisies 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        //soumission le formulaire modifié, $request point vers un tableau associatif qui représent l'ensemble de tous les saisies du formulaire
        //$blogPost est model de table associé du DB
        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect(route('blog.show', $blogPost->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        //
        $blogPost->delete();
        // return redirect('/blog');// redirection selon le URI
        return redirect(route('blog')); //chercher le route dans le fichier routes/web.php
    }

    //Generer le fichier PDF 
    public function showPdf(BlogPost $blogPost) {
     
        //$pdf = Pdf::loadView('pdf_view', $data);
        $pdf = PDF::loadView('pdf.show', ['post' => $blogPost]); 
        //return $pdf->download('blog-post.pdf');//télécharger
        return $pdf->stream('blog-post.pdf'); //Afficher, faut télécharger manuellement
       
    }
        

    /**
     * query eloquent
     *
     * @return void
     */
    public function query()
    {

        //SELECT
        // $blog = BlogPost::select()->get();

        // $blog = BlogPost::all();

        // $blog = BlogPost::select('title')->get();

        // $blog = BlogPost::select() 
        // ->where('user_id', '=', 1) 
        // ->get();

        //Clé Primaire
        //$blog = BlogPost::find(1);

        //AND
        //$blog = BlogPost::select()
        //  ->where('user_id', '=', 1) 
        //  ->where('id', '=', 1) 
        //  ->get();

        //OR
        // $blog = BlogPost::select()
        // ->where('user_id', '=', 1)
        // ->orWhere('id', '=', 1)
        // ->get();

        //ORDER BY
        // $blog = BlogPost::select()
        // ->orderBy('id', 'DESC')
        // ->get();

        // INNER JOIN
        // $blog = BlogPost::select()
        // ->join('users', 'blog_posts.user_id', '=', 'users.id')
        // ->get();

        // LEFT / RIGHT OUTER JOIN
        // $blog = BlogPost::select()
        // ->rightJoin('users', 'blog_posts.user_id', '=', 'users.id')
        // ->get();

        // Aggregates Function : Max, Min, Avg, Sum, Count
        //$blog = BlogPost::max('id');
        // $blog = BlogPost::count('*');
        //$blog = BlogPost::avg('id');
        
        // $blog = BlogPost::where('user_id', 1) 
        // ->count('id');

        // $blog = BlogPost::select(DB::raw('count(*) as blogs, user_id'))//DB::raw va creer un table temporaire
        // ->groupBy('user_id')
        // ->get();

        $blog = new BlogPost;//instancie Model
        $blog = $blog->selectBlog(1);

        return $blog;
    }
}
