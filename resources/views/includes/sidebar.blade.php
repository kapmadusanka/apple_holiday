<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->

            <li class="treeview">
                <a href="#"><span>Search</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('older_than/18') }}">students who are older than 18</a></li>
                    <li><a href="{{ url('students_in_class/8/2010') }}">students in class 8 in 2010</a></li>
                    <li><a href="{{ url('search_class_parents') }}">class and the parents<br> for given student id</a></li>
                    <li><a href="{{ url('older_than_and_parents/16/50') }}">students who are older than 16 <br>  and who have parents <br>older than 50.</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><span>Class</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('add_class') }}">Create</a></li>
                    <li><a href="{{ route('class') }}">Manage</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><span>Student</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('add_student') }}">Create</a></li>
                    <li><a href="{{ route('student') }}">Manage</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><span>Parents</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('add_parent') }}">Create</a></li>
                    <li><a href="{{ route('parent') }}">Manage</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><span>Assign Parent</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('add_assign_parent') }}">Create</a></li>
                    <li><a href="{{ route('assign_parent') }}">Manage</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><span>Send Email</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('send_email') }}">Send</a></li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>