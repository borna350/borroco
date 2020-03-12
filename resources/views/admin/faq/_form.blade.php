<div class="mb-3">
    <label for="question">Question <span class="text-danger">*</span></label>
    <div class="form-group">
        <input type="text" id="question" name="question" value="{{ old('question', isset($data->question) ? $data->question:'') }}" class="form-control @error('question') is-invalid @enderror" placeholder="Question">
        @error('question')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="answer">Answer</label>
    <div class="form-group">
        <textarea  id="answer" name="answer" class="form-control @error('answer') is-invalid @enderror" placeholder="Answer">{{ old('answer', isset($data->answer) ? $data->answer:'') }}</textarea>
        @error('answer')
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
