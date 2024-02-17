<div class="menu">
    <form class="menu-search" method="POST" name="header_search_form">
        <div class="menu-search-icon"><i class="fa fa-search"></i></div>
        <div class="menu-search-input">
            <input type="text" class="form-control" placeholder="Search menu...">
        </div>
    </form>
    <?php
    $school = (new \App\Http\Controllers\SchoolController())->loggedIn();
    $notifications = (new \App\Http\Controllers\SchoolController())->getUnreadNotifications($school->id);
    ?>
    <div class="menu-item dropdown">
        <a href="#" data-bs-toggle="dropdown" data-display="static" class="menu-link">
            <div class="menu-icon"><i class="fa fa-bell nav-icon"></i></div>
            <div class="menu-label">{{ $notifications->count() }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-notification">
            <h6 class="dropdown-header text-body-emphasis mb-1">Notifications</h6>
            @foreach($notifications as $notification)
                <a href="#" class="dropdown-notification-item">
                    <div class="dropdown-notification-icon">
                        <i class="far fa-user-circle fa-lg fa-fw text-muted"></i>
                    </div>
                    <div class="dropdown-notification-info">
                        <div class="title">{{ $notification->subject }}</div>
                        <div class="time">{{ $notification->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="dropdown-notification-arrow">
                        <i class="fa fa-chevron-right"></i>
                    </div>
                </a>
            @endforeach


            <div class="p-2 text-center mb-n1">
                <a href="{{ route('school.notifications.all') }}" class="text-body-emphasis text-opacity-50 text-decoration-none">See all</a>
            </div>
        </div>
    </div>
    <div class="menu-item dropdown">
        <a href="#" data-bs-toggle="dropdown" data-display="static" class="menu-link">
            <div class="menu-img online">
                <img src="{{ asset('assets/img/user/user.png') }}" alt class="ms-100 mh-100 rounded-circle">
            </div>
            <div class="menu-text">{{ $school->email }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-end me-lg-3">
            <a class="dropdown-item d-flex align-items-center" href="profile.html">Edit Profile <i class="fa fa-user-circle fa-fw ms-auto text-body text-opacity-50"></i></a>
            <a class="dropdown-item d-flex align-items-center" href="email_inbox.html">Inbox <i class="fa fa-envelope fa-fw ms-auto text-body text-opacity-50"></i></a>
            <a class="dropdown-item d-flex align-items-center" href="calendar.html">Calendar <i class="fa fa-calendar-alt fa-fw ms-auto text-body text-opacity-50"></i></a>
            <a class="dropdown-item d-flex align-items-center" href="settings.html">Setting <i class="fa fa-wrench fa-fw ms-auto text-body text-opacity-50"></i></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item d-flex align-items-center" href="page_login.html">Log Out <i class="fa fa-toggle-off fa-fw ms-auto text-body text-opacity-50"></i></a>
        </div>
    </div>
</div>
