@extends('layouts.dashboard.app')

@section('content')
    <div class="content-wrapper">

    <div class="container" style="justify-content: center;width: 1100px; min-height: 566px">
        <section class="content-header">

            <h1>Services</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
                <li><a  href="{{ route('dashboard.services.index')}}">services</a></li>
                <li><a  >create_new_service</a></li>
            </ol>
        </section>
        <br>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add</h3>
            </div>

            <div class="box-body ">
                @include('partials._errors')
                <form action="{{route('dashboard.services.store')}}" method="post">
                    {{csrf_field()}}
                    {{method_field('post')}}
                    <div class="form-group">
                        <lable>title</lable>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <lable>link</lable>
                        <input type="text" name="link" class="form-control" value="{{old('link')}}">
                    </div>
                    <div class="form-group">
                        <lable>description</lable>
                        <textarea name="description" class="form-control ckeditor" value="{{old('description')}}"></textarea>
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


