<div class="card">
    <div class="header">
        <h2>Product Shipping returns</h2>
        <ul class="header-dropdown">
            <li class="remove">
                <div class="checkbox">
                    <input id="addShippingReturn" type="checkbox" value="1" {{ isset($data) && $data->ShippingReturn ? 'checked':'' }} name="check_shipping_return">
                    <label for="addShippingReturn">
                        Add Shipping Return
                    </label>
                </div>
            </li>
        </ul>
    </div>

    <div class="body shippingReturns" style="{{ isset($data) && $data->ShippingReturn ? '':'display:none' }}">
        <div class="mb-3">
            <label for="shipping_ue">Shipping UE<span class="text-danger">*</span></label>
            <div class="form-group">
                <input type="text" id="shipping_ue" name="shipping_ue" value="{{ old('shipping_ue', isset($data->ShippingReturn->shipping_ue) ? $data->ShippingReturn->shipping_ue:'') }}" class="form-control shippingInputs @error('shipping_ue') is-invalid @enderror" placeholder="Product Shipping UE">
                @error('shipping_ue')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="shipping_extra_ue">Shipping Extra UE</label>
            <div class="form-group">
                <input type="text" id="shipping_extra_ue" name="shipping_extra_ue" value="{{ old('shipping_extra_ue', isset($data->ShippingReturn->shipping_extra_ue) ? $data->ShippingReturn->shipping_extra_ue:'') }}" class="form-control shippingInputs @error('shipping_extra_ue') is-invalid @enderror" placeholder="Product Shipping extra ue">
                @error('shipping_extra_ue')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="delivery_time">Delivery Time<span class="text-danger">*</span></label>
            <div class="form-group">
                <input type="text" id="delivery_time" name="delivery_time" value="{{ old('delivery_time', isset($data->ShippingReturn->delivery_time) ? $data->ShippingReturn->delivery_time:'') }}" class="form-control shippingInputs @error('delivery_time') is-invalid @enderror" placeholder="Product Delivery Time">
                @error('delivery_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="return_policy">Return Policy<span class="text-danger">*</span></label>
            <div class="form-group">
                <textarea id="return_policy" name="return_policy" class="form-control ckeditor3 shippingInputs @error('return_policy') is-invalid @enderror" placeholder="Product Return Policy">{{ old('return_policy', isset($data->ShippingReturn->return_policy) ? $data->ShippingReturn->return_policy:'') }}</textarea>
                @error('return_policy')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
</div>

@push('stack_js')
    <script>
        $(document).ready(function() {
            $("#addShippingReturn").click(function(event) {
                if ($(this).is(":checked")){
                    $(".shippingReturns").show();
                } else{
                    $(".shippingReturns").hide();
                    $(".shippingInputs").val("");
                }
            });
        });
    </script>
@endpush
