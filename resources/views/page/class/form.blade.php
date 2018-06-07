@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            class
            <small>Create</small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> class</a></li>
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
            <form action="{{route('class_submit')}}" method="post" accept-charset="utf-8">
                <input type="hidden" name="class_id" value="{{$class->id}}">
                @csrf
                <div class="box-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{Session::get('success') }}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="SliderTitle">Name</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $class->name }}"  autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="SliderTitle">Year</label>

                                    <select class="form-control" name="year">
                                        @for ($year=1900; $year <= 2020; $year++)
                                        <option <?= $class->year==$year?'selected':'' ?> value="{{$year}}">{{$year}}</option>
                                        @endfor
                                    </select>

                                    @if ($errors->has('year'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('year') }}</strong>
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
