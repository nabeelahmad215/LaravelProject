<?php

namespace App\Http\Controllers;

use App\Models\reactEmpInfoModel;
use App\Models\reactSignupModel;
use App\Models\reactResignationModel;
use App\Models\PromotionModel;
use App\Models\reactLeaveModel;
use App\Models\reactReimburstment;
use Illuminate\Http\Request;
use App\Models\userModel;
use Illuminate\Support\Facades\DB;

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
        $data = reactEmpInfoModel::where('status', 'Active')->get();
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
        $userDM->emp_id = $request->input('emp_id');
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
        DB::statement('UPDATE tblresignation INNER JOIN employee_info ON tblresignation.emp_id = employee_info.id SET tblresignation.emp_code =employee_info.emp_code WHERE tblresignation.emp_id = employee_info.id');
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
        $userDM->emp_id = $request->input('emp_id');
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
        DB::statement('UPDATE employee_info INNER JOIN tblresignation ON employee_info.id = tblresignation.emp_id SET employee_info.status= tblresignation.status WHERE employee_info.id = tblresignation.emp_id');
        return response()->json($userDM);
    }

    public function reactEmpFetch($id)
    {
        $data = reactEmpInfoModel::find($id);
        return $data;
        // dd($users);
    }

    public function reactEmpPromotion(Request $request)
    {
        $userDM = new PromotionModel; //new mode
        $userDM->emp_id = $request->input('emp_id');
        $userDM->name = $request->input('name');
        $userDM->promotion_date = $request->input('promotion_date');
        $userDM->promoted_to = $request->input('promoted_to');
        $userDM->promoted_salary = $request->input('promoted_salary');
        $userDM->promoted_tax = $request->input('promoted_tax');
        $userDM->promoted_gross = $request->input('promoted_gross');
        $userDM->detail = $request->input('detail');
        $userDM->save();
        DB::statement('DELETE FROM tblpromotion WHERE ID NOT IN ( SELECT MAX(ID) FROM tblpromotion GROUP BY emp_id)');
        DB::statement('UPDATE tblpromotion INNER JOIN employee_info ON tblpromotion.emp_id = employee_info.id SET tblpromotion.name = employee_info.name, tblpromotion.promoted_from = employee_info.designation, tblpromotion.current_salary= employee_info.basicsalary, tblpromotion.emp_code = employee_info.emp_code WHERE tblpromotion.emp_id = employee_info.id');
        DB::statement('UPDATE employee_info INNER JOIN tblpromotion ON employee_info.id = tblpromotion.emp_id SET employee_info.designation = tblpromotion.promoted_to, employee_info.basicsalary = tblpromotion.promoted_salary, employee_info.salarytax = tblpromotion.promoted_tax, employee_info.grosssalary = tblpromotion.promoted_gross WHERE employee_info.id = tblpromotion.emp_id');
        return $userDM;
    }

    public function reactPromotionHistory()
    {
        $data = PromotionModel::get()->all();
        return $data;
        // dd($users);
    }

    public function reactEmpLeave(Request $request)
    {
        $userDM = new reactLeaveModel; //new mode
        $userDM->emp_id = $request->input('emp_id');
        $userDM->from_date = $request->input('from_date');
        $userDM->to_date = $request->input('to_date');
        $userDM->type = $request->input('type');
        $userDM->reason = $request->input('reason');
        $userDM->status = $request->input('status');
        $userDM->save();
        DB::statement('UPDATE tblleave INNER JOIN employee_info ON tblleave.emp_id = employee_info.id SET tblleave.name = employee_info.name, tblleave.emp_code = employee_info.emp_code WHERE tblleave.emp_id = employee_info.id');
        return $userDM;
    }

    public function reactEmpLeaveAll()
    {
        $data = reactLeaveModel::get()->all();
        return $data;
    }

    public function reactEmpLeavePending()
    {
        $url = DB::table('tblleave')->where('status', '=', 'Pending')->get();
        // echo "<pre>";
        // print_r($url);
        return response()->json($url);
    }

    public function reactEmpLeaveApproved()
    {
        $url = DB::table('tblleave')->where('status', '=', 'Approved')->get();
        // echo "<pre>";
        // print_r($url);
        return response()->json($url);
    }

    public function reactEmpLeaveReject()
    {
        $url = DB::table('tblleave')->where('status', '=', 'Reject')->get();
        // echo "<pre>";
        // print_r($url);
        return response()->json($url);
    }

    public function reactEmpLeaveDelete($id)
    {
        $data = reactLeaveModel::find($id);
        $data->delete();
        return $data;
    }

    public function reactLeaveStatus(Request $request, $id)
    {
        $userDM = reactLeaveModel::find($id);
        $userDM->status = $request->input('status');
        $userDM->save();
        return response()->json($userDM);
    }

    public function reactEmpReimburs(Request $request)
    {
        $userDM = new reactReimburstment; //new mode
        $userDM->doc_date = $request->input('doc_date');
        $userDM->emp_id = $request->input('emp_id');
        $userDM->category = $request->input('category');
        $userDM->amount = $request->input('amount');
        $userDM->detail = $request->input('detail');
        $userDM->status = $request->input('status');
        $userDM->save();
        DB::statement('UPDATE tblreimburstment INNER JOIN employee_info ON tblreimburstment.emp_id = employee_info.id SET tblreimburstment.name = employee_info.name, tblreimburstment.emp_code = employee_info.emp_code WHERE tblreimburstment.emp_id = employee_info.id');
        return $userDM;
    }

    public function reactReimbursHistory()
    {
        $data = reactReimburstment::get()->all();
        return $data;
        // dd($users);
    }

    public function reactReimbursDelete($id)
    {
        $data = reactReimburstment::find($id);
        $data->delete();
        return $data;
    }

    public function reactReimbursEdit($id)
    {
        $rs = reactReimburstment::find($id);
        return $rs;
    }
    public function reactReimbursUpdate(Request $request, $id)
    {
        $userDM = reactReimburstment::find($id);
        $userDM->doc_date = $request->input('doc_date');
        $userDM->category = $request->input('category');
        $userDM->amount = $request->input('amount');
        $userDM->detail = $request->input('detail');
        $userDM->save();
        return response()->json($userDM);
    }
}
