  <!-- sidebar @s -->
  <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="/" class="logo-link nk-sidebar-logo">
                            <!-- <img class="logo-small logo-img logo-img-small" src="{{ asset('images/logo-small.png') }}" srcset="{{ asset('images/logo-small2x.png ') }}" alt="logo-small"> -->
                            <img class="logo-light logo-img" src="{{ asset('images/logo.png') }}"  srcset="{{ asset('images/logo2x.png 2x') }}" alt="logo">
                            <img class="logo-dark logo-img" src="{{ asset('images/logo-dark.png') }}"  srcset="{{ asset('images/logo-dark2x.png 2x') }}" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="{{ asset('images/logo-small.png') }}"  srcset="{{ asset('images/logo-small2x.png 2x') }}" alt="logo-small">
                          </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-item">
                                    <a href="/dashboard" wire:navigate class="nk-menu-link" >
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                        <span class="nk-menu-text">{{ __('Dashboard') }}</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                              
                                <li class="nk-menu-item">
                                    <a href="{{ route('account.homeshopify.index') }}" wire:navigate class="nk-menu-link {{ return_if(on_page('account.homeshopify.index'), ' active') }}">
                                        <span class="nk-menu-icon"><em class="icon ni ni-copy"></em></span>
                                        <span class="nk-menu-text">{{ __('Product Importer') }}</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Return to</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{ route('account.tutorial.index') }}" wire:navigate class="nk-menu-link {{ return_if(on_page('account.tuto.index') OR on_page('account.tuto.index') OR on_page('account.tuto.index'), ' active') }}">
                                        <span class="nk-menu-icon"><em class="icon ni ni-package-fill"></em></span>
                                        <span class="nk-menu-text">{{ __('Tutorial') }}</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="{{ route('ticket.index') }}" class="nk-menu-link nk-menu-toggle {{ return_if(on_page('ticket.index') or on_page('ticket.create'), ' active') }}">
                                        <span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span>
                                        <span class="nk-menu-text">  {{ __('Ticket') }}</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ route('ticket.index') }}" class="nk-menu-link"><span class="nk-menu-text"> {{ __('Support') }}</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('ticket.create') }}" class="nk-menu-link"><span class="nk-menu-text"> {{ __('New ticket') }}</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-credit-card"></em></span>
                                        <span class="nk-menu-text">{{ __('Billing') }}</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ route('account.subscriptions') }}" class="nk-menu-link  {{ return_if(on_page('account.subscriptions'), ' active') }}"><span class="nk-menu-text">  {{ __('Subscriptions') }}</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('account.subscriptions.card') }}" class="nk-menu-link {{ return_if(on_page('account.subscriptions.card'), ' active') }}"><span class="nk-menu-text">  {{ __('Payment') }}</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('account.subscriptions.invoices') }}" class="nk-menu-link {{ return_if(on_page('account.subscriptions.invoices'), ' active') }}"><span class="nk-menu-text">{{ __('Invoices') }}</span></a>
                                        </li>
                                        @if(!currentTeam()->subscribed())
                                        <li class="nk-menu-item">
                                            <a href="{{ route('subscription.plans') }}" class="nk-menu-link {{ return_if(on_page('subscription.plans'), ' active') }}"><span class="nk-menu-text">    {{ __('Plans') }}</span></a>
                                        </li>
                                        @endif
                                        @if (currentTeam()->onTrial())
                                        <li class="nk-menu-item">
                                            <a href="{{ route('account.subscriptions') }}" class="nk-menu-link {{ return_if(on_page('account.subscriptions') OR on_page('account.product.create') OR on_page('account.product.edit'), ' active') }}"><span class="nk-menu-text"> {{ __('Skip Trial Now ') }}</span></a>
                                        </li>
                                        @endif
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->