<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Mail\OTPMail;
use App\Models\Product;
use App\Helper\JWTToken;
use Illuminate\View\View;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function LoginPage()
    {
        $mainCategories = MainCategory::with('categories')->get();
        $bestSale = Product::where("remark", "popular")->take(4)->get();
        return view('home.auth.login-page', compact('mainCategories', 'bestSale'));
    }
    public function RegistrationPage()
    {
        $mainCategories = MainCategory::with('categories')->get();
        $bestSale = Product::where("remark", "popular")->take(4)->get();
        return view('home.auth.reg-page', compact('mainCategories', 'bestSale'));
    }

    function SendOtpPage():View{
        $mainCategories = MainCategory::with('categories')->get();
        $bestSale = Product::where("remark", "popular")->take(4)->get();
        return view('home.auth.send-otp-page', compact('mainCategories', 'bestSale'));
    }
    function VerifyOTPPage():View{
        $mainCategories = MainCategory::with('categories')->get();
        $bestSale = Product::where("remark", "popular")->take(4)->get();
        return view('home.auth.verify-otp-page', compact('mainCategories', 'bestSale'));
    }
    function ResetPasswordPage():View{
        $mainCategories = MainCategory::with('categories')->get();
        $bestSale = Product::where("remark", "popular")->take(4)->get();
        return view('home.auth.reset-pass-page', compact('mainCategories', 'bestSale'));
    }
    function ProfilePage():View{
        $mainCategories = MainCategory::with('categories')->get();
        $bestSale = Product::where("remark", "popular")->take(4)->get();
        return view('home.dashboard.profile-page', compact('mainCategories', 'bestSale'));
    }



    function UserRegistration(Request $request){
        try {
            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => $request->input('password'),
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'User Registration Successfully'
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ],200);

        }
    }




    // function UserLogin(Request $request){
    //    $count=User::where('email','=',$request->input('email'))
    //         ->where('password','=',$request->input('password'))
    //         ->select('id')->first();

    //    if($count!==null){
    //        // User Login-> JWT Token Issue
    //        $token=JWTToken::CreateToken($request->input('email'),$count->id);
    //        return response()->json([
    //            'status' => 'success',
    //            'message' => 'User Login Successful',
    //            'token'=>$token
    //        ],200)->cookie('token',$token,time()+60*24*30);
    //    }
    //    else{
    //        return response()->json([
    //            'status' => 'failed',
    //            'message' => 'unauthorized'
    //        ],200);

    //    }

    // }
    function UserLogin(Request $request)
        {
            // dd($request);
            $user = User::where('email', $request->input('email'))->first();

            if ($user && Hash::check($request->input('password'), $user->password)) {
                // Generate JWT token for authenticated user
                $token = JWTToken::CreateToken($user->email, $user->id, $user->role);
            
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successfully',
                    'data' => $user->role,
                ], 200)->cookie('token', $token, time() + 60 * 60 * 30); // Set token in cookie
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Unauthorized',
                ], 401);
            }
    
        }

    function UserLogout(){
        return redirect('/')->cookie('token','',-1);
    }




    function SendOTPCode(Request $request){

        $email=$request->input('email');
        $otp=rand(1000,9999);
        $count=User::where('email','=',$email)->count();

        if($count==1){
            // OTP Email Address
            Mail::to($email)->send(new OTPMail($otp));
            // OTO Code Table Update
            User::where('email','=',$email)->update(['otp'=>$otp]);

            return response()->json([
                'status' => 'success',
                'message' => '4 Digit OTP Code has been send to your email !'
            ],200);
        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ]);
        }
    }




    function VerifyOTP(Request $request){
        $email = $request->input('email');
        $otp = $request->input('otp');
        $count = User::where('email', '=', $email)
                ->where('otp', '=', $otp)
                ->count();

            if($count==1){
                //Database update otp
                User::where('email', '=', $email)->update(['otp'=>'0']);

                //Pass reset token issue
                $token = JWTToken::CreateTokenForPassword($request->input('email'));

                return response()->json([
                    'status'=>'success',
                    'message'=>'OTP Verified',
                    'token'=>$token
                ], 200)->cookie('token',$token,60*24*30);
            }else{
                return response()->json([
                    'status'=>'fsiled',
                    'message'=>'unauthorized'
                ], 401);
            }
    }



    function ResetPassword(Request $request){
        try{
            $email=$request->header('email');
            $password=$request->input('password');
            User::where('email','=',$email)->update(['password'=>$password]);
            return response()->json([
                'status' => 'success',
                'message' => 'Request Successful',
            ],200);

        }catch (Exception $exception){
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ],200);
        }
    }




    function UserProfile(Request $request){

        $email=$request->header('email');
        $user=User::where('email','=',$email)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Request Successful',
            'data' => $user
        ],200);
    }

    function UpdateProfile(Request $request){
        try{
            $email=$request->header('email');
            $firstName=$request->input('firstName');
            $lastName=$request->input('lastName');
            $mobile=$request->input('mobile');
            $password=$request->input('password');
            User::where('email','=',$email)->update([
                'firstName'=>$firstName,
                'lastName'=>$lastName,
                'mobile'=>$mobile,
                'password'=>$password
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Request Successful',
            ],200);

        }catch (Exception $exception){
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ],200);
        }
    }
}
