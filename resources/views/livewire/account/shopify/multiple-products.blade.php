<div>
    <form wire:submit.prevent="fetchProducts">
        @csrf
        <div class="row g-3 align-center">
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="form-label" for="url-store">Store URL</label>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input type="text" id="url-store" wire:model="url" class="form-control" placeholder="Url Store">
                        <div>@error('url') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-label"></label>
                    <div class="form-control-wrap">
                        <button type="submit" class="btn btn-lg btn-primary" wire:loading.remove>Import</button>
                        <button class="btn btn-lg btn-primary" type="button" disabled wire:loading.delay>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span>Loading...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div>
        @if($products)
            <div>
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title"></h3>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <div class="form-control-wrap">
                                                    <button wire:click="addSelectedProducts" class="btn btn-lg btn-primary" wire:loading.remove>Add Selected Products</button>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-control-wrap">
                                                    <button wire:click="selectAllProducts" class="btn btn-lg btn-primary" wire:loading.remove>Add All Products</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="nk-tb-list is-separate is-medium mb-3">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;">
                                <input type="checkbox" wire:model="selectedProducts" value="all">
                            </div>
                            <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span></span></div>
                            <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Name</span></div>
                            <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span>Price</span></div>        
                        </div>

                        @foreach($products as $product)
                            <div class="nk-tb-item">
                                <div class="nk-tb-col">
                                    <input type="checkbox" wire:model="selectedProducts" value="{{ $product->id }}">
                                </div>
                                <div class="nk-tb-col">
                                    @if(isset($product->images) && count($product->images) > 0)
                                        <img src="{{ $product->images[0]->src }}" alt="{{ $product->title }}" style="width: 100px; height: auto;">
                                    @else
                                        <img src="path/to/default-image.jpg" alt="No Image" style="width: 100px; height: auto;">
                                    @endif
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    <h6 style="font-size: 16px; font-weight: bold;">{{ $product->title }}</h6>
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    <h6 style="font-size: 16px; font-weight: bold;">$ {{ $product->variants[0]->price }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif
    </div>
</div>
