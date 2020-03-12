<div class="mb-3">
    <label for="title">Material Title <span class="text-danger">*</span></label>
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
    <label for="description">Material Description</label>
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
