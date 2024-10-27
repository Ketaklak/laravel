<?php $__env->startSection('title', __('custom_messages.login_title')); ?>

<?php $__env->startSection('content'); ?>
<div class="login-container">
    <h1><?php echo e(__('custom_messages.login_title')); ?></h1>
    <p><?php echo e(__('custom_messages.login_prompt')); ?></p>
    <form method="POST" action="<?php echo e(route('game.login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <input type="email" name="email" placeholder="<?php echo e(__('custom_messages.email_placeholder')); ?>" required class="form-control">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="<?php echo e(__('custom_messages.password_placeholder')); ?>" required class="form-control">
        </div>
        <button type="submit" class="btn btn-primary"><?php echo e(__('custom_messages.login_title')); ?></button>
        <p class="mt-2"><?php echo e(__('custom_messages.no_account')); ?> <a href="<?php echo e(route('game.register')); ?>"><?php echo e(__('custom_messages.register_title')); ?></a></p>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.game', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\anomalya\resources\views/game/login.blade.php ENDPATH**/ ?>