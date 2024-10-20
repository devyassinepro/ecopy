<!-- <section class="section-grey section-top-border section-bottom-border" id="pricing">
    <!-- begin container -->
    <h3 class="text-center section-title">{{ __('Find the right plan for your business') }}</h3>
    <div class="container">
        <!--begin row -->
        <div class="row">
            <div class="pricing">
                <!-- <div class="switch align-self-center">
                    <label>{{ __('Monthly') }}</label>
                    <input type="checkbox" wire:model.live="month" wire:change="changePlan" class="switch" id="switch-id" checked>
                    <label for="switch-id">{{ __('Yearly') }}</label><span class="mb-2 ml-2 badge badge-primary">{{ __('Save up to 10%') }}</span>
                </div> -->
            </div>
            <!--begin col-md-12 -->
            <div class="text-center col-md-12 padding-bottom-40">
                
            </div>
            <!--end col-md-12 -->
            <!--begin col-md-4-->
            @foreach ($plans as $index => $plan)
            <div class="col-md-4">
            <div class="price-box {{$plan->id == 2 ? 'featured-box' : ''}}">
                @if (in_array($index, [1,4]))
                    <div class="ribbon blue"><span>{{ __('Feature') }}</span></div> 
                @endif
                    <ul class="pricing-list">

                        <li class="price-title">{{$plan->name}}</li>

                    <li class="price-value">${{round($plan->price,0)}}</li>
                        @if ($show == 'month')
                        <li class="price-subtitle">{{ __('Per Month') }}</li>
                        @else
                        <li class="price-subtitle">{{ __('Per Year') }}</li>
                        @endif

                        <!-- <li class="price-text"><i class="fas fa-check blue"></i>Track Stores</li> -->

                        <li class="price-text"><i class="fas fa-check blue"></i><b>Track {{$plan->store_access_count}} Stores</b></li>
                        @if ($plan->price = 0)
                          <li class="price-text"><i class="fas fa-check blue"></i><b>Track {{$plan->product_access_count}} Products</b></li>
                        @endif
                        <li class="price-text"><i class="fas fa-check blue"></i><b> Change Store Any Time</b></li>

                        <li class="price-text"><i class="fas fa-check blue"></i><b> Track Products</b></li>

                        <li class="price-text"><i class="fas fa-check blue"></i><b>1000 Products Per 1 Store</b></li>

                        <li class="price-text"><i class="fas fa-check blue"></i>Every Minute</li>

                        <li class="price-tag-line"><a href="{{ route('subscriptions',['plan' => $plan->slug]) }}">{{ __('Start Free Trial') }}</a></li>

                    </ul>

                </div>

            </div>
            @endforeach

        </div>
        <!--end row -->

    </div>
    <!--end container -->

</section> -->


<!-- version 2 -->

  <!--pricing section start-->
  <section class="pricing-section pt-60 pb-120  position-relative z-2" id="pricing">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="section-heading text-center">
                            <h4 class="h5 text-primary">Pricing</h4>
                            <h2>{{ __('Find the right plan for your business') }}</h2>
                            <!-- <p>Conveniently mesh cooperative services via magnetic outsourcing. Dynamically grow value whereas accurate e-commerce vectors. </p> -->
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-3">
                        <div class="media d-flex align-items-center py-2 p-sm-2">
                            <div class="icon-box mb-0 bg-primary-soft rounded-circle d-block me-3">
                                <i class="fas fa-credit-card text-primary"></i>
                            </div>
                            <div class="media-body fw-medium h6 mb-0">
                                No credit card required
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="media d-flex align-items-center py-2 p-sm-2">
                            <div class="icon-box mb-0 bg-success-soft rounded-circle d-block me-3">
                                <i class="fas fa-calendar-check text-success"></i>
                            </div>
                            <div class="media-body fw-medium h6 mb-0">
                                Get 7 day free trial
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="media d-flex align-items-center py-2 p-sm-2">
                            <div class="icon-box mb-0 bg-danger-soft rounded-circle d-block me-3">
                                <i class="fas fa-calendar-times text-danger"></i>
                            </div>
                            <div class="media-body fw-medium h6 mb-0">
                                Cancel anytime
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                @foreach ($plans as $index => $plan)

                    <div class="col-lg-4 col-md-6">
                        <div class="position-relative single-pricing-wrap rounded-custom {{$plan->id == 11 ? 'bg-gradient text-white p-5 mb-4 mb-lg-0' : 'bg-white custom-shadow p-5 mb-4 mb-lg-0'}}">
                            <div class="pricing-header mb-32">
                                <h3 class="package-name text-primary d-block">{{$plan->name}}</h3>
                                <h4 class="display-6 fw-semi-bold">${{round($plan->price,0)}}<span>/month</span></h4>
                            </div>
                            <div class="pricing-info mb-4">
                                <ul class="pricing-feature-list list-unstyled">
                                    <li><i class="fas fa-circle fa-2xs text-warning me-2"></i> Track {{$plan->store_access_count}} Stores</li>

                                    <li><i class="fas fa-circle fa-2xs text-warning me-2"></i> Change Store Any Time</li>
                                    <li><i class="fas fa-circle fa-2xs text-warning me-2"></i> Track Products</li>
                                    <li><i class="fas fa-circle fa-2xs text-warning me-2"></i> 1000 Products Per 1 Store</li>
                                    <li><i class="fas fa-circle fa-2xs text-warning me-2"></i> Every Minute</li>
                                </ul>
                            </div>
                            <a href="{{ route('subscriptions',['plan' => $plan->slug]) }}" class="btn btn-outline-primary mt-2">{{ __('Start Free Trial') }}</a>

                            <!--pattern start-->
                            <div class="dot-shape-bg position-absolute z--1 left--40 bottom--40">
                                <img src="assets/img/shape/dot-big-square.svg" alt="shape">
                            </div>
                            <!--pattern end-->
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </section> <!--pricing section end-->
<!--end pricing section -->
@push('styles')
<link href="{{ asset('saas/home/css/style.css')}}" rel="stylesheet">
    <style>
