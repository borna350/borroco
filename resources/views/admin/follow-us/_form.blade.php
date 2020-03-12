<div class="mb-3">
    <label for="social_media_name">Social Media Name <span class="text-danger">*</span></label>
    <div class="form-group">
        <input type="text" id="social_media_name" name="social_media_name" value="{{ old('social_media_name', isset($data->social_media_name) ? $data->social_media_name:'') }}" class="form-control @error('social_media_name') is-invalid @enderror" placeholder="Social media name">
        @error('social_media_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="social_media_link">Social Media Link</label>
    <div class="form-group">
        <textarea  id="social_media_link" name="social_media_link" class="form-control @error('social_media_link') is-invalid @enderror" placeholder="Category social_media_link">{{ old('social_media_link', isset($data->social_media_link) ? $data->social_media_link:'') }}</textarea>
        @error('Social_media_link')
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
