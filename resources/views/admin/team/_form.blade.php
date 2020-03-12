<div class="mb-3">
    <label for="name">Team Name <span class="text-danger">*</span></label>
    <div class="form-group">
        <input type="text" id="name" name="name" value="{{ old('name', isset($data->name) ? $data->name:'') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Team name">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="designation">Designation <span class="text-danger">*</span></label>
    <div class="form-group">
        <input type="text" id="designation" name="designation" value="{{ old('designation', isset($data->designation) ? $data->designation:'') }}" class="form-control @error('designation') is-invalid @enderror" placeholder="Designation">
        @error('designation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label>Image <small class="text-danger">[Size: (400x400)]</small></label>
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
    <label for="about">About</label>
    <div class="form-group">
        <textarea  id="about" name="about" class="form-control @error('about') is-invalid @enderror" placeholder="Team about">{{ old('about', isset($data->about) ? $data->about:'') }}</textarea>
        @error('about')
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
