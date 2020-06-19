@extends('layouts.dashboard.app')


@section('content')
    <div class="content-wrapper">

        <div class="container" style="justify-content: center;width: 1100px; min-height: 566px">

            <section class="content-header">

                <h1>Dashboard</h1>

                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i>dashboard</a></li>
                </ol>
            </section>
            <br>
        </div>
    </div>
    @endsection
