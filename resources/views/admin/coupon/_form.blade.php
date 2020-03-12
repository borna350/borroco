<div class="mb-3">
    <label for="user_id">Select User<span class="text-danger">*</span></label>
    <select class="form-control show-tick @error('user_id') is-invalid @enderror" name="user_id">
        <option value="">-- Please select --</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ isset($data->user_id) && $user->id == $data->user_id ? 'selected':'' }}>
                {{ $user->email }}
            </option>
        @endforeach
    </select>
    @error('user_id')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
    @enderror
</div>

<div class="mb-3">
    <label for="discount_price">Discount Price <span class="text-danger">*</span></label>
    <div class="form-group">
        <input type="text" id="discount_price" name="discount_price" value="{{ old('discount_price', isset($data->discount_price) ? $data->discount_price:'') }}" class="form-control @error('discount_price') is-invalid @enderror" placeholder="Social media name">
        @error('discount_price')
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


