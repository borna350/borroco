<div class="card">
    <div class="header">
        <h2>Category Home Feature Info</h2>
        <ul class="header-dropdown">
            <li class="remove">
                <div class="checkbox">
                    <input id="show_home_products" type="checkbox" value="1" {{ isset($data) && $data->show_home_products == 1 ? 'checked':'' }} name="show_home_products">
                    <label for="show_home_products">
                        Show Home Products
                    </label>
                </div>
            </li>
        </ul>
    </div>

    <div class="body shippingReturns" style="{{ isset($data) && $data->show_home_products ? '':'display:none' }}">
        <div class="mb-3">
            <label for="feature_title">Feature Title<span class="text-danger">*</span></label>
            <div class="form-group">
                <input type="text" id="feature_title" name="feature_title" value="{{ old('feature_title', isset($data->feature_title) ? $data->feature_title:'') }}" class="form-control shippingInputs @error('feature_title') is-invalid @enderror" placeholder="Feature title">
                @error('feature_title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="feature_subtitle">Feature Subtitle<span class="text-danger">*</span></label>
            <div class="form-group">
                <input type="text" id="feature_subtitle" name="feature_subtitle" value="{{ old('feature_subtitle', isset($data->feature_subtitle) ? $data->feature_subtitle:'') }}" class="form-control shippingInputs @error('feature_subtitle') is-invalid @enderror" placeholder="Feature Subtitle">
                @error('feature_subtitle')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="feature_image">Feature Image<span class="text-danger"> [770x960] *</span></label>
            <div class="form-group">
                <input type="file" id="feature_image" name="feature_image" class="form-control shippingInputs  @error('feature_image') is-invalid @enderror" accept="image/*">
                @error('feature_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                @if(!empty($data->feature_image))
                <br>
                <img src="{{ asset('media/subcategory/'. $data->feature_image) }}" alt="asdf" width="100">
                @endif
            </div>
        </div>


    </div>
</div>

@push('stack_js')
    <script>
        $(document).ready(function() {
            $("#show_home_products").click(function(event) {
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
