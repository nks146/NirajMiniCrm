<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Company;

class Employee extends Model
{
    use SoftDeletes;

    public $table = 'employees';
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * This function returns all company records
     * @return collection
     */
    protected function getAll(){
        return $this->orderBy('id','desc')->paginate(10);
    }

    /**
     * This function returns true or false with error message
     * @return boolean
     */
    protected function store($request){
        $response = array();
        try {
            $newEmployee = new Employee();
            $newEmployee->fist_name = $request->fist_name;
            $newEmployee->last_name = $request->last_name;
            $newEmployee->email = $request->email;
            $newEmployee->company = $request->company;
            $newEmployee->phone = $request->phone;
            $newEmployee->status = 'active';
            $newEmployee->created_at = date('Y-m-d H:i:s');
            $employeeAdded = $newEmployee->save();
            if($employeeAdded){
                $response['success'] = true;
                $response['type'] = "success";
                $response['message'] = trans('employee.success_added');
            } else {
                $response['success'] = false;
                $response['type'] = "error";
                $response['message'] = trans('employee.failure');
            }

        } catch (Exception $ex) {
            $response['success'] = false;
            $response['type'] = "error";
            $response['message'] = trans('employee.failure') . $ex->getMessage();
        }
        return $response;
    }

    /**
     * This function returns true or false with error message
     * @return boolean
     */
    protected function udpate($request, $id){
        $response = array();
        try {
            $updateCompany = Company::find($id);
            $updateCompany->fist_name = $request->fist_name;
            $updateCompany->last_name = $request->last_name;
            $updateCompany->email = $request->email;
            $updateCompany->company = $request->company;
            $updateCompany->phone = $request->phone;
            $updateCompany->updated_at = date('Y-m-d H:i:s');
            $companyUpdated = $updateCompany->save();
            if($companyUpdated){
                $response['success'] = true;
                $response['type'] = "success";
                $response['message'] = trans('employee.success_updated');
            } else {
                $response['success'] = false;
                $response['type'] = "error";
                $response['message'] = trans('employee.failure');
            }
        } catch (Exception $ex) {
            $response['success'] = false;
            $response['type'] = "error";
            $response['message'] = trans('employee.failure') . $ex->getMessage();
        }
        return $response;
    }
}
