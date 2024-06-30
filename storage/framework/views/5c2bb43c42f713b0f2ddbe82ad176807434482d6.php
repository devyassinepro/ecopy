
<div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="/" class="logo-link">
                                    <img class="logo-light logo-img" src="<?php echo e(asset('images/logo.png')); ?>" srcset="<?php echo e(asset('images/logo2x.png 2x')); ?>" alt="logo">
                                    <img class="logo-dark logo-img" src="<?php echo e(asset('images/logo-dark.png')); ?>" srcset="<?php echo e(asset('images/logo-dark2x.png 2x')); ?>" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <!-- <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="quick-icon border border-light">
                                            <img src="<?php echo e(asset('saas/svg/flags/'.app()->getLocale().'.svg')); ?>" alt="United States Flag">
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
                                            <ul class="language-list">
                                            <?php $__currentLoopData = language()->allowed(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <span class="language-name"><?php echo e($name); ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             
                                            </ul>
                                        </div>
                                    </li>.dropdown -->
                                  
                                    <li><a class="dark-switch" href="#"></a></li>


                                                   <!-- Search form -->
                                    <ul class="navbar-nav align-items-center ml-md-auto">
                                        <li class="nav-item d-xl-none">
                                            <!-- Sidenav toggler -->
                                            <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin" data-target="#sidenav-main">
                                                <div class="sidenav-toggler-inner">
                                                <i class="sidenav-toggler-line"></i>
                                                <i class="sidenav-toggler-line"></i>
                                                <i class="sidenav-toggler-line"></i>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('notifications', []);

$__html = app('livewire')->mount($__name, $__params, 'DtyCesx', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                        </li>
                                        <!-- End Language -->

                                    </ul>
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                <img alt="Image placeholder" src="<?php echo e(Auth::user()->profile_photo_url); ?>">
                                                </div>
                                                <div class="user-info d-none d-xl-block">
                                                    <div class="user-name dropdown-indicator"><?php echo e(Auth::user()->name); ?></div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="<?php echo e(route('profile.show')); ?>"><em class="icon ni ni-user-alt"></em><span> <?php echo e(__('Profile')); ?></span></a></li>
                                                    <li><a href="<?php echo e(route('account.password')); ?>"><em class="icon ni ni-setting-alt"></em><span><?php echo e(__('Password')); ?></span></a></li>
                                                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                                                    <li><a href="<?php echo e(route('admin.index')); ?>"><em class="icon ni ni-activity-alt"></em><span> <?php echo e(__('Admin panel')); ?></span></a></li>
                                                    <?php endif; ?>
                                                    <!-- <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li> -->
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                    <a class="px-0 dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <span class="dropdown-item-icon">
                                                        <i class="fas fa-power-off"></i>
                                                    </span>
                                                    <?php echo e(__('Logout')); ?>

                                                    </a>
                                                    <form method="POST" id="logout-form" action="<?php echo e(route('logout')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                    </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div><?php /**PATH /Users/touzani/Desktop/ecopy/ecopy.app/resources/views/partials/account/topnav.blade.php ENDPATH**/ ?>