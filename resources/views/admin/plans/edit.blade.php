@extends('layouts.admin')

@section('title', '| Plans')

@section('content')
<div class="u-body">
    <div class="card">
        <div class="card-header">
            <strong>{{ __('Update Plan') }}</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.plans.update', $plan->id) }}" method="POST" class="form-horizontal offset-sm-2">
                    {!! csrf_field() !!}
                    @method('PUT')
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name">Plan name</label>
                    <div class="col-md-6">
                        <input type="text" id="name" name="name" class="form-control" value="{{ $plan->title }}"
                            placeholder="Enter Plan name..">

                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name">{{ __('Plan Price') }}</label>
                    <div class="col-md-6">
                        <input type="text" id="price" name="price" class="form-control"
                            value="{{ $plan->price }}">

                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name">Plan Trial</label>
                    <div class="col-md-6">
                        <input type="text" id="trial" name="trial" class="form-control"
                            value="{{ $plan->trial_period_days }}">

                            @if ($errors->has('trial'))
                                <span class="text-danger">{{ $errors->first('trial') }}</span>
                            @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name">{{ __('Plan interval') }}</label>
                    <div class="col-md-6">
                        <select id="interval" type="" class="form-control" name="interval">
                            <option value="">{{ __('Select interval') }}</option>
                            <option value="day" {{ $plan->interval == 'day' ? 'selected' : '' }}>Daily</option>
                            <option value="week" {{ $plan->interval == 'week' ? 'selected' : '' }}>Weekly</option>
                            <option value="month" {{ $plan->interval == 'month' ? 'selected' : '' }}>Monthly</option>
                            <option value="year" {{ $plan->interval == 'year' ? 'selected' : '' }}>Yearly</option>
                        </select>

                        @if ($errors->has('interval'))
                            <span class="text-danger">{{ $errors->first('interval') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name">{{ __('Teams Plan') }}</label>
                    <div class="col-md-6">
                        <div class="row">
                        <div class="col-md-3">
                            <label class="switch switch-text switch-pill switch-primary">
                                <input type="checkbox" name="checkbox" id="checkbox" class="switch-input" {{ $plan->teams_enabled == 1 ? 'checked' : '' }}>
                                <span class="switch-label" data-on="On" data-off="Off"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" id="teams_limit" name="teams_limit" class="form-control"
                            placeholder="Number of member allow for this Plan"
                            value="{{ $plan->teams_limit }}">
                            @if ($errors->has('teams_limit'))
                                <span class="text-danger">{{ $errors->first('teams_limit') }}</span>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name">{{ __('Number of Store Access') }}</label>
                    <div class="col-md-6">
                        <input type="number" id="store_access_count" name="store_access_count" class="form-control"
                            value="{{ $plan->store_access_count }}">

                            @if ($errors->has('store_access_count'))
                                <span class="text-danger">{{ $errors->first('store_access_count') }}</span>
                            @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name">{{ __('Number of Product Access') }}</label>
                    <div class="col-md-6">
                        <input type="number" id="product_access_count" name="product_access_count" class="form-control"
                            value="{{ $plan->product_access_count }}">

                            @if ($errors->has('product_access_count'))
                                <span class="text-danger">{{ $errors->first('product_access_count') }}</span>
                            @endif
                    </div>
                </div>
                
                <hr>
                <button type="submit" class="btn btn-secondary"><i class="fa fa-dot-circle-o"></i> {{ __('Edit plan') }}</button>
                <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> {{ __('Reset') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection