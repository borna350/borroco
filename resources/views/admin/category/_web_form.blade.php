<div class="card">
    <div class="header">
        <h2>Website Category Page Info</h2>
        <ul class="header-dropdown">
            <li class="remove">
                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
            </li>
        </ul>
    </div>
    <div class="body">

        <div class="mb-3">
            <label for="site_title">Website Title</label>
            <div class="form-group">
                <input type="text" id="site_title" name="site_title" value="{{ old('site_title', isset($data->site_title) ? $data->site_title:'') }}" class="form-control @error('site_title') is-invalid @enderror" placeholder="Website Title">
                @error('site_title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="site_subtitle">Website Subtitle</label>
            <div class="form-group">
                <textarea  id="site_subtitle" name="site_subtitle" class="form-control @error('site_subtitle') is-invalid @enderror" placeholder="Website subtitle">{{ old('site_subtitle', isset($data->site_subtitle) ? $data->site_subtitle:'') }}</textarea>
                @error('site_subtitle')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="video_link">Website Video Link</label>
            <div class="form-group">
                <input  id="video_link" name="video_link" class="form-control @error('video_link') is-invalid @enderror" placeholder="Website subtitle" value="{{ old('video_link', isset($data->video_link) ? $data->video_link:'') }}">
                @error('video_link')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label>Website cover Image <small class="text-danger">[Size: (1450x450)]</small></label>
            <div class="form-group">
                <input type="file" id="cover_image" name="cover_image" accept="image/*" class="form-control @error('cover_image') is-invalid @enderror" >
                @error('cover_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                @if(!empty($data->cover_image))
                    <br>
                    <img class="img-fluid img-thumbnail" src="{{ asset('media/category/'. $data->cover_image) }}" width="200">
                @endif
            </div>
        </div>
    </div>
</div>

