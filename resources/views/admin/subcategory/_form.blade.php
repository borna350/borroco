
<div class="card">
    <div class="header">
        <h2>
            <a href="{{ route('subcategory.index') }}" class="btn btn-raised btn-info btn-sm btn-round waves-effect -mt5">
                <i class="zmdi zmdi-arrow-back"></i> Back
            </a>
        </h2>
        <ul class="header-dropdown">
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="javascript:void(0);">Action</a></li>
                    <li><a href="javascript:void(0);">Another action</a></li>
                    <li><a href="javascript:void(0);">Something else</a></li>
                </ul>
            </li>
            <li class="remove">
                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
            </li>
        </ul>
    </div>
    <div class="body">
        <div class="mb-3">
            <label for="category_id">Select Category<span class="text-danger">*</span></label>
            <select class="form-control show-tick @error('category_id') is-invalid @enderror" name="category_id">
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
            <label for="title">Subcategory Title <span class="text-danger">*</span></label>
            <div class="form-group">
                <input type="text" id="title" name="title" value="{{ old('title', isset($data->title) ? $data->title:'') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Category Title">
                @error('title')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="description">Subcategory Description</label>
            <div class="form-group">
                <textarea  id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Category Description">{{ old('description', isset($data->description) ? $data->description:'') }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label>Image <small class="text-danger">[Size: (600x600)]</small></label>
            <div class="form-group">
                <input type="file" id="image" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror" >
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                @if(!empty($data->image))
                    <br>
                    <img src="{{ asset('media/subcategory/'. $data->image) }}" alt="asdf" width="100">
                @endif
            </div>
        </div>

        <div class="mb-3">
            <label for="status">Subcategory Status<span class="text-danger">*</span></label>
            <div class="form-group">
                <div class="radio inlineblock m-r-20">
                    <input type="radio" name="status" id="active" class="with-gap" value="active" {{ isset($data->status) && $data->status == 'active' ? 'checked':'' }}>
                    <label for="active">Active</label>
                </div>
                <div class="radio inlineblock">
                    <input type="radio" name="status" id="inactive" class="with-gap" value="inactive" {{ isset($data->status) && $data->status == 'inactive' ? 'checked':'' }}>
                    <label for="inactive">Inactive</label>
                </div>
            </div>
        </div>

    </div>
</div>


