<aside id="sidebar" class="u-sidebar">
    <div class="u-sidebar-inner">
        <header class="u-sidebar-header">
            <a class="u-sidebar-logo" href="<?php echo e(route('admin.index')); ?>">
                <img class="img-fluid" src="<?php echo e(asset('img/logo.png')); ?>" width="124" alt="Saasify Dashboard">
            </a>
        </header>

        <nav class="u-sidebar-nav">
            <ul class="u-sidebar-nav-menu u-sidebar-nav-menu--top-level">
                <!-- Dashboard -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php echo e(return_if(on_page('admin.index'), ' active')); ?>" href="<?php echo e(route('admin.index')); ?>">
                        <i class="fa fa-cubes u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Dashboard')); ?></span>
                    </a>
                </li>
                <!-- End Dashboard -->

                <!-- Users -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php echo e(return_if(on_page('admin.users.index') OR on_page('admin.users.create') OR on_page('admin.users.edit') OR on_page('admin.roles.index') OR on_page('admin.roles.create') OR on_page('admin.roles.edit') OR on_page('admin.permissions.create') OR on_page('admin.permissions.index') OR on_page('admin.permissions.edit'), ' active')); ?>"  href="#!"
                       data-target="#baseUI">
                        <i class="fas fa-users u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Users')); ?></span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>

                    <ul id="baseUI" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="<?php echo e(route('admin.users.index')); ?>">
                                <span class="u-sidebar-nav-menu__item-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Users')); ?></span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="<?php echo e(route('admin.activity')); ?>">
                                <span class="u-sidebar-nav-menu__item-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Activity')); ?></span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="<?php echo e(route('admin.roles.index')); ?>">
                                <span class="u-sidebar-nav-menu__item-icon">
                                    <i class="fas fa-user-cog"></i>
                                </span>
                                <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Roles')); ?></span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="<?php echo e(route('admin.permissions.index')); ?>">
                                <span class="u-sidebar-nav-menu__item-icon">
                                    <i class="fas fa-user-lock"></i>
                                </span>
                                <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Permissions')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php echo e(return_if(on_page('admin.plans.index') OR on_page('admin.plans.create') OR on_page('admin.plans.edit'), ' active')); ?>" href="<?php echo e(route('admin.plans.index')); ?>">
                        <i class="fas fa-chart-bar u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Plans')); ?></span>
                    </a>
                </li>

                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php echo e(return_if(on_page('admin.notifications'), ' active')); ?>" href="<?php echo e(route('admin.notifications')); ?>">
                        <i class="fas fa-envelope u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Send Notifications')); ?></span>
                    </a>
                </li>
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php echo e(return_if(on_page('admin.coupons.index') OR on_page('admin.coupons.create') OR on_page('admin.coupons.edit'), ' active')); ?>" href="<?php echo e(route('admin.coupons.index')); ?>">
                        <i class="fas fa-tags u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Coupons')); ?></span>
                    </a>
                </li>

                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php echo e(return_if(on_page('admin.backup.index'), ' active')); ?>" href="<?php echo e(route('admin.backup.index')); ?>">
                        <i class="fas fa-hdd u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Backups')); ?></span>
                    </a>
                </li>
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php echo e(return_if(on_page('admin.tickets'), ' active')); ?>" href="<?php echo e(route('admin.tickets')); ?>">
                        <i class="fas fa-ticket-alt u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Tickets')); ?></span>
                    </a>
                </li>
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php echo e(return_if(on_page('admin.maintenance'), ' active')); ?>" href="<?php echo e(route('admin.maintenance')); ?>">
                        <i class="fas fa-check-circle u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Maintenance mode')); ?></span>
                    </a>
                </li>

                <!-- Account Pages -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php echo e(return_if(on_page('admin.subscription.cancel') || on_page('admin.subscriptions'), ' active')); ?>" href="#!"
                       data-target="#subMenu2">
                        <i class="fas fa-dollar-sign u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Subscriptions')); ?></span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>

                    <ul id="subMenu2" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="<?php echo e(route('admin.subscriptions')); ?>">
                                <span class="u-sidebar-nav-menu__item-icon"><i class="fas fa-dollar-sign"></i></span>
                                <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Subscriptions')); ?></span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="<?php echo e(route('admin.subscription.cancel')); ?>">
                                <span class="u-sidebar-nav-menu__item-icon">C</span>
                                <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Subscriptions canceld')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Account Pages -->

                <!-- Other Pages -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link" href="#!"
                       data-target="#subMenu3">
                        <i class="fas fa-toolbox u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Tools')); ?></span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>

                    <ul id="subMenu3" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">
                        

                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="<?php echo e(url('/admin/languages')); ?>">
                                <span class="u-sidebar-nav-menu__item-icon"><i class="fas fa-globe"></i></span>
                                <span class="u-sidebar-nav-menu__item-title"><?php echo e(__('Translation')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Other Pages -->

                <hr>

                <!-- Documentation -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link" target="__blank" href="https://saasify.creatydev.com/docs/1.0/overview">
                        <i class="far fa-newspaper u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Documentation</span>
                    </a>
                </li>
                <!-- End Documentation -->
            </ul>
        </nav>
    </div>
</aside>
<?php /**PATH /Users/touzani/Desktop/ecopy/ecopy.app/resources/views/partials/admin/aside.blade.php ENDPATH**/ ?>