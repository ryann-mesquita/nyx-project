<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MovieRent;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){

        $user = User::where('id', 1)->first();
        $user->password = bcrypt('teste');
        $user->save();

        if(Auth::check() === true) {
            return redirect()->route('admin.home');
        }

        return view('admin.index');
    }
    public function home(){

        $movies_rented = MovieRent::orderBy('created_at', 'ASC')
        ->get();


        return view('admin.dashboard', ['movies_rented' => $movies_rented]);
    }
    public function login(Request $request){
        if(in_array('', $request->only('email', 'password'))){
            $json['message'] = $this->message->error("Ooops, informe todos os dados para efetuar o login")->render();
            return response()->json($json);
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $json['message'] = $this->message->error("Ooops, informe um e-mail válido")->render();
            return response()->json($json);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(! Auth::attempt($credentials)){
            $json['message'] = $this->message->error("Ooops, usuário e senha não conferem")->render();
            return response()->json($json);
        }

        $this->authenticated($request->getClientIp());
        $json['redirect'] = route('admin.home');

        return response()->json($json);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

    private function authenticated(string $ip){
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => $ip
        ]);
    }
}
