<div class="row justify-content-center">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a href="{{ route('setting.create') }}"
                    class="nav-link {{ \Route::is('setting.create') ? 'active' : '' }}">
                    <i class="bi bi-gear me-1"></i>
                    Pengaturan Aplikasi
                </a>
            </li>
            <li class="nav-item mx-2">
                <a href="{{ route('settingwhacenter.create') }}"
                    class="nav-link {{ \Route::is('settingwhacenter.create') ? 'active' : '' }}">
                    <i class="bi bi-whatsapp me-1"></i>
                    Pengaturan WhaCenter
                </a>
            </li>
        </ul>
    </div>
</div>
