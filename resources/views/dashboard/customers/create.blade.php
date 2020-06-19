@extends('layouts.dashboard.app')

@section('content')
    <div class="content-wrapper">

    <div class="container" style="justify-content: center;width: 1100px; min-height: 566px">
        <section class="content-header">

            <h1>Customers</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
                <li><a  href="{{ route('dashboard.customers.index')}}">customers</a></li>
                <li><a  >create_new_customer</a></li>
            </ol>
        </section>
        <br>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add</h3>
            </div>

            <div class="box-body ">
                @include('partials._errors')
                <form action="{{route('dashboard.customers.store')}}" method="post">
                    {{csrf_field()}}
                    {{method_field('post')}}
                    <div class="form-group">
                        <lable>title</lable>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <lable>description</lable>
                        <textarea name="description" class="form-control ckeditor" value="{{old('description')}}"></textarea>
                    </div>
                    <div class="form-group">
                        <lable>status</lable>
                        <br>
                        <label><input type="radio" class="form-check-input" name="status" value="0">active</label>
                        <label><input type="radio" class="form-check-input" name="status" value="1">finished</label>
                    </div>
                    <div class="form-group">
                        <lable>phone</lable>
                        <input type="number" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <lable>start date</lable>
                        <input type="date" name="start_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <lable>end date</lable>
                        <input type="date" name="end_date" class="form-control">
                    </div>
                    <div class="form-group">

                        <div class="col-12">
                            <!-- Custom Tabs -->
                            <div class="card">
                                <div class="nav-tabs-custom d-flex p-0">
                                    <h3 class="card-title">services</h3>
                                </div>
                                <div class="tab-content">
                                            @foreach($services as $service)
                                                <label><input type="checkbox" class="form-check-input" name="services[]" value="{{$service->id}}">{{$service->title}}</label>
                                            @endforeach
                                <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- ./card -->
                        </div>
                        <!-- /.col -->

                    </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus">add</i></button>
                        </div>
                    </form>

                </div>
            </div>
            </div>
        </div>
    @endsection


