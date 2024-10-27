<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', __('custom_messages.game_title')); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <a class="navbar-brand" href="<?php echo e(route('game.index')); ?>"><?php echo e(__('custom_messages.game_title')); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <?php if(auth()->guard('player')->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('game.index')); ?>"><?php echo e(__('custom_messages.home')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('game.login')); ?>"><?php echo e(__('custom_messages.login_title')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('game.register')); ?>"><?php echo e(__('custom_messages.register_title')); ?></a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo e(auth()->guard('player')->user()->name); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('game.logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo e(__('custom_messages.logout')); ?></a>
                    </li>
                    <form id="logout-form" action="<?php echo e(route('game.logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                <?php endif; ?>
            </ul>

            <?php if(auth()->guard('player')->check()): ?>
                <div class="resource-box d-flex justify-content-center align-items-center">
                    <p class="m-0"><?php echo e(__('custom_messages.resources')); ?>:</p>
                    <p class="m-0 ml-2"><?php echo e(__('custom_messages.wood')); ?>: <?php echo e($resources->wood ?? 0); ?></p>
                    <p class="m-0 ml-2"><?php echo e(__('custom_messages.stone')); ?>: <?php echo e($resources->stone ?? 0); ?></p>
                    <p class="m-0 ml-2"><?php echo e(__('custom_messages.food')); ?>: <?php echo e($resources->food ?? 0); ?></p>
                    <p class="m-0 ml-2"><?php echo e(__('custom_messages.gold')); ?>: <?php echo e($resources->gold ?? 0); ?></p>
                    <p class="m-0 ml-2"><?php echo e(__('custom_messages.level')); ?>: <?php echo e(auth()->guard('player')->user()->level ?? 0); ?></p>
                    <p class="m-0 ml-2"><?php echo e(__('custom_messages.experience')); ?>: <?php echo e(auth()->guard('player')->user()->experience ?? 0); ?></p>
                </div>
            <?php endif; ?>

            <!-- Sélecteur de langue -->
            <form action="<?php echo e(route('locale.change')); ?>" method="POST" class="form-inline ml-3">
                <?php echo csrf_field(); ?>
                <select name="locale" class="form-control" onchange="this.form.submit()">
                    <option value="en" <?php echo e(app()->getLocale() == 'en' ? 'selected' : ''); ?>>English</option>
                    <option value="fr" <?php echo e(app()->getLocale() == 'fr' ? 'selected' : ''); ?>>Français</option>
                </select>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH D:\laravel\anomalya\resources\views/layouts/game.blade.php ENDPATH**/ ?>