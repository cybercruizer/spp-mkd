<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-heading">Home</li>

    <li class="nav-item">
        <a class="nav-link {{ \Route::is('walikelas.beranda') ? '' : 'collapsed' }}" href="{{ route('walikelas.beranda') }}">
            <i class="bi bi-grid"></i>
            <span>Beranda</span>
        </a>
    </li>

    <li class="nav-heading">Data Kelas</li>

    <li class="nav-item">
        <a class="nav-link {{ \Route::is('walikelas.siswa.*') ? '' : 'collapsed' }}" href="{{ route('walikelas.siswa.index') }}">
            <i class="bi bi-people"></i>
            <span>Data Siswa</span>
        </a>
    </li>

    <li class="nav-heading">Akun</li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('logout') }}">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
        </a>
    </li>

</ul>
