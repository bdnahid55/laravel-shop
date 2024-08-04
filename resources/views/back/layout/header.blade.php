<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>

        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="user-icon">
                        <img src="/uploads/admin/{{ Auth::guard('admin')->user()->image }}" alt="user" />
                    </span>
                    <span class="user-name">
                        {{ Auth::guard('admin')->user()->name }}
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-icon-list">
                    <li><a class="dropdown-item" href="{{ route('admin.change-password') }}"><i class="dw dw-user1"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="dw dw-logout"></i> Log Out</a></li>
                </ul>
            </div>
        </div>




    </div>
</div>
