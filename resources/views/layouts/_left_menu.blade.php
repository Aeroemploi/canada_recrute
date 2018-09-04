<ul id="menu" class="page-sidebar-menu">
    <li {!! (Request::is('dashboard') ? 'class="active"' : '') !!}>
        <a href="{{ route('dashboard') }}">
            <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>

    <li {!! (Request::is('users') || Request::is('users/create') || Request::is('user_profile') || Request::is('users/*') || Request::is('deleted_users') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">Users</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Users
                </a>
            </li>
            <li {!! (Request::is('users/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('users/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New User
                </a>
            </li>
            <li {!! ((Request::is('users/*')) && !(Request::is('users/create')) ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::route('users.show',Sentinel::getUser()->id) }}">
                    <i class="fa fa-angle-double-right"></i>
                    View Profile
                </a>
            </li>
            <li {!! (Request::is('deleted_users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('deleted_users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Deleted Users
                </a>
            </li>
        </ul>
    </li>
    <!-- <li {!! (Request::is('groups') || Request::is('groups/create') || Request::is('groups/*') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">Groups</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('groups') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('groups') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Group List
                </a>
            </li>
            <li {!! (Request::is('groups/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('groups/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New Group
                </a>
            </li>
        </ul>
    </li> -->

    <li {!! (Request::is('templates') || Request::is('templates/create') || Request::is('templates_profile') || Request::is('templates/*') || Request::is('deleted_templates') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="template" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">Templates</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('templates') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('templates') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Templates
                </a>
            </li>
            <li {!! (Request::is('templates/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('templates/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New Templates
                </a>
            </li>
        </ul>
    </li>

    <li {!! (Request::is('forms') || Request::is('forms/create') || Request::is('forms_profile') || Request::is('forms/*') || Request::is('deleted_forms') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="template" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">Forms</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('forms') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('forms') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Forms
                </a>
            </li>
            <li {!! (Request::is('forms/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('forms/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New Forms
                </a>
            </li>
        </ul>
    </li>

</ul>
