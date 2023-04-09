<div class="left-side-menu">
    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="/assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                 class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                   data-bs-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">عام</li>

                <li>
                    <a href="apps-calendar.html">
                        <i data-feather="dashboard"></i>
                        <span> الرئيسية </span>
                    </a>
                </li>

                <li class="menu-title mt-2">الأشخاص</li>

                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> الطاقم التعليمي </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('teachers.index')}}">عرض الجميع</a>
                            </li>
                            <li>
                                <a href="{{route('teachers.create')}}">اضافة جديد</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarStd" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> الطلاب </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarStd">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('students.index')}}">عرض الجميع</a>
                            </li>
                            <li>
                                <a href="{{route('students.create')}}">اضافة جديد</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">خصائص</li>

                <li>
                    <a href="#sidebarCrs" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> المواد الجامعية </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrs">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('courses.index')}}">عرض الجميع</a>
                            </li>
                            <li>
                                <a href="{{route('courses.create')}}">اضافة جديد</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarSct" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> المحاضرات </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSct">
                        <ul class="nav-second-level">
                            <li>
                                <a href="/sections">عرض الجميع</a>
                            </li>
                            <li>
                                <a href="/sections/create">اضافة جديد</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarRpt" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> تقارير </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarRpt">
                        <ul class="nav-second-level">
                            <li>
                                <a href="/reports/general">تقرير عام</a>
                            </li>
                            <li>
                                <a href="/reports/daily">تقرير يومي</a>
                            </li>
                            <li>
                                <a href="/reports/teachers">تقرير الطاقم التعليمي</a>
                            </li>
                            <li>
                                <a href="/reports/students">تقرير الطلاب</a>
                            </li>
                            <li>
                                <a href="/reports/courses">تقرير المواد الجامعية</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
