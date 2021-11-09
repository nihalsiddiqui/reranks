@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4>
                {{ trans('admin.admin') }} <i class="fa fa-angle-right margin-separator"></i> {{ trans('admin.role') }} ({{$data->total()}})
            </h4>

        </section>

        <!-- Main content -->
        <section class="content">

            @if(Session::has('info_message'))
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-warning margin-separator"></i>  {{ Session::get('info_message') }}
                </div>
            @endif

            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-check margin-separator"></i>  {{ Session::get('success_message') }}
                </div>
            @endif

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">
                                @if( $data->count() != 0 && $data->currentPage() != 1 )
                                    <a href="{{url('panel/admin/all/roles')}}">{{ trans('admin.all-role') }}</a>
                                @else
                                    {{ trans('admin.members') }}
                                @endif

                            </h3>

                            <div class="box-tools">
                            @if( $data->total() !=  0 )
                                <!-- form -->
                                    <form role="search" autocomplete="off" action="{{ url('panel/admin/all/roles') }}" method="get">
                                        <div class="input-group input-group-sm w-150">
                                            <input type="text" name="q" class="form-control pull-right" placeholder="{{ trans('general.search') }}">

                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form><!-- form -->
                                @endif
                            </div>

                        </div><!-- /.box-header -->

                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>

                                @if( $data->total() !=  0 && $data->count() != 0 )
                                    <tr>
                                        <th class="active">ID</th>
                                        <th class="active">{{ trans('auth.name') }}</th>

                                        <th class="active">{{ trans('admin.date') }}</th>

                                        <th class="active">{{ trans('admin.actions') }}</th>
                                    </tr>

                                    @foreach( $data as $user )
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>
                                                <a href="{{ url($user->name) }}" target="_blank">
                                                    {{ $user->name }}
                                                </a>
                                            </td>


                                            <td>{{ Helper::formatDate($user->created_at) }}</td>
                                            <td>

                                                @if( $user->id <> Auth::user()->id && $user->id <> 1 )

                                                    <a href="{{ route('role.edit', $user->id) }}" class="btn btn-success btn-sm padding-btn">
                                                        {{ trans('admin.edit') }}
                                                    </a>

                                                    {!! Form::open([
                                                         'method' => 'DELETE',
                                                         'route' => ['role.destroy', $user->id],
                                                         'id' => 'form'.$user->id,
                                                         'class' => 'displayInline'
                                                         ]) !!}
                                                    {!! Form::submit(trans('admin.delete'), ['data-url' => $user->id, 'class' => 'btn btn-danger btn-sm padding-btn actionDelete']) !!}
                                                    {!! Form::close() !!}

                                                @else
                                                    ------------
                                                @endif

                                            </td>

{{--                                        <?php if( $user->verified_id == 'no' ) {--}}
{{--                                                $verified    = 'warning';--}}
{{--                                                $_verified = trans('admin.pending');--}}
{{--                                            } elseif( $user->verified_id == 'yes' ) {--}}
{{--                                                $verified = 'success';--}}
{{--                                                $_verified = trans('admin.verified');--}}
{{--                                            } else {--}}
{{--                                                $verified = 'danger';--}}
{{--                                                $_verified = trans('admin.reject');--}}
{{--                                            }--}}
{{--                                            ?>--}}
{{--                                            <td><span class="label label-{{$verified}}">{{ $_verified }}</span></td>--}}

{{--                                            <?php if( $user->status == 'pending' ) {--}}
{{--                                                $mode    = 'warning';--}}
{{--                                                $_status = trans('admin.pending');--}}
{{--                                            } elseif( $user->status == 'active' ) {--}}
{{--                                                $mode = 'success';--}}
{{--                                                $_status = trans('admin.active');--}}
{{--                                            } else {--}}
{{--                                                $mode = 'warning';--}}
{{--                                                $_status = trans('admin.suspended');--}}
{{--                                            }--}}
{{--                                            ?>--}}
{{--                                            <td><span class="label label-{{$mode}}">{{ $_status }}</span></td>--}}

                                        </tr><!-- /.TR -->
                                    @endforeach

                                @else
                                    <hr />
                                    <h3 class="text-center no-found">{{ trans('general.no_results_found') }}</h3>

                                    @if( isset( $query ) )
                                        <div class="col-md-12 text-center padding-bottom-15">
                                            <a href="{{url('panel/admin/all/roles')}}" class="btn btn-sm btn-danger">{{ trans('auth.back') }}</a>
                                        </div>

                                    @endif
                                @endif

                                </tbody>

                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    @if ($data->hasPages())
                        {{ $data->appends(['q' => $query])->links() }}
                    @endif
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
