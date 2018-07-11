@extends('admin.layouts.master')
@section('title')
    Add Testimonial
@endsection
@section('page-header')
    <section class="content-header">
        <h1>
            Home Page
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
                        <h3 class="box-title">Horizontal Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="{{url('/admin/testimonial')}}" enctype="multipart/form-data">
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
                                    <input type="text" name="position" class="form-control" id="position" placeholder="Position" value="{{ old('position') }}" required autofocus>
                                    @if ($errors->has('position'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">

                                <label for="text" class="col-sm-1 control-label">Text</label>
                                <div class="col-sm-11 {{ $errors->has('text') ? ' has-error' : '' }}">
                                    <div class="box-body pad">
                                        <textarea name="text" class="form-control" placeholder="Text" id="editor1">{{ old('text') }}</textarea>
                                        @if ($errors->has('text'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('text') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">

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
    <script src="{{ asset('assets/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>

@endsection