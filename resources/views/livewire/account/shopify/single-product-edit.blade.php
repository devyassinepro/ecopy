<div>
    <form wire:submit.prevent="importsingleproduct">
        @csrf
        <div class="row g-3 align-center">
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="form-label" for="url-single-product">Product URL</label>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input type="text" id="url-single-product" wire:model="urlsingle" class="form-control" placeholder="URL Product">
                        <div>@error('urlsingle') {{ $message }} @enderror</div>
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

    @if($product)
        <div class="product-details mt-4">
            <form wire:submit.prevent="updateProduct">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" wire:model="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="descriptionHtml">Description</label>
                    <textarea class="form-control" id="summernote" wire:model="body_html"></textarea>
                </div>
                <div class="form-group">
                    <label for="vendor">Vendor</label>
                    <input type="text" id="vendor" wire:model="vendor" class="form-control">
                </div>
                <div class="form-group">
                    <label for="productType">Product Type</label>
                    <input type="text" id="product_type" wire:model="product_type" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary" wire:loading.remove>Update Product</button>
                    <button class="btn btn-lg btn-primary" type="button" disabled wire:loading.delay>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span>Updating...</span>
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>


