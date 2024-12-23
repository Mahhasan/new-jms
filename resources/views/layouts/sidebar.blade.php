<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{asset('admin/images/faces/face1.jpg')}}" alt="profile" />
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">David Grey. H</span>
                    <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="{{url('/home')}}">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        <!--Admin Dashboard-->
        @if(Auth::user()->role_id == 1)
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#adminjournal" aria-expanded="false" aria-controls="adminjournal">
                <span class="menu-title">Journal</span>
                <i class="menu-arrow"></i>
                <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
            </a>
            <div class="collapse" id="adminjournal">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/create-journal')}}">Create Journal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/journal-list')}}">Journal List</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#adminvolume" aria-expanded="false" aria-controls="adminvolume">
                <span class="menu-title">Volume</span>
                <i class="menu-arrow"></i>
                <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
            </a>
            <div class="collapse" id="adminvolume">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/create-issue')}}">Add Issue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/create-volume')}}">Add Volume</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#adminarchive" aria-expanded="false" aria-controls="adminarchive">
                <span class="menu-title">Archive</span>
                <i class="menu-arrow"></i>
                <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
            </a>
            <div class="collapse" id="adminarchive">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/create-admin-archive')}}">Add Archive</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin-archive-list')}}">Archive List</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#adminmanuscript" aria-expanded="false" aria-controls="adminmanuscript">
                <span class="menu-title">Manuscript</span>
                <i class="menu-arrow"></i>
                <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
            </a>
            <div class="collapse" id="adminmanuscript">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/add-topic')}}">Paper Topic</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/manuscript-list')}}">Manuscript List</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#adminuser" aria-expanded="false" aria-controls="adminuser">
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
                <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
            </a>
            <div class="collapse" id="adminuser">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/create-user-role')}}">Create User Role</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/create-user')}}">Create User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/reviewer-list')}}">Reviewer List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/author-list')}}">Author List</a>
                    </li>
                </ul>
            </div>
        </li>

        <!--Author Dashboard-->
        @elseif(Auth::user()->role_id == 2)
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#author" aria-expanded="false" aria-controls="author">
                <span class="menu-title">Manuscript</span>
                <i class="menu-arrow"></i>
                <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
            </a>
            <div class="collapse" id="author">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/manuscript_submission')}}">Start Submission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/manuscript-list')}}">Manuscript List</a>
                    </li>
                </ul>
            </div>
        </li>

        <!--Reviewer Dashboard-->
        @elseif(Auth::user()->role_id == 3)

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#rivewermanuscript" aria-expanded="false" aria-controls="rivewermanuscript">
                <span class="menu-title">Manuscript</span>
                <i class="menu-arrow"></i>
                <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
            </a>
            <div class="collapse" id="rivewermanuscript">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/manuscript_submission')}}">Start Submission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/manuscript-list')}}">My Manuscript</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/review-manuscript')}}">Review Manuscript</a>
                    </li>
                </ul>
            </div>
        </li>

        <!--Editor Dashboard-->
        @elseif(Auth::user()->role_id == 4)

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#editormanuscript" aria-expanded="false" aria-controls="editormanuscript">
                <span class="menu-title">Manuscript</span>
                <i class="menu-arrow"></i>
                <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
            </a>
            <div class="collapse" id="editormanuscript">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/manuscript_submission')}}">Start Submission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/manuscript-list')}}">My Manuscript</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/editor-journal-list')}}">All Manuscript</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#editoruser" aria-expanded="false" aria-controls="editoruser">
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
                <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
            </a>
            <div class="collapse" id="editoruser">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/create-user')}}">Create Reviewer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/reviewer-list')}}">Reviewer List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/author-list')}}">Author List</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#editorvolume" aria-expanded="false" aria-controls="editorvolume">
                <span class="menu-title">Volume</span>
                <i class="menu-arrow"></i>
                <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
            </a>
            <div class="collapse" id="editorvolume">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/create-issue')}}">Add Issue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/create-volume')}}">Add Volume</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#editorarchive" aria-expanded="false" aria-controls="editorarchive">
                <span class="menu-title">Archive</span>
                <i class="menu-arrow"></i>
                <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
            </a>
            <div class="collapse" id="editorarchive">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/create-archive')}}">Add Archive</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/archive-list')}}">Archive List</a>
                    </li>
                </ul>
            </div>
        </li>
        @endif

        <!-- <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html" target="_blank">
                <span class="menu-title">Documentation</span>
                <i class="mdi mdi-file-document-box menu-icon"></i>
            </a>
        </li> -->
    </ul>
</nav>
