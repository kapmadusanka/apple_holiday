@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Email
        <small>Create</small>
    </h1>
    <!-- You can dynamically generate breadcrumbs here -->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Email</a></li>
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
        <form action="{{route('send_email_submit')}}" method="post" accept-charset="utf-8">

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
                                <label for="name">Email</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value=""  autofocus>

                                @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
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
