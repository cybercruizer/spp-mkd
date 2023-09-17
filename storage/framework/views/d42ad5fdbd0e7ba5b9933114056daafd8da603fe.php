<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function() {
            var bar = document.querySelector('.progress-bar');
            var intervalId = window.setInterval(() => {
                <?php if(request('job_status_id') != ''): ?>
                    $.getJSON(
                        "<?php echo e(route(auth()->user()->akses . '.jobstatus.show', request('job_status_id'))); ?>",
                        function(data, textStatus, jqXHR) {
                            var progressPercent = data['progress_percentage'];
                            var progressNow = data['progress_now'];
                            var progressMax = data['progress_max'];
                            var isEnded = data['is_ended'];
                            var id = data['id'];
                            bar.style.width = progressPercent + '%';
                            bar.innerText = progressPercent + '%';
                            $("#progress-now" + id).text(progressNow);
                            $("#progress-max" + id).text(progressMax);
                            console.log(isEnded);
                            if (isEnded) {
                                window.location.href =
                                    "<?php echo e(route(auth()->user()->akses . '.jobstatus.index')); ?>";
                            }
                        }
                    );
                <?php else: ?>
                    clearInterval(intervalId);
                <?php endif; ?>
                console.log('job running');
            }, 1000);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header fw-bold fs-5" style="color: #012970;"><?php echo e($title); ?></h5>

                <div class="card-body">
                    <div class="row my-3">
                        <div class="col-md-6">
                            <a href="<?php echo e(route(auth()->user()->akses . '.tagihan.create')); ?>" class="btn btn-primary mt-4">
                                Tambah Tagihan SPP
                            </a>
                            <a href="<?php echo e(route(auth()->user()->akses . '.tagihanlainstep.create', ['step' => 1])); ?>"
                                class="btn btn-success mt-4 ml-2">
                                Tambah Tagihan Lain
                            </a>
                        </div>

                    </div>
                    <?php if(request('job_status_id') != ''): ?>
                        <div class="progress mb-3">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                                aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="<?php echo e(config('app.table_style')); ?>">
                            <thead class="<?php echo e(config('app.thead_style')); ?>">
                                <tr>
                                    <th width="1%;">No</th>
                                    <th>Job Modul</th>
                                    <th>Progress</th>
                                    <th>Status</th>
                                    <th>Tanggal dibuat</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td>
                                            <?php if($item->status == 'finished'): ?>
                                                <?php echo e(substr($item->type, 9)); ?>

                                            <?php else: ?>
                                                <a
                                                    href="<?php echo e(route(auth()->user()->akses . '.jobstatus.index', ['job_status_id' => $item->id])); ?>">
                                                    <?php echo e($item->type); ?>

                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span id="progress-now<?php echo e($item->id); ?>"><?php echo e($item->progress_now); ?></span> /
                                            <span id="progress-max<?php echo e($item->id); ?>"><?php echo e($item->progress_max); ?></span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge rounded bg-<?php echo e($item->status == 'finished' ? 'primary' : 'info'); ?>">
                                                <?php echo e($item->status); ?>

                                            </span>

                                        </td>
                                        <td><?php echo e($item->created_at->format('d-m-Y H:i')); ?></td>
                                        <td><?php echo e(json_encode($item->output)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="8" class="text-center fw-bold">Tidak ada data</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <?php echo $models->links(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Buat Tagihan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/jobstatus_index.blade.php ENDPATH**/ ?>