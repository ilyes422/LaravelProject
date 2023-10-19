<?php
namespace App\Http\Controllers;

use App\Http\Controllers\;
use App\Models\User;
use App\Models\Delivery_adresse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
class FormulairePaiementController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('formulaire_paiement');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'forname' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'integer'],
            'city' => ['required', 'string', 'max:255'],
            'add' => ['required', 'string', 'max:255'],
            'add2' => ['nullable', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255']
        ]);

        $form = Delivery_adresse::create([
            'forname' => $request->forname,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'add' => $request->add,
            'add2' => $request->add2,
            'postcode' => $request->postcode,
        ]);
        if ($request->mode_paiement == 'Paypal'){
            return redirect('https://www.paypal.com');
        }
//      if ($request->mode_paiement == 'ChequePapier'){
//            return redirect('/generate-pdf');
//      }
        else{
            return view('panier.show',compact('form'));

        }
    }

}




