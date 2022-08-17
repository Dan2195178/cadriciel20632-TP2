<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App; //config/app.php

class LocalizationController extends Controller
{
    /**
     * @param $locale
     * @return RedirectResponse 
     */
    public function index($locale)
    {
       
        session()->put('locale', $locale); // mémoriser la valeur du 'locale' dans la session, 'locale'->'en' ou 'locale'->'fr'
        return redirect()->back(); //ne pas bouger et rester tel-quel, la page actuel
    }
}
