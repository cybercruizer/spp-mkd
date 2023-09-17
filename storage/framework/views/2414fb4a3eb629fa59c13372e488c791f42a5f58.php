<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-heading">APP</li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('kepala_sekolah.beranda') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('kepala_sekolah.beranda')); ?>">
            <i class="bi bi-grid"></i>
            <span>Beranda</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('kepala_sekolah.setting*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('kepala_sekolah.setting.create')); ?>">
            <i class="bi bi-gear"></i>
            <span>Pengaturan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('kepala_sekolah.logactivity*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('kepala_sekolah.logactivity.index')); ?>">
            <i class="bi bi-gear"></i>
            <span>Aktivitas User</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('kepala_sekolah.logvisitor*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('kepala_sekolah.logvisitor.index')); ?>">
            <i class="bi bi-gear"></i>
            <span>Monitoring Traffic URL</span>
        </a>
    </li>

    <li class="nav-heading">DATA MASTER</li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('kepala_sekolah.user.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('kepala_sekolah.user.index')); ?>">
            <i class="bi bi-people"></i>
            <span>Data User</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('kepala_sekolah.siswa.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('kepala_sekolah.siswa.index')); ?>">
            <i class="bi bi-people"></i>
            <span>Data Siswa/i</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('kepala_sekolah.wali.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('kepala_sekolah.wali.index')); ?>">
            <i class="bi bi-people"></i>
            <span>Data Wali Murid</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('kepala_sekolah.banksekolah.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('kepala_sekolah.banksekolah.index')); ?>">
            <i class="bi bi-credit-card"></i>
            <span>Data Rekening Sekolah</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('kepala_sekolah.biaya.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('kepala_sekolah.biaya.index')); ?>">
            <i class="bi bi-credit-card"></i>
            <span>Data Biaya</span>
        </a>
    </li>

    <li class="nav-heading">DATA TRANSAKSI</li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('kepala_sekolah.jobstatus*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('kepala_sekolah.jobstatus.index')); ?>">
            <i class="bi bi-gear"></i>
            <span>Buat Tagihan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('kepala_sekolah.tagihan.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('kepala_sekolah.tagihan.index')); ?>">
            <i class="bi bi-calendar2-check"></i>
            <span>Data Tagihan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('kepala_sekolah.pembayaran.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('kepala_sekolah.pembayaran.index')); ?>">
            <i class="bi bi-upload"></i>
            <span>Data Pembayaran</span>
            <span class="mx-1"></span>
            <span class="badge bg-danger rounded-pill">
                <?php echo e(auth()->user()->unreadNotifications->count()); ?>

            </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('kepala_sekolah.laporan*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('kepala_sekolah.laporanform.create')); ?>">
            <i class="bi bi-file-check"></i>
            <span>Data Laporan</span>
        </a>
    </li>

    <li class="nav-heading">FITUR</li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('kepala_sekolah.migrasiform*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('kepala_sekolah.migrasiform.index')); ?>">
            <i class="bi bi-box-arrow-right"></i>
            <span>Mutasi Siswa/i</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(route('logout')); ?>">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
        </a>
    </li>

</ul>
<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/components/sidebar_kepala_sekolah.blade.php ENDPATH**/ ?>