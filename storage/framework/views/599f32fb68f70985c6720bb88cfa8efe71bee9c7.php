<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-heading">Shortcut</li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('operator.beranda') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('operator.beranda')); ?>">
            <i class="bi bi-grid"></i>
            <span>Beranda</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('operator.transaksi.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('operator.transaksi.index')); ?>">
            <i class="bi bi-grid"></i>
            <span>Transaksi</span>
        </a>
    </li>

    <li class="nav-heading">DATA MASTER</li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('operator.siswa.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('operator.siswa.index')); ?>">
            <i class="bi bi-people"></i>
            <span>Data Siswa/i</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('operator.wali.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('operator.wali.index')); ?>">
            <i class="bi bi-people"></i>
            <span>Data Wali Murid</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('operator.banksekolah.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('operator.banksekolah.index')); ?>">
            <i class="bi bi-credit-card"></i>
            <span>Data Rekening Sekolah</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('operator.biaya.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('operator.biaya.index')); ?>">
            <i class="bi bi-credit-card"></i>
            <span>Data Biaya</span>
        </a>
    </li>

    <li class="nav-heading">DATA TRANSAKSI</li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('operator.jobstatus*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('operator.jobstatus.index')); ?>">
            <i class="bi bi-gear"></i>
            <span>Buat Tagihan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('operator.tagihan.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('operator.tagihan.index')); ?>">
            <i class="bi bi-calendar2-check"></i>
            <span>Data Tagihan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('operator.pembayaran.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('operator.pembayaran.index')); ?>">
            <i class="bi bi-upload"></i>
            <span>Data Pembayaran</span>
            <span class="mx-1"></span>
            <span class="badge bg-danger rounded-pill">
                <?php echo e(auth()->user()->unreadNotifications->count()); ?>

            </span>
        </a>
    </li>

    <li class="nav-heading">FITUR</li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('operator.migrasiform*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('operator.migrasiform.index')); ?>">
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
<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/components/sidebar_operator.blade.php ENDPATH**/ ?>