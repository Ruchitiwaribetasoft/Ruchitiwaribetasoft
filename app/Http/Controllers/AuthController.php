<?php
namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\support\str;
use Illuminate\support\facades\Auth;
use Illuminate\support\facades\Hash;

class AuthController extends Controller
{
    public function googleredirect(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }


    public function googlecallback(Request $request)
    {
        try{
            $userdata = Socialite::driver('google')->user();
            $user= User::where('user_id',$userdata->id)->first();
            if($user){ 
               Auth::login($user);
               return redirect('/home');
            }else{
                $uuid=str::uuid()->toString();
                $newUser = User::updateOrCreate(['email' => $userdata->email],[
                    'name' => $userdata->name,
                    'password' => Hash::make($uuid.now()),
                    'auth_type' => 'google',
                    'user_id' => $userdata->id,
                ]);
                Auth::login($newUser);
                return redirect('/home');
            }
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
