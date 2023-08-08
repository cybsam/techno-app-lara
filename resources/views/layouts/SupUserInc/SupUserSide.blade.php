    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('Administrator.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Apps</li>




            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#email-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-envelope"></i><span>Emails</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="email-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Compose</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-download"></i><span>Inbox</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Drifts</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Trash</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-heading">Product & Service</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#product_and_service" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Product & Service</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="product_and_service" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    {{-- <li>
                    <a href="{{ route('supuserBlog.myBlog') }}">
                    <i class="bi bi-circle"></i><span>My Article</span>
                    </a>
                </li> --}}
                    <li>
                        {{-- <a href="{{ route('supuser.blog') }}">
                <i class="bi bi-circle"></i><span>List Article</span>
                </a> --}}
                    </li>
                    <li>
                        {{-- <a href="{{ route('supuser.blog.insert') }}">
                <i class="bi bi-circle"></i><span>Insert Article</span>
                </a> --}}
                    </li>
                    <li>
                        {{-- <a href="{{ route('supuser.blogArchive') }}">
                <i class="bi bi-circle"></i><span>Archive Article</span>
                </a> --}}
                    </li>


                </ul>
            </li><!-- End Components Nav -->
            {{-- @php
                $pendingPost = App\Models\SupUserBlog::where('post_status',3)->count();
            @endphp --}}
            <li class="nav-heading">Our Project</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#our_project_front" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Our Project</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="our_project_front" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>On Going Project</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Complete Project</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-heading">About Us</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#about_us_frontend" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>About Us </span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="about_us_frontend" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('SupUser.OurTeam') }}" class="@if(URL()->current() == route('SupUser.OurTeam')) active @endif">
                            <i class="bi bi-circle"></i><span>Our Team </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.AboutUsIndex') }}" class="@if(URL()->current() == route('SupUser.AboutUsIndex')) active @endif">
                            <i class="bi bi-circle"></i><span>About Us </span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Our Concern </span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Our Expertise </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.MissionVission') }}" class="@if(URL()->current() == route('SupUser.MissionVission')) active @endif">
                            <i class="bi bi-circle"></i><span>Our Mission & Vission </span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Our strategic-partners </span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Catagory</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    {{-- <li>
                <a href="{{ route('subcatagory.index') }}">
                <i class="bi bi-circle"></i><span>All Catagory</span>
                </a>
            </li>
            <li>
                <a href="{{ route('subcatagory.mycategory') }}">
                <i class="bi bi-circle"></i><span>My Catagory</span>
                </a>
            </li>
            <li>
                <a href="{{ route('subcatagory.insert') }}">
                <i class="bi bi-circle"></i><span>Insert Sub Catagory</span>
                </a>
            </li>
            <li>
                <a href="{{ route('subcatagoryIndex.archived') }}">
                <i class="bi bi-circle"></i><span>Archived</span>
                </a>
            </li> --}}
                </ul>
            </li><!-- End Charts Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#catagory-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Super Catagory</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="catagory-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    {{-- <li>
                <a href="{{ route('supuser.cata.super') }}">
                <i class="bi bi-circle"></i><span>Active Catagory</span>
                </a>
            </li>
            <li>
                <a href="{{ route('supuser.MycategorySuper') }}">
                <i class="bi bi-circle"></i><span>My Catagory</span>
                </a>
            </li>
            <li>
                <a href="{{ route('supuser.cata.super.insert') }}">
                <i class="bi bi-circle"></i><span>Insert Catagory</span>
                </a>
            </li>
            <li>
                <a href="{{ route('supuser.cata.super.archive') }}">
                <i class="bi bi-circle"></i><span>Archived</span>
                </a>
            </li> --}}
                </ul>
            </li>

            <li class="nav-heading">Users</li>
            <li class="nav-item @if (url()->current() == route('SupUser.ListUsers')) active @endif">
                <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person-lines-fill"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="users-nav" class="nav-content collapse active" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('SupUser.ListUsers') }}"
                            class="@if (url()->current() == route('SupUser.ListUsers')) active @endif">
                            <i class="bi bi-circle"></i><span>Users List</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Archive Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Block Users</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-heading">Menu</li>
            <li class="nav-item ">
                <a class="nav-link collapsed" data-bs-target="#menu_part" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-up"></i><span>Menu Bar</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="menu_part" class="nav-content collapse active" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="" class="">
                            <i class="bi bi-circle"></i><span>Menu List</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Archive Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Block Users</span>
                        </a>
                    </li>
                </ul>
            </li>




            <li class="nav-heading">Settings</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-gear"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="settings-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Main Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Find Us</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.SetingsAboutUsInfo') }}"
                            class="@if (url()->current() == route('SupUser.SetingsAboutUsInfo')) active @endif">
                            <i class="bi bi-circle"></i><span>About Us Info</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Terms Of Condition</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.TeamManagementInsert') }}" class="@if(URL()->current() == route('SupUser.TeamManagementInsert')) active @endif">
                            <i class="bi bi-circle"></i><span>Employee Management Department List</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-heading">Pages</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-faq.html">
                    <i class="bi bi-question-circle"></i>
                    <span>F.A.Q</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
            {{-- @php
                $countContact = App\Models\Contact::where('seen',0)->count();
            @endphp --}}
            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-envelope"></i>
                    <span>Contact Message <span style="color:red;">6</span></span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" target="_blank" href="{{ url('/') }}">
                    <i class="bi bi-dash-circle"></i>
                    <span>View Site</span>
                </a>
            </li><!-- End Error 404 Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard.blank') }}">
                    <i class="bi bi-file-earmark"></i>
                    <span>Blank</span>
                </a>
            </li><!-- End Blank Page Nav -->
        </ul>
    </aside><!-- End Sidebar-->
