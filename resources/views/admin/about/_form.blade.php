<div class="mb-3">
    <label>About Logo <small class="text-danger">[Size: (400x400)]</small></label>
    <div class="form-group">
        <input type="file" id="about_logo" name="about_logo" accept="about_logo/*" class="form-control @error('about_logo') is-invalid @enderror" >
        @error('about_logo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="about_description">About Description</label>
    <div class="form-group">
        <textarea  id="about_description" name="about_description" class="form-control @error('about_description') is-invalid @enderror" placeholder="About Description">{{ old('about_description', isset($data->about_description) ? $data->about_description:'') }}</textarea>
        @error('about_description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="based_in">Based In <span class="text-danger">*</span></label>
    <div class="form-group">
        <input type="text" id="based_in" name="based_in" value="{{ old('based_in', isset($data->based_in) ? $data->based_in:'') }}" class="form-control @error('based_in') is-invalid @enderror" placeholder="Based In">
        @error('based_in')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="founded">Founded <span class="text-danger">*</span></label>
    <div class="form-group">
        <input type="text" id="founded" name="founded" value="{{ old('founded', isset($data->founded) ? $data->founded:'') }}" class="form-control @error('founded') is-invalid @enderror" placeholder="Founded">
        @error('founded')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="mb-3">
    <label>About Banner Image <small class="text-danger">[Size: (1266x570)]</small></label>
    <div class="form-group">
        <input type="file" id="about_banner_image" name="about_banner_image" accept="about_banner_image/*" class="form-control @error('about_banner_image') is-invalid @enderror" >
        @error('about_banner_image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="banner_title">Banner Title <span class="text-danger">*</span></label>
    <div class="form-group">
        <input type="text" id="banner_title" name="banner_title" value="{{ old('banner_title', isset($data->banner_title) ? $data->banner_title:'') }}" class="form-control @error('banner_title') is-invalid @enderror" placeholder="Banner Title">
        @error('banner_title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="banner_description">Banner Description</label>
    <div class="form-group">
        <textarea  id="banner_description" name="banner_description" class="form-control @error('banner_description') is-invalid @enderror" placeholder="Banner Description">{{ old('banner_description', isset($data->banner_description) ? $data->banner_description:'') }}</textarea>
        @error('banner_description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="mb-3">
    <label for="address">Address</label>
    <div class="form-group">
        <input type="text" id="address" name="address" value="{{ old('address', isset($data->address) ? $data->address:'') }}" class="form-control @error('address') is-invalid @enderror" placeholder="Address">
        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="mb-3">
    <label for="email">Email<span class="text-danger">*</span></label>
    <div class="form-group">
        <input type="email" id="email" name="email" value="{{ old('email', isset($data->email) ? $data->email:'') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



