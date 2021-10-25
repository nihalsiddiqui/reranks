@extends('admin.layout')

@section('css')
    <link href="{{ asset('public/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4>
                {{ trans('admin.admin') }}
                <i class="fa fa-angle-right margin-separator"></i>
                Facility
                <i class="fa fa-angle-right margin-separator"></i>
                {{ trans('general.add_new') }}
            </h4>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="content">

                <div class="row">

                    <div class="box p-top-20">
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="{{ url('panel/admin/store/facility') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        @include('errors.errors-forms')

                        <!-- Start Box Body -->
                            <div class="box-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                                @endif
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ trans('general.name') }}</label>
                                    <div class="col-sm-3">
                                        <input type="text" value="{{ old('name') }}" required name="name"
                                               class="form-control" placeholder="Name">
                                    </div>
                                    <label class="col-sm-2 control-label">{{ trans('general.type') }}</label>
                                    <div class="col-sm-3">
                                        <select name="type" required class="form-control" id="">
                                            <option value="" selected disabled>Select Type</option>
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->


                            <!-- Start Box Body -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ trans('admin.description') }}</label>
                                    <div class="col-sm-10">

                                        <textarea name="description" rows="5" cols="40" class="form-control"
                                                  placeholder="{{ _('Description') }}">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit"
                                        class="btn btn-success pull-right">{{ trans('admin.save') }}</button>
                            </div><!-- /.box-footer -->
                        </form>
                    </div>

                </div><!-- /.row -->

            </div><!-- /.content -->

            <!-- Your Page Content Here -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection

@section('javascript')
    <script src="{{ asset('public/admin/js/ckeditor-init.js')}}"></script>
@endsection
