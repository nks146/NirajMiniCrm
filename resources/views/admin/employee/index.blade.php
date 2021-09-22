@extends('layouts.master_admin')

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Employees</li>
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
                <h3 class="card-title">Employee Lists</h3>
                <div class="text-right">
                <a href="{{route('admin.employee.create')}}"> Create Employee</a>
              </div>
              </div>
              <!-- /.card-header -->
              <table>
                <thead>
                  <tr>
                    <th width="4%">S.No</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($data['employees']->count() > 0)
                    @php $count = 0; @endphp
                    @foreach($data['employees'] AS $employee)
                      <tr>
                        <td><strong>{{ $data['employees']->firstItem() + $count }}.</strong></td>
                        <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                        <td>{{$employee->company->name}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>{{$company->status}}</td>
                        <td>
                          <div class="btn-group">
                            <a href="{{route('admin.employee.edit',$employee->id)}}" title="Edit" class="btn btn-xs btn-info" ><i class="fa fa-edit"></i> </a>
                            <a class="btn btn-xs btn-danger" href="{{route('admin.employee.delete',$employee->id)}}" title="Delete"><i class="fa fa-trash"></i> </a>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
@endsection