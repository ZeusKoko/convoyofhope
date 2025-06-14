<!-- Sidebar Navigation-->
<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="adminpanel/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">Main admin</h1>
            <p>admin page</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{ route('admin.manage.users') }}"> <i class="icon-home"></i>manage users </a></li>
        <li><a href="{{ route('admin.events.index') }}"> 
    <i class="icon-grid"></i> Events Management
</a></li>

<li><a href="{{ route('staff.assignments.create') }}" >
    Assign Staff to Region
</a>
    <i ></i> staff Management
</a></li>

<li><a href="#">
    <i ></i> Donations Management
</a></li>

<li><a href="#">
    <i ></i> Messages
</a></li>

        <li><a href=""> <i class="fa fa-bar-chart"></i>Cost Management</a></li>
        <li><a href=""> <i class="icon-padnote"></i> Reports Generation</a></li>

            </ul>
        </li>
        <li><a href=""> <i class="icon-logout"></i>Login page </a></li>
    </ul><span class="heading"> Donation Management
</span>
    <ul class="list-unstyled">
        <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
    </ul>
</nav>
<!-- Sidebar Navigation end-->
