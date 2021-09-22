<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Image;

class Company extends Model
{
    use SoftDeletes;

    public $table = 'companies';
    protected $guarded = [];

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
        $company_logo = '';
        if($request->hasFile('company_logo')) {
            $photo = $request->file('company_logo');
            $imagename = time(). '-' .$photo->getClientOriginalName();
            try
            {
                $company_logo = time().'.'.$photo->getClientOriginalExtension(); 
                $destinationPath = public_path("/images/company/");

                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $logo_img = Image::make($photo->getRealPath());
                $logo_img->save($destinationPath.$company_logo,80);
            }
            catch(Exception $e)
            {
                $response['success'] = false;
                $response['type'] = "error";
                $response['message'] = trans('company.image_failed');
                return $response;
            }
        }

        try {
            $newCompany = new Company();
            $newCompany->name = $request->name;
            $newCompany->email = $request->email;
            $newCompany->company_logo = $company_logo;
            $newCompany->website = $request->website;
            $newCompany->status = 'active';
            $newCompany->created_at = date('Y-m-d H:i:s');
            $companyAdded = $newCompany->save();
            if($companyAdded){
                $response['success'] = true;
                $response['type'] = "success";
                $response['message'] = trans('company.success_added');
            } else {
                $response['success'] = false;
                $response['type'] = "error";
                $response['message'] = trans('company.failure');
            }

        } catch (Exception $ex) {
            $response['success'] = false;
            $response['type'] = "error";
            $response['message'] = trans('company.failure') . $ex->getMessage();
        }
        return $response;
    }

    /**
     * This function returns true or false with error message
     * @return boolean
     */
    protected function update_store($request, $id){
        $response = array();
        $company_logo = '';
        if($request->hasFile('company_logo')) {
            $photo = $request->file('company_logo');
            $imagename = time(). '-' .$photo->getClientOriginalName();
            try
            {
                $company_logo = time().'.'.$photo->getClientOriginalExtension(); 
                $destinationPath = public_path("/images/company/");

                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $logo_img = Image::make($photo->getRealPath());
                $logo_img->save($destinationPath.$company_logo,80);
            }
            catch(Exception $e)
            {
                $response['success'] = false;
                $response['type'] = "error";
                $response['message'] = trans('company.image_failed');
                return $response;
            }
        }

        try {
            $updateCompany = Company::find($id);
            $updateCompany->name = $request->name;
            $updateCompany->email = $request->email;
            $updateCompany->company_logo = ($company_logo) ? $company_logo:$updateCompany->company_logo;
            $updateCompany->website = $request->website;
            $updateCompany->status = $request->status;
            $updateCompany->updated_at = date('Y-m-d H:i:s');
            $companyUpdated = $updateCompany->save();
            if($companyUpdated){
                $response['success'] = true;
                $response['type'] = "success";
                $response['message'] = trans('company.success_updated');
            } else {
                $response['success'] = false;
                $response['type'] = "error";
                $response['message'] = trans('company.failure');
            }
        } catch (Exception $ex) {
            $response['success'] = false;
            $response['type'] = "error";
            $response['message'] = trans('company.failure') . $ex->getMessage();
        }
        return $response;
    }


}
