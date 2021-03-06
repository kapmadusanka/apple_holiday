@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Student
            <small>List</small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Student</a></li>
            <li class="active">List</li>
        </ol>
    </section>
    <section class="content">
        <!-- Your Page Content Here -->

        <!-- /.box-header -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Student Details</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" >
                            <div class="col-lg-12" >
                                <a class="btn btn-info m_b_10 pull-left fa fa-plus " href="{{ route('add_student') }}"  > Create New </a>
                            </div>
                        </div>
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30"></h4>
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{{Session::get('success') }}</li>
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <table id="datatable" class=" table table-striped " >
                                        <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Name </th>
                                            <th> Class </th>
                                            <th> Date of Birth </th>
                                            <th> city </th>
                                            <th> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($records as $k => $row)
                                            <tr>
                                                <td> {{ $k+1}} </td>
                                                <td>{{ $row->name }} </td>
                                                <td>{{ $row->get_class->name }} </td>
                                                <td>{{ $row->city }} </td>
                                                <td>{{ $row->dob }} </td>
                                                <td class="text-center" >
                                                    <a href="{{ url('student_edit/'.$row->id) }}" class="btn btn-warning fa fa-edit " > Edit </a>
                                                    <a href="{{ url('student_delete/'.$row->id) }}" class="btn btn-danger fa fa-times delete-btn " > Delete </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            </div>

        </div>
        <!-- form start -->


    </section>
@endsection
