

@extends('layouts.dashboard.app')


@section('content')
    <div class="content-wrapper">

        <div class="container" style="justify-content: center;width: 1100px; min-height: 566px">

            <section class="content-header">

                <h1>Customers</h1>

                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
                    <li><a>customers</a></li>
                </ol>
            </section>
            <br>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"> customers</h3> <small>{{$customers->count()}}</small>
                </div>
                <div class="mr-4">
                    <form action="{{route('dashboard.customers.index')}}" method="get" >

                        <div class="col-md-4">
                            <input  type="text" name="search" class="form-control " value="{{request()->search}}" placeholder="search" style="display: inline-block">
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"> search</i></button>
                            @if(auth()->user()->hasPermission('create_customers'))
                                <a href="{{route('dashboard.customers.create')}}" class="btn btn-primary"><i class="fa fa-plus"> add</i></a>
                            @else
                                <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus">add</i></a>
                            @endif
                        </div>

                    </form>
                </div>
                <div class="row"></div>
                <div class="box-body" >
                    @if($customers->count()>0)

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>description</th>
                                <th>status</th>
                                <th>phone</th>
                                <th>start date</th>
                                <th>end date</th>
                                <th>services</th>
                                <th>action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $index=>$customer)
                                <tr>
                                    <td>{{$index +1}}</td>
                                    <td>{{$customer->title}}</td>
                                    <td>{!! $customer->description !!}</td>
                                    <td>{{$customer->status == 0 ? 'active' : 'finished'}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>{{$customer->start_date}}</td>
                                    <td>{{$customer->end_date}}</td>
                                    <td><a href="{{route('dashboard.services.show',$customer->id)}}" class="btn btn-success "><i class="fa fa-edit">Show User Services</i></a></td>
                                    <td>
                                        @if(auth()->user()->hasPermission('update_customers'))
                                            <a href="{{route('dashboard.customers.edit',$customer->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit">&nbsp;Edit</i></a>

                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit">&nbsp;Edit</i></a>
                                        @endif
                                        @if(auth()->user()->hasPermission('delete_customers'))
                                            <form action="{{route('dashboard.customers.destroy',$customer->id)}}" method="post"  style="display: inline-block">
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
                        {{ $customers->withQueryString()->links() }}

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


