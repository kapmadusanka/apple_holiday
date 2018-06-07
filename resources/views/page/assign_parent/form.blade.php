@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Assign parent
            <small>Create</small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Assign parent</a></li>
            <li class="active">Create</li>
        </ol>
    </section>
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">General Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('assign_parent_submit')}}" method="post" accept-charset="utf-8">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{{Session::get('success') }}</li>
                                        </ul>
                                    </div>
                                @endif


                                <div class="form-group">
                                    <label for="class_id">Student</label>

                                    <select class="form-control" name="student_id">
                                        @foreach ($students as $key=>$student)
                                            <option  value="{{$key}}">{{$student}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('student_id'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="class_id">Parent</label>

                                    <select class="form-control" name="parent_id">
                                        @foreach ($parents as $key=>$parent)
                                            <option  value="{{$key}}">{{$parent}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('parent_id'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('parent_id') }}</strong>
                                    </span>
                                    @endif
                                </div>





                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
