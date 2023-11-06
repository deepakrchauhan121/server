<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;
use Hash;
use Laravel\Socialite\Facades\Socialite;
class SsoController extends Controller
{
  public function index(){
    return view('dashboard');
  }
     public function login(Request $request)
    {
        // Authenticate the user (e.g., check credentials)
        $user = User::where('email', $request->input('email'))->first();
        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        // Generate a JWT token
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));
    }
    public function logout()
    {
        JWTAuth::invalidate();
        return response()->json(['message' => 'Successfully logged out']);
    }
    // view login page
    public function viewLoginPage(){
     return view('login');
    }
      public function viewRegisterPage(){
     return view('register');
    }
      public function register(Request $request)
    {
      $data =  $request->all();
      User::create($data);
      return redirect()->route('l-page');
    }
    public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}
//
public function handleGoogleCallback()
{
    //  $user = Socialite::driver('google')->user();
    //  User::create([
    //      'name' => $user->name,
    //      'email' => $user->email,
    //      // ... other fields ...
    // ]);
    // if($user){
    //   User::login($user);
    // }
    //  $user = User::where('email', $request->input('email'))->first();
    //     if (!$user || !Hash::check($request->input('password'), $user->password)) {
    //         return response()->json(['message' => 'Invalid credentials'], 401);
    //     }
        // Generate a JWT token
        // $token = JWTAuth::fromUser($user);
    // Handle user registration and login here, typically using the $user data.
    // Redirect the user to the dashboard or home page.
     return redirect()->route('dashboard');
}
}
