<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;


class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //login
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
      
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
          // select * from users WHERE users and password
          // 1 ligne
          // si la connexion a réussie, ouvre une session

          $credentials = $request->only('email', 'password'); // on récupère seulement les deux variables saisie
          if(!Auth::validate($credentials)):    // si les saisies n'équals pas les champs correspondant du DB, retourner avec une erreur
            return redirect('login')->withErrors(trans('auth.failed')); // lang/en/auth.php/failed
          endif;

          $user = Auth::getProvider()->retrieveByCredentials($credentials);//mémoriser dans la session nommé Auth 
          Auth::login($user, $request->get('remember')); // sauvegarder dans le cookies

          return redirect()->intended('dashboard')->withSuccess('Connecté');// par exemple :  vous êtes actuelment sur la page dashboard ,  entrer dans navigateur le URI comme '127.0.0.1:8000/blog' sans login, votre page destinée est le blog. Mais vous êtes obligé de passer à la middleware de l'authentification ce qui vous amène à la page login au lieu de page dashboard, c'est tous ce qui explique redirect()->intended(dashboard) , après ça vous serez rendu à la page blog en passant une message {{ session('success')}} dans le view  blog/dashboard qui va afficher 'Connecté' sur la page blog
    }

    public function dashboard()
    {
        $name = "Bienvenue";
        if (Auth::check()){
            $name = Auth::user()->name;
        }
        return view('blog.dashboard', ['name' => $name]);
    }

    public function logout() 
    {
        Session::flush();
        Auth::logout();

         return redirect(route("login"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('auth.registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            //  'password' =>'required|confirmed|min:6|max:20|',
            'password' => [
                'required',
                'string',
                Password::min(8) // must be at least 8 characters in length
                    ->mixedCase() // must contain at least one lowercase letter and one uppercase letter
                    ->numbers() // must contain at least one digit
                    ->symbols(), // must contain a special character
                'confirmed' // must match with password confirmation
                ],
            'password_confirmation' => 'required_with:password|same:password',
        ]);
        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect(route('login'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
