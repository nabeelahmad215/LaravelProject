<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{

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
        return redirect('/');
    }
}
