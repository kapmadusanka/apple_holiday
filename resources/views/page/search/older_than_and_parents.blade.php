@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        {{$page_title}}
        <small>List</small>
    </h1>
    <!-- You can dynamically generate breadcrumbs here -->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  {{$page_title}} </a></li>
        <li class="active">List</li>
    </ol>
</section>
<section class="content">
    <!-- Your Page Content Here -->

    <!-- /.box-header -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{$page_title}}</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" >
                        <div class="col-lg-12" >

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
                                        <th> Student Name </th>
                                        <th> Parent Name </th>
                                        <th> Student age </th>
                                        <th> Parent age </th>
                                        <th> Student Class </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($records as $k => $row)
                                    <tr>
                                        <td> {{ $k+1}} </td>
                                        <td>{{ $row->get_student->name }} </td>

                                        <td>{{ $row->get_parent->name }} </td>
                                        <td>{{ $row->get_student->student_age }} </td>
                                        <td>{{ $row->get_parent->parent_age }} </td>

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
