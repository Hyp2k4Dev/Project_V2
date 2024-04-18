// <?php


// namespace App\Http\Controllers\BackEnd;

// use App\Http\Controllers\Controller;
// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class LoginController extends Controller
// {
//     /**
//      * Show the login form.
//      *
//      * @return \Illuminate\View\View
//      */
//     public function showLoginForm()
//     {
//         return view('auth.login-register');
//     }

//     /**
//      * Handle an authentication attempt.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\RedirectResponse
//      */
//     public function login(Request $request)
//     {
//         $credentials = $request->validate([
//             'name' => 'required|string',
//             'password' => 'required|string',
//         ]);

//         if (Auth::attempt($credentials)) {
//             if (Auth::user()->role === 'admin') {
//                 return redirect()->route('admin.dashboard');
//             } else {
//                 return redirect()->intended('/');
//             }
//         }

//         return redirect()->route('login')->withErrors([
//             'name' => 'Tên người dùng hoặc mật khẩu không đúng.',
//         ]);
//     }

//     /**
//      * Log the user out of the application.
//      *
//      * @return \Illuminate\Http\RedirectResponse
//      */
//     public function logout()
//     {
//         Auth::logout();

//         return redirect('/');
//     }
//     public function checkUserActiveStatus(Request $request)
//     {
//         $username = $request->input('username');
//         $user = User::where('name', $username)->first();

//         if ($user && $user->is_active === 0) {
//             return response()->json(['is_active' => 0]);
//         }

//         return response()->json(['is_active' => 1]);
//     }
// }
