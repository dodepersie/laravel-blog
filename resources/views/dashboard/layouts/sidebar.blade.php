<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard.home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @cannot('user')
            <li class="nav-heading">Administrator</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#myposts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-files"></i><span>Artikel</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="myposts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="nav-link {{ Request::is('dashboard/posts') ? '' : 'collapsed' }}" href="{{ route('posts.index') }}">
                            <i class="bi bi-circle"></i><span>Semua Artikel</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link {{ Request::is('dashboard/posts/create') ? '' : 'collapsed' }}"
                            href="{{ route('posts.create') }}">
                            <i class="bi bi-circle"></i><span>Buat Artikel</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End My Posts Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? '' : 'collapsed' }}"
                    href="{{ route('categories.index') }}">
                    <i class="bi bi-journal-text"></i>
                    <span>Kategori</span>
                </a>
            </li><!-- End Categories Nav -->
        @endcannot

        @can('god')
            <li class="nav-heading">God Feature</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/users_list*') ? '' : 'collapsed' }}"
                    href="{{ route('users_list.index') }}">
                    <i class="bi bi-person"></i><span>Daftar User</span>
                </a>
            </li><!-- End Users List Nav -->
        @endcan

        <li class="nav-heading">Pengaturan Akun</li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/profile*') ? '' : 'collapsed' }}" href="{{ route('profile.index') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link collapsed border-0" style="width: 100%;"><i
                        class="bi bi-box-arrow-right"></i> Keluar</button>
            </form>
        </li><!-- End Login Page Nav -->
    </ul>
</aside>
