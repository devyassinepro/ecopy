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
                                                        <input type="text" id="url-single-product" wire:model="urlsingle" class="form-control" placeholder="Url Product">
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
</div>
