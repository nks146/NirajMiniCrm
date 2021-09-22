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
                <h3 class="card-title">Company Lists</h3>
                <div class="text-right">
                <a href="{{route('admin.company.create')}}"> Create Company</a>
              </div>
              </div>
              <div class="card-body">
                @if(Session::has('success'))
                  <p class="alert alert-success">{{ Session::get('success') }}</p>
                @elseif(Session::has('error'))
                  <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif

                <!-- /.card-header -->
                <div class="table-responsive mt-2">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th width="4%">S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($data['companies']->count() > 0)
                        @php $count = 0; @endphp
                        @foreach($data['companies'] AS $company)
                          @php $company_logo = asset('public/filemanager/no-img-270-236.jpg');
                          if (@$company->company_logo && file_exists(public_path('/images/company/'.$company->company_logo))) {
                            $company_logo = asset('/images/company/'.$company->company_logo);
                          } @endphp

                          <tr>
                            <td><strong>{{ $data['companies']->firstItem() + $count }}.</strong></td>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td><img src="{{$company_logo}}" height="80"></td>
                            <td>{{$company->status}}</td>
                            <td>
                              <div class="btn-group">
                                <a href="{{route('admin.company.edit',$company->id)}}" title="Edit" class="btn btn-xs btn-info" ><i class="fa fa-edit"></i> </a>
                                <a class="btn btn-xs btn-danger" href="{{route('admin.company.delete',$company->id)}}" title="Delete"><i class="fa fa-trash"></i> </a>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
@endsection