<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'integer'],
            'city' => ['required', 'string', 'max:255'],
            'add' => ['required', 'string', 'max:255'],
            'add2' => ['nullable', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255']
        ]);

        $user = User::create([
                'fname' => $request->fname,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'city' => $request->city,
                'add' => $request->add,
                'add2' => $request->add2,
                'postcode' => $request->postcode,
        ]);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}









//class RegisteredUserController extends Controller {
//
//    /**
//     * Display the registration view.
//     */
//    public function create(): View {
//        return view('auth.register1');
//    }
//
//    /**
//     * Handle an incoming registration request.
//     */
//    public function storeStep1(Request $request): RedirectResponse {
//
//        $request->validate([
//            'fname' => ['required', 'string', 'max:255'],
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
//
//        ]);
//        $request->session()->put('step1', $request->only(['fname', 'name', 'email', 'password']));
//
//        return redirect()->route('register2');
//
//    }
//    public function showStep2()
//    {
//        if ( ! session('step1')) {
//            return redirect()->route('registereduser.create');
//        }
//
//        return view('auth.register2')->with('data', session('step1'));
//    }
//
//
//    public function storeStep2(Request $request)
//    {
//
//        $data = $request->session()->get('step1');
//
//        $request->validate([
//            'phone' => ['required', 'integer'],
//            'city' => ['required', 'string', 'max:255'],
//            'add' => ['required', 'string', 'max:255'],
//            'add2' => ['nullable', 'string', 'max:255'],
//            'postcode' => ['required', 'string', 'max:255']
//        ]);
//
//            $user = User::create([
//                'fname' => $request->fname,
//                'name' => $request->name,
//                'email' => $request->email,
//                'password' => Hash::make($request->password),
//                'phone' => $request->phone,
//                'city' => $request->city,
//                'add' => $request->add,
//                'add2' => $request->add2,
//                'postcode' => $request->postcode,
//        ]);
//
//        event(new Registered($user));
//
//        Auth::login($user);
//
//        return redirect(RouteServiceProvider::HOME);
//
//    }
//
//}
