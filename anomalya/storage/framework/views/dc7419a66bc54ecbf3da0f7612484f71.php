<?php $__env->startSection('title', __('register_page.title')); ?>

<?php $__env->startSection('content'); ?>
<div class="registration-container">
    <h1><?php echo e(__('register_page.heading')); ?></h1>
    <p><?php echo e(__('register_page.prompt')); ?></p>
    <form method="POST" action="<?php echo e(route('game.register')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name"><?php echo e(__('register_page.name')); ?></label>
            <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('register_page.name_placeholder')); ?>" required>
        </div>
        <div class="form-group">
            <label for="email"><?php echo e(__('register_page.email')); ?></label>
            <input type="email" class="form-control" name="email" placeholder="<?php echo e(__('register_page.email_placeholder')); ?>" required>
        </div>
        <div class="form-group">
            <label for="password"><?php echo e(__('register_page.password')); ?></label>
            <input type="password" class="form-control" name="password" placeholder="<?php echo e(__('register_page.password_placeholder')); ?>" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation"><?php echo e(__('register_page.password_confirmation')); ?></label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="<?php echo e(__('register_page.password_confirmation_placeholder')); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary"><?php echo e(__('register_page.register_button')); ?></button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.game', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\anomalya\resources\views/game/register.blade.php ENDPATH**/ ?>