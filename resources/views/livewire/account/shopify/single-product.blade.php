<div>

    <!-- <form wire:submit.prevent="importsingleproduct">
        @csrf
        <div class="row g-3 align-center">
            <div class="col-lg-4">
                <div class="form-group">
                    <h2 class="form-label" for="url-single-product">Product URL</h2>
                </div>

            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input type="text" id="url-single-product" wire:model="urlsingle" class="form-control" placeholder="URL Product">
                        <div>@error('urlsingle') {{ $message }} @enderror</div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3">
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
    </form> -->
    <div class="row g-3 align-center">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
                <div class="form-group">
                <a href="#" class="btn btn-xl btn-primary" data-toggle="modal" data-target="#modalForm"><em class="icon ni ni-tag"></em>Import Single Product</a>
                </div>

            </div>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="modalForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supported Platforms</h5>
                    <span class="input-group-text">
                                <img src="assets/img/clients/shopify.png" alt="shopify" style="width: 100px; height: 30px;margin-right: 8px;">
                                <img src="assets/img/clients/amazon.png" alt="Logo 2" style="width: 100px; height: 30px;margin-right: 8px;">
                                <img src="assets/img/clients/etsy.png" alt="Logo 3" style="width: 100px; height: 30px;">
                         
                            </span>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                <form wire:submit.prevent="importsingleproduct">
                  @csrf
                        <div class="form-group">
                            <!-- <label class="form-label" for="full-name">Product Url</label> -->
                             <!-- Add your logo here (using an img tag or icon) -->
                       
                            <div class="form-control-wrap">
                                <input type="text" id="url-single-product" wire:model="urlsingle" class="form-control" placeholder="Product URL">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <ul class="custom-control-group g-3 align-center">
                                <li>
                                    <div class="custom-control custom-control-sm custom-checkbox">
                                    <input type="checkbox" wire:model="publish" class="custom-control-input" id="com-email">
                                        <label class="custom-control-label" for="com-email">Publish</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                       
                        <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary" wire:loading.remove>Import</button>
                        <button class="btn btn-lg btn-primary" type="button" disabled wire:loading.delay>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span>Loading...</span>
                        </button>
                        </div>
                    </form>
                </div>
      
            </div>
        </div>
    </div>

@push('scripts')
<script>
    console.log('Reloaded');

    document.addEventListener('livewire:load', function () {
        Livewire.on('close-modal', function () {
            $('#modalForm').modal('hide');
        });
    });
</script>
@endpush

</div>


