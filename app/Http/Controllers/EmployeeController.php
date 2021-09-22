<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Employee;
use App\Models\Company;
use Session;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array();
        $data['employees'] = Employee::getAll();
        return view('admin/employee/index', compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $data = array();
        $data['companies'] = Company::where('status','Active')->orderBy('name','asc')->get();
        //dd($data['companies']);
        return view('admin/employee/create', compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request_data = $request->All();

        $validator = $this->employee_rules($request_data,'add',null);
        if ($validator->fails()) {
            return redirect()->route('admin.employee.create')
                  ->withErrors($validator->getMessageBag())
                  ->withInput($request->All());
        } else {
            $response = Employee::store($request);
            Session::flash($response['type'],$response['message']);

            return redirect()->route('admin.employee.index');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id=null)
    {
        $data = Company::find($id);
        return view('admin/company/edit', compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request,$id)
    {
        $request_data = $request->All();

        $validator = $this->company_rules($request_data,'update',$id);
        if ($validator->fails()) {
            return redirect()->route('admin.company.create')
                  ->withErrors($validator->getMessageBag())
                  ->withInput($request->All());
        } else {
            $response = Company::update($request, $id);
            Session::flash($response['type'],$response['message']);

            return redirect()->route('admin.company.index');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete($id)
    {
        $response = Company::find($id)->delete();
        if($response){
            Session::flash('success','Record has been successfully deleted.');
        } else {
            Session::flash('error', 'Please try again.');
        }
        return redirect()->route('admin.company.index');
    }

    public function employee_rules(array $data,$method,$id=null){

        $messages = [
            'first_name.required' => trans('employee.first_name'),
            'last_name.required' => trans('employee.last_name'),
            'company.required' => trans('employee.company'),
            'email.required' => trans('employee.email'),
            'email.unique' => trans('employee.email_unique'),
            'phone.required' => trans('employee.phone'),
            'status.required' => trans('employee.status'),
        ];
        switch($method){
            case 'add':
                $validator = Validator::make($data, [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'company' => 'required',
                    'email' => 'required|unique:employees',
                    'phone' => 'required',
                    'status' => 'required',
                ], $messages);
            break;
            case 'update':
                $validator = Validator::make($data, [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'company' => 'required',
                    'email' => 'required|unique:employees',
                    'phone' => 'required',
                    'status' => 'required',
                ], $messages);
            break;
            default:
        }
        return $validator;
    }
}
