@extends('admin.layouts.master')
@section('title')
    Add Team
@endsection
@section('page-header')
    <section class="content-header">
        <h1>
            Team
            <small></small>
        </h1>

    </section>
@endsection

@section('content')

    <section class="content">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Team</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="{{url('/admin/team')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-1 control-label">Name</label>
                                <div class="col-sm-5 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <label for="photo" class="col-sm-1 control-label">Photo</label>
                                <div class="col-sm-5 {{ $errors->has('photo') ? ' has-error' : '' }}">
                                    <input type="file" name="photo" id="photo" class="form-control">
                                    @if ($errors->has('photo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('photo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="position" class="col-sm-1 control-label">Position</label>
                                <div class="col-sm-5 {{ $errors->has('position') ? ' has-error' : '' }}">
                                    <input type="text" name="position" class="form-control" id="position" placeholder="Position" value="{{ old('position') }}" >
                                    @if ($errors->has('position'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            <div class="form-group">
                                <label for="facebook" class="col-sm-1 control-label">FB Link</label>
                                <div class="col-sm-5 {{ $errors->has('facebook') ? ' has-error' : '' }}">
                                    <input type="url" name="facebook" class="form-control" id="facebook" placeholder="Facebook" value="{{ old('facebook') }}">
                                    @if ($errors->has('facebook'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('facebook') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="twitter" class="col-sm-1 control-label">Twitter Link</label>
                                <div class="col-sm-5 {{ $errors->has('twitter') ? ' has-error' : '' }}">
                                    <input type="url" name="twitter" class="form-control" id="twitter" placeholder="Twitter" value="{{ old('twitter') }}">
                                    @if ($errors->has('twitter'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('twitter') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <label for="google" class="col-sm-1 control-label">Google Link</label>
                                <div class="col-sm-5 {{ $errors->has('google') ? ' has-error' : '' }}">
                                    <input type="url" name="google" class="form-control" id="google" placeholder="Google" value="{{ old('google') }}" >
                                    @if ($errors->has('google'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('google') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info center-block">Save <i class="fa fa-save" style="margin-left: 5px"></i></button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
                <!-- general form elements disabled -->

                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>

@endsection

@section('css')

@endsection

@section('js')
@endsection