<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
        <?php echo e(@$title != '' ? "$title |" : ''); ?> <?php echo e(settings()->get('app_name', 'My APP')); ?>

    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo e(\Storage::url(settings('app_logo'))); ?>" rel="icon">
    

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo e(asset('niceadmin')); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('niceadmin')); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo e(asset('niceadmin')); ?>/assets/css/style.css" rel="stylesheet">

    
    <link rel="stylesheet" href="<?php echo e(asset('font/css/all.min.css')); ?>">
    <style>
        body {
            background: #eee;
        }

        .table-dark {
            --bs-table-bg: #4b5563;
            /* background-color: #4a5073 !important; */
        }

        table tbody td {
            font-size: 14px;
        }

        table thead th {
            font-size: 15px;
        }

        /* top-left border-radius */
        table tr:first-child th:first-child {
            border-top-left-radius: 0.5rem !important;
        }

        /* top-right border-radius */
        table tr:first-child th:last-child {
            border-top-right-radius: 0.5rem !important;
        }

        /* bottom-left border-radius */
        table tr:last-child td:first-child {
            border-bottom-left-radius: 0.5rem !important;
        }

        /* bottom-right border-radius */
        table tr:last-child td:last-child {
            border-bottom-right-radius: 0.5rem !important;
        }

        .table>:not(caption)>*>* {
            border-bottom-width: 0px;
        }
    </style>
</head>

<body>
    <?php echo $__env->yieldContent('content'); ?>;
</body>

</html>
<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/layouts/app_niceadmin_blank.blade.php ENDPATH**/ ?>