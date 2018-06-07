@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Parents
            <small>Create</small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Parents</a></li>
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
            <form action="{{route('parent_submit')}}" method="post" accept-charset="utf-8">
                <input type="hidden" name="parent_id" value="{{$parent->id}}">
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
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $parent->name }}"  autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>

                                    <select class="form-control" name="type">

                                            <option <?= $parent->type=='M'?'selected':'' ?> value="M">Male</option>
                                            <option  <?= $parent->type=='F'?'selected':'' ?> value="F">Female</option>

                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="dob">Date of birth</label>
                                    <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ $parent->dob }}" required autofocus>

                                    @if ($errors->has('dob'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dob') }}</strong>
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
