<?php $__env->startSection('content'); ?>
<div class="container mt-5 text-center">
    <div class="welcome-container">
        <h1><?php echo e(__('custom_messages.welcome_title')); ?></h1>
        <p><?php echo e(__('custom_messages.welcome_message')); ?></p>
    </div>

    <h2><?php echo e(__('custom_messages.news_title')); ?></h2>
    <div class="news-container">
        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="news-item">
                <h3><?php echo e($item->title); ?></h3>
                <p><?php echo e($item->content); ?></p>
                <small><?php echo e(__('custom_messages.published_on')); ?> <?php echo e($item->created_at->format('d/m/Y')); ?></small>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.game', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\anomalya\resources\views/game/index.blade.php ENDPATH**/ ?>