@extends('layouts.master_admin')

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Company</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Company</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Company Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="{{ route('admin.company.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                  @elseif(Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                  @endif

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name">
                          @error('name')
                            <strong>{{ $errors->first('name') }}</strong>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                          @error('email')
                            <strong>{{ $errors->first('email') }}</strong>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">
                          <input type="file" name="company_logo" class="form-control" placeholder="Logo">
                          @error('company_logo')
                            <strong>{{ $errors->first('company_logo') }}</strong>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Website</label>
                        <div class="col-sm-10">
                          <input type="text" name="website" value="{{ old('website') }}" class="form-control" placeholder="Website">
                          @error('website')
                            <strong>{{ $errors->first('website') }}</strong>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                          <select name="status" class="form-control" placeholder="Status">
                            <option value="">Select</option>
                            <?php $statusOption = array('Active','Inactive');
                            foreach($statusOption as $k=>$v){
                              $selected = (!empty(old('status')) && old('status') == $v)? 'selected':'';
                              echo '<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
                            }?>
                          </select>
                          @error('status')
                            <strong>{{ $errors->first('status') }}</strong>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Save</button>
                  <button type="reset" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
@endsection