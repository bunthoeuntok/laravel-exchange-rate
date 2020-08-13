<div class="secondary-sidebar">
    <div class="secondary-sidebar-bar">
        <a href="#" class="logo-box">concept</a>
    </div>
    <div class="secondary-sidebar-profile">
        <a href="app-profile.html">
            <img src="{{ asset(System::app()->logo ?? 'images/system/logo.png') }}">
            <p>{{ System::app()->name ?? config('app.name', 'SMS') }}</p>
            <i class="fas fa-angle-right"></i>
        </a>
        <ul class="secondary-sidebar-profile-menu list-unstyled d-flex">
            <li class="flex-fill"><a href="#"><i class="fas fa-rocket"></i></a></li>
            <li class="flex-fill"><a href="#"><i class="fas fa-globe-africa"></i></a></li>
            <li class="flex-fill"><a href="#"><i class="fas fa-inbox"></i></a></li>
            <li class="flex-fill"><a href="#"><i class="far fa-comments"></i></a></li>
        </ul>
    </div>
    <div class="secondary-sidebar-menu">
        <ul class="accordion-menu">
            <li>
                <a href="index.html">
                    <i class="menu-icon icon-home4"></i><span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i class="menu-icon icon-apps"></i><span>Apps</span><i class="accordion-icon fas fa-angle-left"></i>
                </a>
                <ul class="sub-menu">
                    <li><a href="app-mailbox.html">Mailbox</a></li>
                    <li><a href="app-todo.html">Todo</a></li>
                    <li><a href="app-contacts.html">Contacts</a></li>
                    <li><a href="app-profile.html">Profile</a></li>
                </ul>
            </li>
            <li class="{{ request()->segment(1) == 'system' ? 'active-page' : '' }}">
                <a href="javascript:void(0)">
                    <i class="menu-icon icon-cog"></i><span>Settings</span><i class="accordion-icon fas fa-angle-left"></i>
                </a>
                <ul class="sub-menu">
					@can('system.access')
                    	<li><a href="{{ route('system.systems.index') }}" class="{{ request()->segment(2) == 'systems' ? 'active' : '' }}">System Setting</a></li>
					@endcan
                </ul>
            </li>
            <li class="{{ request()->segment(1) == 'currency' ? 'active-page' : '' }}">
                <a href="javascript:void(0)">
                    <i class="menu-icon icon-cog"></i><span>Currency</span><i class="accordion-icon fas fa-angle-left"></i>
                </a>
                <ul class="sub-menu">
					@can('currency.access')
                    	<li><a href="{{ route('currency.currencies.index') }}" class="{{ request()->segment(2) == 'currencies' ? 'active' : '' }}">Currency</a></li>
					@endcan
                </ul>
            </li>
            <li class="{{ request()->segment(1) == 'user-management' ? 'active-page' : '' }}">
                <a href="javascript:void(0)">
                    <i class="menu-icon icon-users"></i><span>Manage Users</span><i class="accordion-icon fas fa-angle-left"></i>
                </a>
                <ul class="sub-menu">
					@can('user.access')
                    	<li><a href="{{ route('user-management.users.index') }}" class="{{ request()->segment(2) == 'users' ? 'active' : '' }}">Users</a></li>
					@endcan
					@can('role.access')
                    	<li><a href="{{ route('user-management.roles.index') }}" class="{{ request()->segment(2) == 'roles' ? 'active' : '' }}">Role</a></li>
					@endcan
					@can('page.access')
                    	<li><a href="{{ route('user-management.pages.index') }}" class="{{ request()->segment(2) == 'pages' ? 'active' : '' }}">Page</a></li>
					@endcan
					@can('permission.access')
                    	<li><a href="{{ route('user-management.permissions.index') }}" class="{{ request()->segment(2) == 'permissions' ? 'active' : '' }}">Permissions</a></li>
					@endcan
                </ul>
            </li>
        </ul>
    </div>
</div>
