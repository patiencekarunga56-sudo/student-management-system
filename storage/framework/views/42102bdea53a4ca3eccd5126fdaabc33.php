<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Student Management System'); ?></title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/logo.png')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'] } } } };
    </script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/styles.css')); ?>">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-white text-slate-900 font-sans antialiased min-h-screen flex flex-col">
    <?php echo $__env->yieldContent('content'); ?>
    <script>lucide.createIcons();</script>
</body>
</html><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/layouts/main.blade.php ENDPATH**/ ?>