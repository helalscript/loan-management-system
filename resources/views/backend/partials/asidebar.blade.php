{{-- @php
$systemSetting = App\Models\SystemSetting::first();
@endphp --}}
<!-- Start Sidebar Area -->
<div class="sidebar-area" id="sidebar-area">
    <div class="logo position-relative">
        <a href="{{ route('admin.dashboard') }}" class="d-block text-decoration-none position-relative">
            <img src="{{ asset($systemSetting->logo ?? 'backend/admin/assets/logo.png') }}" alt="logo-icon"
                style="height: 100px">
        </a>
        <button
            class="sidebar-burger-menu bg-transparent p-0 border-0 opacity-0 z-n1 position-absolute top-50 end-0 translate-middle-y"
            id="sidebar-burger-menu">
            <i data-feather="x"></i>
        </button>
    </div>

    <aside id="layout-menu" class="layout-menu menu-vertical menu active" data-simplebar
        style="height: calc(100vh - 100px)">
        <ul class="menu-inner">
            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">MAIN</span>
            </li>
            <!-- Dashboard Menu Item -->
            <li class="menu-item open">
                <a href="{{ route('admin.dashboard') }}"
                    class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">dashboard</span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">APPS</span>
            </li>


            {{-- <!-- Coaches Menu Item -->
            <li class="menu-item {{ request()->routeIs('users.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">psychology</span>
                    <span class="title">Client</span>
                </a>
                <ul class="menu-sub">
                    <!-- Coaches Settings Submenu -->
                    <li class="menu-item ">
                        <a href="{{ route('users.index') }}"
                            class="menu-link {{ request()->routeIs('users.index') ? 'active' : '' }} ">
                            Client List
                        </a>
                    </li>

                </ul>
            </li> --}}
            <!-- Category Menu Item -->
            {{-- <li class="menu-item {{ request()->routeIs('candidates.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">group</span>
                    <span class="title">Candidate</span>
                </a>
                <ul class="menu-sub">
                    <!-- candidates Settings Submenu -->
                    <li class="menu-item ">
                        <a href="{{ route('candidates.index') }}"
                            class="menu-link {{ request()->routeIs('candidates.index') ? 'active' : '' }} ">
                            Candidate List
                        </a>
                    </li>

                </ul>
            </li> --}}

            <!-- Contact Support Message Menu Item -->
            {{-- <li class="menu-item open">
                <a href="{{ route('admin_cms.contact_us_page.index') }}"
                    class="menu-link {{ request()->routeIs('admin_contact_us.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">content_paste</span>
                    <span class="title">Message</span>
                </a>
            </li> --}}
            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">OTHERS</span>
            </li>

            <!-- Settings Menu Item -->
            <li class="menu-item {{ request()->routeIs('profile_settings.*', 'system_settings.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">settings</span>
                    <span class="title">Settings</span>
                </a>
                <ul class="menu-sub">
                    <!-- Account Settings Submenu -->
                    <li class="menu-item ">
                        <a href="{{ route('profile_settings.index') }}"
                            class="menu-link {{ request()->routeIs('profile_settings.index') ? 'active' : '' }} ">
                            Profile Settings
                        </a>
                    </li>
                    <!-- Change Password Submenu -->
                    <li class="menu-item">
                        <a href="{{ route('profile_settings.password_change') }}"
                            class="menu-link {{ request()->routeIs('profile_settings.password_change') ? 'active' : '' }}">
                            Change Password
                        </a>
                    </li>
                    <!-- System Settings Configaration Submenu -->
                    <li class="menu-item">
                        <a href="{{ route('system_settings.index') }}"
                            class="menu-link {{ request()->routeIs('system_settings.*') ? 'active' : '' }}">
                            System Configaration
                        </a>
                    </li>

                </ul>
            </li>
            <!-- dynamic page Menu Item -->
            <li class="menu-item {{ request()->routeIs('dynamic_page.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">clarify</span>
                    <span class="title">Daynamic page</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('dynamic_page.index') }}"
                            class="menu-link {{ request()->routeIs('dynamic_page.index') ? 'active' : '' }}">
                            Pages
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('dynamic_page.create') }}"
                            class="menu-link {{ request()->routeIs('dynamic_page.create') ? 'active' : '' }}">
                            Add New
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">CMS</span>
            </li>

            <!-- CMS Home Page Menu Item -->
            <li class="menu-item {{ request()->routeIs('cms.home_page.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">handshake</span>
                    <span class="title">Home Page</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('cms.home_page.hero_section.create') }}"
                            class="menu-link {{ request()->routeIs('cms.home_page.hero_section.*') ? 'active' : '' }}">
                            Hero Section
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.home_page.services_overview_section.create') }}"
                            class="menu-link {{ request()->routeIs('cms.home_page.services_overview_section.*') ? 'active' : '' }}">
                            Services Overview
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.home_page.work_process_section.create') }}"
                            class="menu-link {{ request()->routeIs('cms.home_page.work_process_section.*') ? 'active' : '' }}">
                            Work Process
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.home_page.faq_section.create') }}"
                            class="menu-link {{ request()->routeIs('cms.home_page.faq_section.*') ? 'active' : '' }}">
                            FAQ's
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.home_page.testimonial_section.create') }}"
                            class="menu-link {{ request()->routeIs('cms.home_page.testimonial_section.*') ? 'active' : '' }}">
                            Testimonials
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.home_page.footer_section.create') }}"
                            class="menu-link {{ request()->routeIs('cms.home_page.footer_section.*') ? 'active' : '' }}">
                            Footer
                        </a>
                    </li>
                </ul>
            </li>
            <!-- CMS About Page Menu Item -->
            <li class="menu-item {{ request()->routeIs('cms.about_page.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">info</span>
                    <span class="title">About</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.our_story.index') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.our_story.*') ? 'active' : '' }}">
                            Our Story
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.our_vision.index') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.our_vision.*') ? 'active' : '' }}">
                            Our Vision
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.our_mission.index') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.our_mission.*') ? 'active' : '' }}">
                            Our Mission
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.how_it_works.index') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.how_it_works.*') ? 'active' : '' }}">
                            How It Works
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.our_services.index') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.our_services.*') ? 'active' : '' }}">
                            Our Services
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.leadership_team.index') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.leadership_team.*') ? 'active' : '' }}">
                            Leadership Team
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.faqs.index') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.faqs.*') ? 'active' : '' }}">
                            FAQ's
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.testimonials.index') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.testimonials.*') ? 'active' : '' }}">
                            Testimonials
                        </a>
                    </li>
                </ul>
            </li>
            <!-- CMS Resources Page Menu Item -->
            <li class="menu-item {{ request()->routeIs('cms.resources_page.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">info</span>
                    <span class="title">Resources</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('cms.resources_page.loan_calculator.index') }}"
                            class="menu-link {{ request()->routeIs('cms.resources_page.loan_calculator.*') ? 'active' : '' }}">
                            Loan Calculator
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.resources_page.ripe_credit_tracker_guide.index') }}"
                            class="menu-link {{ request()->routeIs('cms.resources_page.ripe_credit_tracker_guide.*') ? 'active' : '' }}">
                            RipeCredit Tracker Guide
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.resources_page.repayment_options.index') }}"
                            class="menu-link {{ request()->routeIs('cms.resources_page.repayment_options.*') ? 'active' : '' }}">
                            Repayment Options
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.resources_page.fees_policies.index') }}"
                            class="menu-link {{ request()->routeIs('cms.resources_page.fees_policies.*') ? 'active' : '' }}">
                            Fees & Policies
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.resources_page.security_privacy.index') }}"
                            class="menu-link {{ request()->routeIs('cms.resources_page.security_privacy.*') ? 'active' : '' }}">
                            Security & Privacy
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.resources_page.faqs.index') }}"
                            class="menu-link {{ request()->routeIs('cms.resources_page.faqs.*') ? 'active' : '' }}">
                            FAQ's
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.resources_page.blogs.index') }}"
                            class="menu-link {{ request()->routeIs('cms.resources_page.blogs.*') ? 'active' : '' }}">
                            Blogs
                        </a>
                    </li>
                </ul>
            </li>
            <!-- CMS Contact Us Page Menu Item -->
            <li class="menu-item {{ request()->routeIs('cms.contact_us_page.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">info</span>
                    <span class="title">Contact Us</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('cms.contact_us_page.index') }}"
                            class="menu-link {{ request()->routeIs('cms.contact_us_page.index') ? 'active' : '' }}">
                            Contact Information
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.contact_us_page.form.index') }}"
                            class="menu-link {{ request()->routeIs('cms.contact_us_page.form.*') ? 'active' : '' }}">
                            Contact Form
                        </a>
                    </li>
                </ul>
            </li>
            <!-- CMS Auth Page Menu Item -->
            <li class="menu-item {{ request()->routeIs('cms.auth_page.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">info</span>
                    <span class="title">Auth</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('cms.auth_page.login.index') }}"
                            class="menu-link {{ request()->routeIs('cms.auth_page.login.*') ? 'active' : '' }}">
                            Login
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.auth_page.register.index') }}"
                            class="menu-link {{ request()->routeIs('cms.auth_page.register.*') ? 'active' : '' }}">
                            Register
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.auth_page.forgot_password.index') }}"
                            class="menu-link {{ request()->routeIs('cms.auth_page.forgot_password.*') ? 'active' : '' }}">
                            Forgot Password
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Logout Menu Item -->
            <li class="menu-item">
                <a class="menu-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form-asidebar').submit();">
                    <span class="material-symbols-outlined menu-icon">logout</span>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
        <form id="logout-form-asidebar" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </aside>
</div>
<!-- End Sidebar Area -->
