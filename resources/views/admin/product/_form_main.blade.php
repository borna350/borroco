<div class="card">
    <div class="header">
        <h2>
            <a href="{{ route('product.index') }}" class="btn btn-raised btn-info btn-sm btn-round waves-effect -mt5">
                <i class="zmdi zmdi-arrow-back"></i> Back
            </a>
        </h2>
        <ul class="header-dropdown">
            <li class="remove">
                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
            </li>
        </ul>
    </div>

    <div class="body">

        <div class="mb-3">
            <label for="material_id">Select Material<span class="text-danger">*</span></label>
            <select class="form-control show-tick  @error('material_id') is-invalid @enderror"  name="material_id">
                <option value="">-- Please select --</option>
                @foreach($materials as $material)
                    <option value="{{ $material->id }}" {{ isset($data->material_id) && $material->id == $data->material_id ? 'selected':'' }}>
                        {{ $material->title }}
                    </option>
                @endforeach
            </select>
            @error('material_id')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id">Select Category<span class="text-danger">*</span></label>
            <select class="form-control show-tick  @error('category_id') is-invalid @enderror" id="getCategoryId" name="category_id">
                <option value="">-- Please select --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ isset($data->category_id) && $category->id == $data->category_id ? 'selected':'' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="subcategory_id">Select Subcategory<span class="text-danger">*</span></label>
            <select class="form-control subcategory show-tick @error('subcategory_id') is-invalid @enderror" name="subcategory_id">
                <option value="">-- Select Subcategory --</option>
                @if(!empty($subcategories->subcategories))
                    @foreach($subcategories->subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}" {{ isset($data->subcategory_id) && $subcategory->id == $data->subcategory_id ? 'selected':'' }}>
                            {{ $subcategory->title }}
                        </option>
                    @endforeach
                @endif
            </select>
            @error('subcategory_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name">Name<span class="text-danger">*</span></label>
            <div class="form-group">
                <input type="text" id="name" name="name" value="{{ old('name', isset($data->name) ? $data->name:'') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Product Short Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="code">Product Code<span class="text-danger">*</span></label>
            <div class="form-group">
                <input type="text" id="code" name="code" value="{{ old('code', isset($data->code) ? $data->code:'') }}" class="form-control @error('code') is-invalid @enderror" placeholder="Product code">
                @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="price">Product Price<span class="text-danger">*</span></label>
            <div class="form-group">
                <input type="number" step="0.01" min="0" id="price" name="price" value="{{ old('price', isset($data->price) ? $data->price:'') }}" class="form-control @error('price') is-invalid @enderror" placeholder="Product price">
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="discount_price">Product discount price</label>
            <div class="form-group">
                <input type="number" step="0.01" min="0" id="discount_price" name="discount_price" value="{{ old('discount_price', isset($data->price) ? $data->price:'') }}" class="form-control @error('discount_price') is-invalid @enderror" placeholder="Product discount price">
                @error('discount_price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="tax">Product tax</label>
            <div class="form-group">
                <input type="number" step="0.01" min="0" id="tax" name="tax" value="{{ old('tax', isset($data->tax) ? $data->tax:'') }}" class="form-control @error('tax') is-invalid @enderror" placeholder="Product tax">
                @error('tax')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="discount_prescriptions">Discount prescriptions</label>
            <div class="form-group">
                <input type="number"  min="0" max="99" id="discount_prescriptions" name="discount_prescriptions" value="{{ old('discount_prescriptions', isset($data->discount_prescriptions) ? $data->discount_prescriptions:'') }}" class="form-control @error('discount_prescriptions') is-invalid @enderror" placeholder="Discount prescriptions : 10%">
                @error('discount_prescriptions')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="mb-3">
            <label for="short_note">Product Short Note</label>
            <div class="form-group">
                <textarea  id="short_note" name="short_note" class="form-control  @error('short_note') is-invalid @enderror" placeholder="Product Short note">{{ old('short_note', isset($data->short_note) ? $data->short_note:'') }}</textarea>
                @error('short_note')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="description">Product Description <span class="text-danger">*</span></label>
            <div class="form-group">
                <textarea  id="description" name="description" class="form-control ckeditor1 @error('description') is-invalid @enderror" placeholder="Product Description">{{ old('description', isset($data->description) ? $data->description:'') }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="customer_production">Customer Production</label>
            <div class="form-group">
                <textarea  id="customer_production" name="customer_production" class="form-control ckeditor2 @error('customer_production') is-invalid @enderror" placeholder="Customer production">{{ old('customer_production', isset($data->customer_production) ? $data->customer_production:'') }}</textarea>
                @error('customer_production')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label>Home Thum Image 1 <small class="text-danger">[Size: (400x400)]*</small></label>
                    <div class="form-group">
                        <input type="file" id="thum_image_1" name="thum_image_1" accept="image/*" class="form-control @error('thum_image_1') is-invalid @enderror" >
                        @error('thum_image_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    @if(isset($data->thum_image_1))
                        <img src="{{ asset('media/product/thum/'. $data->thum_image_1) }}" width="80">
                    @endif
                </div>
                <div class="col-md-6">
                    <label>Home Thum Image 2 <small class="text-danger">[Size: (400x400)]</small></label>
                    <div class="form-group">
                        <input type="file" id="thum_image_2" name="thum_image_2" accept="image/*" class="form-control @error('thum_image_2') is-invalid @enderror" >
                        @error('thum_image_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    @if(isset($data->thum_image_2))
                        <img src="{{ asset('media/product/thum/'. $data->thum_image_2) }}" width="80">
                    @endif
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="in_stock">Product Stock No.<span class="text-danger">*</span></label>
            <div class="form-group">
                <input type="number"  min="0" id="in_stock" name="in_stock" value="{{ old('in_stock', isset($data->in_stock) ? $data->in_stock:'') }}" class="form-control @error('in_stock') is-invalid @enderror" placeholder="Stock Product no">
                @error('in_stock')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="">Product Status<span class="text-danger">*</span></label>
            <div class="form-group">
                <div class="radio inlineblock m-r-20">
                    <input type="radio" name="status" id="active" class="with-gap" value="active" {{ isset($data->status) && $data->status == 'active' ? 'checked':'' }}>
                    <label for="active">Active</label>
                </div>
                <div class="radio inlineblock">
                    <input type="radio" name="status" id="inactive" class="with-gap" value="inactive" {{ isset($data->status) && $data->status == 'inactive' ? 'checked':'' }}>
                    <label for="inactive">Inactive</label>
                </div>
                @error('status')
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#getCategoryId").on("change", function(){
            var id = this.value;
            getSubcategory(id);
        });
        function getSubcategory(id) {
            $.ajax({
                url:"{!! url('admin/cat-wise-subcat') !!}/" + id,
                type:'POST',
                data:{id:id},
                success: function(data){
                    $("select.subcategory").html(data);
                    $('select.subcategory').selectpicker('refresh');
                }
            });
        }

    </script>
@endpush
