<?php

namespace App\Http\Controllers;

use App\Models\reactEmpInfoModel;
use App\Models\reactSignupModel;
use App\Models\reactResignationModel;
use Illuminate\Http\Request;
use App\Models\userModel;

class mainController extends Controller
{

    public function back()
    {
        session()->forget('login');
        return redirect('/login');
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
        if (!empty($data)) {
            $request->session()->put('login', $data);

            return redirect('/dashboard')->with(['postedData' => $data]);
        }
    }

    public function dashboard()
    {
        // dd(session()->all());
        if (session()->has('login')) {
            $data['postedData'] = session()->get('login');
            return view('dashboard', $data);
        } else {
            return redirect('/login');
        }
        // dd($data);

    }

    public function reactRegister(Request $request)
    {
        $userDM = new reactSignupModel; //new mode
        $userDM->company = $request->input('company');
        $userDM->mobile = $request->input('mobile');
        $userDM->cnic = $request->input('cnic');
        $userDM->email = $request->input('email');
        $userDM->password = $request->input('password');
        $userDM->save();
        return $userDM;
    }

    public function reactLogin(Request $request)
    {
        $user = reactSignupModel::where('email', $request->email)->where('password', $request->password)->first();

        return $user;
    }


    public function index()
    {
        $data = reactSignupModel::get()->all();
        return $data;
        // dd($data);
    }

    public function emp_dropdown()
    {
        $data = reactEmpInfoModel::get()->all();
        return $data;
        // dd($data);
    }

    public function reactEmpInfo(Request $request)
    {
        $userDM = new reactEmpInfoModel; //new mode
        $userDM->emp_code = $request->input('emp_code');
        $userDM->name = $request->input('name');
        $userDM->fname = $request->input('fname');
        $userDM->gender = $request->input('gender');
        $userDM->dob = $request->input('dob');
        $userDM->religion = $request->input('religion');
        $userDM->marital = $request->input('marital');
        $userDM->cnic = $request->input('cnic');
        $userDM->contact = $request->input('contact');
        $userDM->address = $request->input('address');
        $userDM->qualification = $request->input('qualification');
        $userDM->degree = $request->input('degree');
        $userDM->institute = $request->input('institute');
        $userDM->completedate = $request->input('completedate');
        $userDM->basicsalary = $request->input('basicsalary');
        $userDM->salarytax = $request->input('salarytax');
        $userDM->grosssalary = $request->input('grosssalary');
        $userDM->joindate = $request->input('joindate');
        $userDM->emptype = $request->input('emptype');
        $userDM->designation = $request->input('designation');
        $userDM->department = $request->input('department');
        $userDM->status = $request->input('status');
        $userDM->save();
        return $userDM;
    }

    public function reactEmpInfoHistory()
    {
        $data = reactEmpInfoModel::get()->all();
        return $data;
        // dd($users);
    }

    public function reactEmpDeleteAction($id)
    {
        $data = reactEmpInfoModel::find($id);
        $data->delete();
        return $data;
    }

    public function reactEmpEditAction($id)
    {
        $rs = reactEmpInfoModel::find($id);
        return $rs;
    }

    public function reactEmpUpdateAction(Request $request, $id)
    {
        $userDM = reactEmpInfoModel::find($id);
        $userDM->emp_code = $request->input('emp_code');
        $userDM->name = $request->input('name');
        $userDM->fname = $request->input('fname');
        $userDM->gender = $request->input('gender');
        $userDM->dob = $request->input('dob');
        $userDM->religion = $request->input('religion');
        $userDM->marital = $request->input('marital');
        $userDM->cnic = $request->input('cnic');
        $userDM->contact = $request->input('contact');
        $userDM->address = $request->input('address');
        $userDM->qualification = $request->input('qualification');
        $userDM->degree = $request->input('degree');
        $userDM->institute = $request->input('institute');
        $userDM->completedate = $request->input('completedate');
        $userDM->basicsalary = $request->input('basicsalary');
        $userDM->salarytax = $request->input('salarytax');
        $userDM->grosssalary = $request->input('grosssalary');
        $userDM->joindate = $request->input('joindate');
        $userDM->emptype = $request->input('emptype');
        $userDM->designation = $request->input('designation');
        $userDM->department = $request->input('department');
        $userDM->status = $request->input('status');
        $userDM->save();
        return response()->json($userDM);
    }

    public function reactEmpResignation(Request $request)
    {
        $userDM = new reactResignationModel; //new mode
        $userDM->doc_date = $request->input('doc_date');
        $userDM->emp_code = $request->input('emp_code');
        $userDM->resignation_date = $request->input('resignation_date');
        $userDM->notice_date = $request->input('notice_date');
        $userDM->detail = $request->input('detail');
        $userDM->status = $request->input('status');
        $userDM->save();
        return $userDM;
    }

    public function reactResignationHistory()
    {
        $data = reactResignationModel::get()->all();
        return $data;
        // dd($users);
    }
    
    public function reactResignDeleteAction($id)
    {
        $data = reactResignationModel::find($id);
        $data->delete();
        return $data;
    }

    public function reactResignEditAction($id)
    {
        $rs = reactResignationModel::find($id);
        return $rs;
    }

    public function reactResignUpdateAction(Request $request, $id)
    {
        $userDM = reactResignationModel::find($id);
        $userDM->doc_date = $request->input('doc_date');
        $userDM->emp_code = $request->input('emp_code');
        $userDM->resignation_date = $request->input('resignation_date');
        $userDM->notice_date = $request->input('notice_date');
        $userDM->detail = $request->input('detail');
        $userDM->status = $request->input('status');
        $userDM->save();
        return response()->json($userDM);
    }
    public function reactStatusUpdateAction(Request $request, $id)
    {
        $userDM = reactResignationModel::find($id);
        $userDM->status = $request->input('status');
        $userDM->save();
        return response()->json($userDM);
    }
}
