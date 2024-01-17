<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\MyEmail;
use Mail;
use App\Models\Info;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('login');
    }
    public function index()
    {
        $user = Auth::user();
    
        if ($user) {
            // User is logged in
            if ($user->role === 'admin') {
                $users = Info::paginate(10);
                return view('dashboard', compact('users'));
            } elseif ($user->role === 'user') {
                return view('home');
            } else {
                // Handle other roles if needed
                return redirect()->route('login')->with('error', 'Invalid user role.');
            }
        } else {
            // User is not logged in
            return redirect()->route('login')->with('error', 'Please log in to access the dashboard.');
        }
    }
    // public function index()
    // {
    //     $users = Info::paginate(10);
    //     return view('dashboard', compact('users'));
    // }
   
//     public function login(Request $request)
// {
//     $credentials = $request->only('email', 'password');

//     $user = Info::where('email', $credentials['email'])->first();

//     if ($user && Hash::check($credentials['password'], $user->password)) {
//         // Custom logic to manually log in the user
//         session(['user' => $user]);

//         // Redirect to the dashboard or any other page
//         return redirect()->route('dashboard');
//     } else {
//         // Authentication failed, redirect back to login with error message
//         return redirect()->back()->with('error', 'Invalid credentials, please try again.');
//     }
// }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        $user = Info::where('email', $credentials['email'])->first();
    
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return "Username or Password is invalid";
        } else {
            Auth::login($user);
            return redirect()->route('dashboard');
        }
    }
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'title' => 'required|in:mr,ms,mrs',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);
    
        try {
            $user = new Info();
            $user->title = $request->input('title');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            // Set the role based on the submitted value
            $user->role = $request->input('role', 'user');
            $user->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }
    
        // Registration successful, redirect to dashboard or any other page
        return redirect()->route('login.form')->with('success', 'Registration successful. You can now log in.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
    
    public function edit(Info $user)
    {
        return view('edit', compact('user'));
    }

    public function update(Request $request, Info $user)
    {
        $request->validate([
            'title' => 'required|in:mr,ms,mrs',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->title = $request->input('title');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('dashboard')->with('success', 'User updated successfully.');
    }

    public function destroy(Info $user)
    {
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'User deleted successfully.');
    }

}
