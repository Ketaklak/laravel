<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <h1 class="dashboard-title">Dashboard du Jeu Médiéval</h1>
    <p class="welcome-message">Bienvenue, <?php echo e(auth()->guard('player')->user()->name); ?> !</p>
    <p>Gérez vos ressources, développez votre royaume, et menez vos armées à la victoire !</p> 
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.game', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\anomalya\resources\views/game/dashboard.blade.php ENDPATH**/ ?>