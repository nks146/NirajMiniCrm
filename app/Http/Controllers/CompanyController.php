<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Company;
use Session;

class CompanyController extends Controller
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
        $data['companies'] = Company::getAll();
        return view('admin/company/index', compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin/company/create');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request_data = $request->All();

        $validator = $this->company_rules($request_data,'add',null);
        if ($validator->fails()) {
            return redirect()->route('admin.company.create')
                  ->withErrors($validator->getMessageBag())
                  ->withInput($request->All());
        } else {
            $response = Company::store($request);
            Session::flash($response['type'],$response['message']);

            return redirect()->route('admin.company.index');
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
            return redirect()->route('admin.company.edit',$id)
                  ->withErrors($validator->getMessageBag())
                  ->withInput($request->All());
        } else {
            $response = Company::update_store($request, $id);
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
            Session::flash('success',trans('company.success_deletedd'));
        } else {
            Session::flash('error', trans('company.failure'));
        }
        return redirect()->route('admin.company.index');
    }

    public function company_rules(array $data,$method,$id=null){

        $messages = [
            'name.required' => trans('company.name'),
            'email.required' => trans('company.email'),
            'email.unique' => trans('company.email_unique'),
            'company_logo.required' => trans('company.company_logo'),
            'company_logo.image' => trans('company.company_logo_image'),
            'company_logo.mimes' => trans('company.company_logo_mimes'). " :jpeg,png,jpg",
            'company_logo.max' => trans('company.company_logo_max').' :2048',
            'website.required' => trans('company.website'),
            'status.required' => trans('company.status'),
        ];
        switch($method){
            case 'add':
                $validator = Validator::make($data, [
                    'name' => 'required',
                    'email' => 'required|email|unique:companies',
                    'company_logo' => 'required|max:2048',
                    'website' => 'required',
                    'status' => 'required',
                ], $messages);
            break;
            case 'update':
                $validator = Validator::make($data, [
                    'name' => 'required',
                    'email' => 'required|email|unique:companies,email,'.$id,
                    'company_logo' => 'max:2048',
                    'website' => 'required',
                    'status' => 'required',
                ], $messages);
            break;
            default:
        }
        return $validator;
    }

}