.switch {
  font-size: 1rem;
  position: relative;
}
.switch input {
  position: absolute;
  height: 1px;
  width: 1px;
  background: none;
  border: 0;
  clip: rect(0 0 0 0);
  clip-path: inset(50%);
  overflow: hidden;
  padding: 0;
}
.switch input + label {
  position: relative;
  min-width: calc(calc(2.375rem * .8) * 2);
  border-radius: calc(2.375rem * .8);
  height: calc(2.375rem * .8);
  line-height: calc(2.375rem * .8);
  display: inline-block;
  cursor: pointer;
  outline: none;
  user-select: none;
  vertical-align: middle;
  text-indent: calc(calc(calc(2.375rem * .8) * 2) + .5rem);
}
.switch input + label::before,
.switch input + label::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: calc(calc(2.375rem * .8) * 2);
  bottom: 0;
  display: block;
}
.switch input + label::before {
  right: 0;
  background-color: #dee2e6;
  border-radius: calc(2.375rem * .8);
  transition: 0.2s all;
}
.switch input + label::after {
  top: 2px;
  left: 2px;
  width: calc(calc(2.375rem * .8) - calc(2px * 2));
  height: calc(calc(2.375rem * .8) - calc(2px * 2));
  border-radius: 50%;
  background-color: white;
  transition: 0.2s all;
}
.switch input:checked + label::before {
  background-color: #08d;
}
.switch input:checked + label::after {
  margin-left: calc(2.375rem * .8);
}
.switch input:focus + label::before {
  outline: none;
  box-shadow: 0 0 0 0.2rem rgba(0, 136, 221, 0.25);
}
.switch input:disabled + label {
  color: #868e96;
  cursor: not-allowed;
}
.switch input:disabled + label::before {
  background-color: #e9ecef;
}
.switch.switch-sm {
  font-size: 0.875rem;
}
.switch.switch-sm input + label {
  min-width: calc(calc(1.9375rem * .8) * 2);
  height: calc(1.9375rem * .8);
  line-height: calc(1.9375rem * .8);
  text-indent: calc(calc(calc(1.9375rem * .8) * 2) + .5rem);
}
.switch.switch-sm input + label::before {
  width: calc(calc(1.9375rem * .8) * 2);
}
.switch.switch-sm input + label::after {
  width: calc(calc(1.9375rem * .8) - calc(2px * 2));
  height: calc(calc(1.9375rem * .8) - calc(2px * 2));
}
.switch.switch-sm input:checked + label::after {
  margin-left: calc(1.9375rem * .8);
}
.switch.switch-lg {
  font-size: 1.25rem;
}
.switch.switch-lg input + label {
  min-width: calc(calc(3rem * .8) * 2);
  height: calc(3rem * .8);
  line-height: calc(3rem * .8);
  text-indent: calc(calc(calc(3rem * .8) * 2) + .5rem);
}
.switch.switch-lg input + label::before {
  width: calc(calc(3rem * .8) * 2);
}
.switch.switch-lg input + label::after {
  width: calc(calc(3rem * .8) - calc(2px * 2));
  height: calc(calc(3rem * .8) - calc(2px * 2));
}
.switch.switch-lg input:checked + label::after {
  margin-left: calc(3rem * .8);
}
.switch + .switch {
  margin-left: 1rem;
}

.pricing{
    width: 100%;
    margin: 0 auto;
    overflow: hidden;
    padding: 10px 0;
    align-items: center;
    justify-content: space-around;
    display: flex;
    float: none;
}
.card-body {
    padding: 0px 15px;
    border-top: none;
}
    </style>
@endpush
