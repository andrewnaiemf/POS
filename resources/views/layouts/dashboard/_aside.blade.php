<aside class="main-sidebar" >

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard_files/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin Panel</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{route('dashboard.index')}}"><i class="fa fa-th"></i><span>Dashbord</span></a>
            </li>
            @if(auth()->user()->hasPermission('read_customers'))
                <li>
                    <a href="{{route('dashboard.customers.index')}}"><i class="fa fa-th"></i><span>Customers</span></a>
                </li>
                @endif
            @if(auth()->user()->hasPermission('read_services'))
                <li>
                    <a href="{{route('dashboard.services.index')}}"><i class="fa fa-th"></i><span>Services</span></a>
                </li>
            @endif
        </ul>
    </section>

</aside>

