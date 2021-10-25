@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
{{--            --}}
            <h4>
                {{ trans('admin.admin') }} <i class="fa fa-angle-right margin-separator"></i> {{ trans('general.type') }} ({{$data->total()}})
                    <a href="{{ url('panel/admin/create/type') }}" class="btn btn-sm btn-success no-shadow">
                    <i class="glyphicon glyphicon-plus myicon-right"></i> {{ trans('general.add_new') }}
                </a>
            </h4>

        </section>

        <!-- Main content -->
        <section class="content">

            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-check margin-separator"></i> {{ Session::get('success_message') }}
                </div>
            @endif

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"> {{ trans('general.type') }}</h3>
                        </div><!-- /.box-header -->



                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>

                                @if ($data->count() !=  0)
                                    <tr>
                                        <th class="active">ID</th>
                                        <th class="active">{{ trans('general.type') }}</th>
                                        <th class="active">{{ trans('admin.description') }}</th>
                                        <th class="active">{{ trans('admin.date') }}</th>
                                        <th class="active">{{ trans('admin.actions') }}</th>
                                    </tr>

                                    @foreach ($data as $update)

                                        <tr>
                                            <td>{{ $update->id }}</td>
                                            <td>{{ $update->type }}</td>
                                            <td>{{ str_limit($update->description, 50, '...') }}</td>
                                            <td>{{ Helper::formatDate($update->date) }}</td>
                                            <td>
                                                <a href="{{ route('panel.edit.type',$update->id)}}" target="_blank" class="btn btn-success btn-sm padding-btn">
                                                    {{ trans('admin.edit') }} <i class="fa fa-external-link-square-alt"></i>
                                                </a>

                                                {!! Form::open([
                                                  'method' => 'POST',
                                                  'url' => "panel/admin/delete/type/$update->id",
                                                  'class' => 'displayInline'
                                                ]) !!}

                                                    {!! Form::button(trans('admin.delete'), ['class' => 'btn btn-danger btn-sm padding-btn actionDelete']) !!}
                                                {!! Form::close() !!}

{{--                                                {!! Form::open([--}}
{{--                                                  'method' => 'get',--}}
{{--                                                  'url' => "panel/admin/edit/type/$update->id",--}}
{{--                                                  'class' => 'displayInline'--}}
{{--                                                ]) !!}--}}

{{--                                                    {!! Form::button(trans('admin.edit'), ['class' => 'btn btn-success btn-sm padding-btn ']) !!}--}}
{{--                                                {!! Form::close() !!}--}}

                                            </td>

                                        </tr><!-- /.TR -->
                                    @endforeach

                                @else
                                    <hr />
                                    <h3 class="text-center no-found">{{ trans('general.no_results_found') }}</h3>
                                @endif

                                </tbody>

                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    @if ($data->hasPages())
                        {{ $data->links() }}
                    @endif
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
