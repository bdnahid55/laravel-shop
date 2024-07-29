<div class="left-side-bar">
        <div class="brand-logo">
            <a href="{{ route('admin.home') }}">
                <img src="/back/vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
                <img src="/back/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo" />
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">

                    <li>
                        <a href="{{ route('admin.home') }}" class="dropdown-toggle no-arrow  {{ request()->routeIs('admin.home') ? 'active' : '' }}">
                            <span class="micon bi bi-calendar4-week"></span><span class="mtext">Home</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-house"></span><span class="mtext">Admin</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.admins.create-admins') }}" class="dropdown-toggle no-arrow  {{ request()->routeIs('admin.admins.create-admins') ? 'active' : '' }}">Create Admin</a></li>
                            <li><a href="{{ route('admin.admins.all') }}" class="dropdown-toggle no-arrow  {{ request()->routeIs('admin.admins.all') ? 'active' : '' }}">All Admin</a></li>
                        </ul>
                    </li>

                    {{-- Settings option menu  --}}
                    <li>
                        <div class="sidebar-small-cap">Extra</div>
                    </li>


                    <li>
                        <a href="{{ route('admin.backup.all-backup') }}" class="dropdown-toggle no-arrow  {{ request()->routeIs('admin.backup.all-backup') ? 'active' : '' }}">
                            <span class="micon bi bi-receipt-cutoff"></span><span class="mtext">Backups</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
