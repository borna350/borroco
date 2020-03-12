<div class="mb-3">
    <label>Logo <small class="text-danger">[Size: (400x400)]</small></label>
    <div class="form-group">
        <input type="file" id="logo" name="logo" accept="logo/*" class="form-control @error('logo') is-invalid @enderror" >
        @error('logo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="title">Title <span class="text-danger">*</span></label>
    <div class="form-group">
        <input type="text" id="title" name="title" value="{{ old('title', isset($data->title) ? $data->title:'') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="subtitle">Subtitle <span class="text-danger">*</span></label>
    <div class="form-group">
        <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle', isset($data->subtitle) ? $data->subtitle:'') }}" class="form-control @error('subtitle') is-invalid @enderror" placeholder="Subtitle">
        @error('subtitle')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="mb-3">
    <label>Banner Image <small class="text-danger">[Size: (1440x800)]</small></label>
    <div class="form-group">
        <input type="file" id="banner_image" name="banner_image" accept="banner_image/*" class="form-control @error('banner_image') is-invalid @enderror" >
        @error('banner_image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
