<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Typeutilisateur;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        $typesusers = Typeutilisateur::all();
        return view('auth.register', compact('typesusers'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
 
    public function store(Request $request)
{
    

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'prenom' => ['required', 'string', 'max:255'],
        'quartier' => ['required', 'string', 'max:255'],
        'ville' => ['required', 'string', 'max:255'],
        'pays' => ['required', 'string', 'max:255'],
        'photo' => ['required', 'image', 'max:2048'],
        'tel' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'idtypeutilisateur' => ['required', 'numeric'],
    ]);

    
        //creer nouveau nom image
        $filename = time() . ' ' .$request->photo->extension(); 


        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'quartier' => $request->quartier,
            'ville' => $request->ville,
            'pays' => $request->pays,
            'photo' => $request->file('photo')->storeAs('imagesprofil', $filename, 'public'),
            'tel' => $request->tel,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'idtypeutilisateur'=>$request->idtypeutilisateur,
        ]);

       
      
         event(new Registered($user));
         Auth::login($user);

         $userphoto = Auth::user()->photo;
        
         return redirect(route('dashboard'))->with('userphoto', $userphoto);
     

    
}


}

