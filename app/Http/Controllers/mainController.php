<?php

namespace App\Http\Controllers;

use App\Models\reactSignupModel;
use Illuminate\Http\Request;
use App\Models\userModel;

class mainController extends Controller
{
    public function back()
    {
        session()->forget('login');
        return redirect ('/login');
    }

    public function signupAction()
    {
        // $data['postedData'] = session()->get('postedData');
        // $data['error'] = session()->get('error');
        return view('signup');
    }

    public function dbAction(Request $request)
    {
        // $post = request()->all();
        // $validator = validator()->make($post, [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'cnic' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     if (!empty($request->id)) {
        //         $route = '/infoUpdate/' . $request->id;
        //     } else {
        //         $route = '/detail';
        //     }
        //     return redirect($route)->with(
        //         [
        //             'postedData' => request()->post(),
        //             // 'error' => $validator->errors()->first()
        //         ]
        //     );
        // }
        $oUser = new \App\Models\signup_model; //\App\Models\class_name
        $response = $oUser->store($request);
        return redirect('/login');
    }
    public function loginAction()
    {
        if (session()->has('login')) {
            return redirect('/dashboard');
        } else {
            return view('login');
        }
    }

    public function loginProcess(Request $request)
    {
        $data = userModel::where('email', $request->email)->where('password', $request->password)->first();
    //    dd($data);
        if(!empty($data)){
            $request->session()->put('login', $data);

            return redirect('/dashboard')->with(['postedData'=>$data]);
        }
    }
    
    public function dashboard()
    {
        // dd(session()->all());
        if(session()->has('login')){
            $data['postedData'] = session()->get('login');
            return view('dashboard', $data);
        }
        else
        {
            return redirect('/login');
        }
        // dd($data);
        
    }

    public function reactRegister(Request $request){
        $userDM = new reactSignupModel; //new mode
        $userDM->company = $request->input('name');
        $userDM->mobile = $request->input('mobile');
        $userDM->cnic = $request->input('cnic');
        $userDM->email = $request->input('email');
        $userDM->password = $request->input('password');
        $userDM->save();
        return $userDM;
    }

    public function reactLogin(Request $request){
        $user = reactSignupModel::where('email', $request->email)->where('password', $request->password)->first();

    return $user;
}
        


    }
}
