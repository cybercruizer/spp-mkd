<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-heading">APP</li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('wali.beranda') ? '' : 'collapsed'); ?>" href="<?php echo e(route('wali.beranda')); ?>">
            <i class="bi bi-grid"></i>
            <span>Beranda</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('wali.profil.*') ? '' : 'collapsed'); ?>" href="<?php echo e(route('wali.profil.create')); ?>">
            <i class="bi bi-person"></i>
            <span>Ubah Profil</span>
        </a>
    </li>

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('wali.siswa.*') ? '' : 'collapsed'); ?>" href="<?php echo e(route('wali.siswa.index')); ?>">
            <i class="bi bi-people"></i>
            <span>Data Siswa</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo e(\Route::is('wali.tagihan.*') || \Route::is('wali.pembayaran.*') ? '' : 'collapsed'); ?>"
            href="<?php echo e(route('wali.tagihan.index')); ?>">
            <i class="bi bi-calendar2-check"></i>
            <span>Data Tagihan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(route('logout')); ?>">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
        </a>
    </li>

</ul>
<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/components/sidebar_wali.blade.php ENDPATH**/ ?>