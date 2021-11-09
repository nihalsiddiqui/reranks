@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
{{--            --}}
            <h4>
                {{ trans('admin.admin') }} <i class="fa fa-angle-right margin-separator"></i> Societies ({{$socities->total()}})
                    <a href="{{ url('panel/admin/create/society') }}" class="btn btn-sm btn-success no-shadow">
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
                            <h3 class="box-title"> All Societies</h3>
                        </div><!-- /.box-header -->



                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>

                                @if ($socities->count() !=  0)
                                    <tr>
                                        <th class="active">ID</th>
                                        <th class="active">name</th>
                                        <th class="active">address</th>
                                        <th class="active">city</th>
                                        <th class="active">admin_id</th>
                                        <th class="active">admin_id</th>
                                        <th class="active">date</th>
                                        <th class="active">distance_from_airport</th>
                                        <th class="active">distance_from_city_center</th>
                                        <th class="active">distance_from_railway</th>
                                        <th class="active">distance_from_motorway</th>
                                        <th class="active">factory_area</th>
                                        <th class="active">possession_by_developers</th>
                                        <th class="active">market_trending_zone</th>
                                        <th class="active">locality_region_value</th>
                                        <th class="active">rain_flood_zone</th>
                                        <th class="active">industrial_zone</th>
                                        <th class="active">scenic_view</th>
                                        <th class="active">air_quality</th>
                                        <th class="active">water_quality</th>
                                        <th class="active">green_energy_level</th>
                                        <th class="active">roads_in_society</th>
                                        <th class="active">smart_city_level</th>
                                        <th class="active">project_maintenances_level</th>
                                        <th class="active">electricity_cost</th>
                                        <th class="active">thread_zone</th>
                                        <th class="active">financially_growth</th>
                                        <th class="active">rental_income</th>
                                        <th class="active">strength_of_developers</th>
                                        <th class="active">transfer_expense</th>
                                        <th class="active">transfer_mechanism</th>
                                        <th class="active">market_trust</th>
                                        <th class="active">competency_of_developer</th>
                                        <th class="active">feedback_about_society</th>
                                        <th class="active">green_area_percentage</th>
                                        <th class="active">down_payment</th>
                                        <th class="active">installment_plan</th>
                                        <th class="active">water_bed_feet</th>
                                        <th class="active">total_area_society</th>
                                        <th class="active">project_completion_year</th>
                                        <th class="active">population_percentage</th>
                                        <th class="active">number_of_parks</th>
                                        <th class="active">_successfully_delivered_by_developer</th>
                                    </tr>

                                    @foreach ($socities as $update)

                                        <tr>
                                            <td>{{ $update->id }}</td>
                                            <td>{{ $update->name }}</td>
                                            <td>{{ $update->address }}</td>
                                            <td>{{ $update->city }}</td>
                                            <td>{{ $update->admin_id }}</td>
                                            <td>{{ $update->admin_id }}</td>
                                            <td>{{ $update->date }}</td>
                                            <td>{{ $update->distance_from_airport }}</td>
                                            <td>{{ $update->distance_from_city_center }}</td>
                                            <td>{{ $update->distance_from_railway }}</td>
                                            <td>{{ $update->distance_from_motorway }}</td>
                                            <td>{{ $update->factory_area }}</td>
                                            <td>{{ $update->possession_by_developers }}</td>
                                            <td>{{ $update->market_trending_zone }}</td>
                                            <td>{{ $update->locality_region_value }}</td>
                                            <td>{{ $update->rain_flood_zone }}</td>
                                            <td>{{ $update->industrial_zone }}</td>
                                            <td>{{ $update->scenic_view }}</td>
                                            <td>{{ $update->air_quality }}</td>
                                            <td>{{ $update->water_quality }}</td>
                                            <td>{{ $update->green_energy_level }}</td>
                                            <td>{{ $update->roads_in_society }}</td>
                                            <td>{{ $update->sewerage }}</td>
                                            <td>{{ $update->city }}</td>
                                            <td>{{ $update->city }}</td>
                                            <td>{{ $update->city }}</td>

                                            <td>
                                                <a href="{{ route('panel.edit.society',$update->id)}}" target="_blank" class="btn btn-success btn-sm padding-btn">
                                                    {{ trans('admin.edit') }} <i class="fa fa-external-link-square-alt"></i>
                                                </a>

                                                {!! Form::open([
                                                  'method' => 'POST',
                                                  'url' => "panel/admin/delete/society/$update->id",
                                                  'class' => 'displayInline'
                                                ]) !!}

                                                    {!! Form::button(trans('admin.delete'), ['class' => 'btn btn-danger btn-sm padding-btn actionDelete']) !!}
                                                {!! Form::close() !!}

                                                {!! Form::open([
                                                  'method' => 'get',
                                                  'url' => "panel/admin/edit/socitety/$update->id",
                                                  'class' => 'displayInline'
                                                ]) !!}

                                                    {!! Form::button(trans('admin.edit'), ['class' => 'btn btn-success btn-sm padding-btn ']) !!}
                                                {!! Form::close() !!}

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
                    @if ($socities->hasPages())
                        {{ $socities->links() }}
                    @endif
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
