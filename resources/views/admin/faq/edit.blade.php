@extends('admin.layouts.master')
@section('title')
    Edit FAQ
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
                        <h3 class="box-title">Edit</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="{{url('/admin/faq/'.$faq->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="patch">

                        <div class="box-body">


                            <div class="form-group">
                                <label for="question" class="col-sm-1 control-label">Question</label>
                                <div class="col-sm-11 {{ $errors->has('question') ? ' has-error' : '' }}">
                                    <input type="text" name="question" class="form-control" id="question" placeholder="question" value="{{ $faq->question }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>



                            <div class="form-group">

                                <label for="editor1" class="col-sm-1 control-label">Answer</label>
                                <div class="col-sm-11 {{ $errors->has('answer') ? ' has-error' : '' }}">
                                    <div class="box-body pad">
                                        <textarea name="answer" class="form-control" placeholder="answer" id="editor1">{{ $faq->answer }}</textarea>
                                        @if ($errors->has('answer'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('answer') }}</strong>
                                                </span>
                                        @endif
                                    </div>
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