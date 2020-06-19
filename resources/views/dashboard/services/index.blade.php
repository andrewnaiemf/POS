

@extends('layouts.dashboard.app')


@section('content')
    <div class="content-wrapper">

        <div class="container" style="justify-content: center;width: 1100px; min-height: 566px">

            <section class="content-header">

                <h1>Services</h1>

                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
                    <li><a>services</a></li>
                </ol>
            </section>
            <br>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"> services</h3> <small>{{$services->count()}}</small>
                </div>
                <div class="ml-5">
                            @if(auth()->user()->hasPermission('create_services'))
                                <a href="{{route('dashboard.services.create')}}" class="btn btn-primary"><i class="fa fa-plus"> add</i></a>
                            @else
                                <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus">add</i></a>
                            @endif
                </div>
                <div class="row"></div>
                <div class="box-body" >
                    @if($services->count()>0)

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>link</th>
                                <th>description</th>
                                <th>action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $index=>$service)
                                <tr>
                                    <td>{{$index +1}}</td>
                                    <td>{{$service->title}}</td>
                                    <td>{{$service->link}}</td>
                                    <td>{!! $service->description !!}</td>
                                    <td>
                                        @if(auth()->user()->hasPermission('update_services'))
                                            <a href="{{route('dashboard.services.edit',$service->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit">&nbsp;Edit</i></a>

                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit">&nbsp;Edit</i></a>
                                        @endif
                                        @if(auth()->user()->hasPermission('delete_customers'))
                                            <form action="{{route('dashboard.services.destroy',$service->id)}}" method="post"  style="display: inline-block">
                                                {{csrf_field()}}
                                                {{method_field('delete')}}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash">&nbsp;Delete</i></button>
                                            </form>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-trash">&nbsp;Delete</i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @else
                        <?php
                        echo '<h1 style="text-align: center">No Data Found </h1>'
                        ?>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection


