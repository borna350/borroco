<div class="mb-3">
    <label for="craftsman_id">Select Role<span class="text-danger">*</span></label>
    <select class="form-control show-tick @error('craftsman_id') is-invalid @enderror" name="craftsman_id">
        <option value="">-- Please select --</option>
        @foreach($craftsman as $admin)
            <option value="{{ $admin->id }}" {{ isset($data->craftsman_id) && $admin->id == $data->craftsman_id ? 'selected':'' }}>
                {{ $admin->name }}
            </option>
        @endforeach
    </select>
    @error('craftsman_id')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
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
    <label for="subtitle">Subtitle</label>
    <div class="form-group">
        <textarea  id="subtitle" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" placeholder="Subtitle">{{ old('subtitle', isset($data->subtitle) ? $data->subtitle:'') }}</textarea>
        @error('subtitle')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label>Image <small class="text-danger">[Size: (800x800)]</small></label>
    <div class="form-group">
        <input type="file" id="image" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror" >
        @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="link">Link <span class="text-danger">*</span></label>
    <div class="form-group">
        <input type="text" id="link" name="link" value="{{ old('link', isset($data->link) ? $data->link:'') }}" class="form-control @error('link') is-invalid @enderror" placeholder="Link">
        @error('link')
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
