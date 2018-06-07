@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        search parent
        <small>search</small>
    </h1>
    <!-- You can dynamically generate breadcrumbs here -->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> search parent</a></li>
        <li class="active">search</li>
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
        <form action="{{route('search_class_parent_submit')}}" method="post" accept-charset="utf-8">
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
