<div class="mb-3">
    <label for="role">Select Role<span class="text-danger">*</span></label>
    <select class="form-control show-tick @error('role') is-invalid @enderror" name="role">
        <option value="">-- Please select --</option>
        <option value="super_admin" {{ isset($data->role) && $data->role == 'super_admin' ? 'selected':'' }}>Super Admin</option>
        <option value="admin" {{ isset($data->role) && $data->role == 'admin' ? 'selected':'' }}>Admin (Manager)</option>
        <option value="craftsman" {{ isset($data->role) && $data->role == 'craftsman' ? 'selected':'' }}>Craftsman</option>
    </select>
    @error('role')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="name">Name<span class="text-danger">*</span></label>
    <div class="form-group">
        <input type="text" id="name" name="name" value="{{ old('name', isset($data->name) ? $data->name:'') }}" class="form-control @error('name') is-invalid @enderror" placeholder=" Name">
        @error('name')
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
    <label>Image <small class="text-danger">[Craftsman: (760x876)  &  Admin: (300x300)]</small></label>
    <div class="form-group">
        <input type="file" id="avatar" name="avatar" accept="image/*" class="form-control @error('avatar') is-invalid @enderror" >
        @error('avatar')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="status">Status</label>
    <div class="form-group">
        <div class="radio inlineblock m-r-20">
            <input type="radio" name="status" id="active" class="with-gap" value="active" {{ isset($data->status) && $data->status == 'active' ? 'checked':'' }}>
            <label for="active">Active</label>
        </div>
        <div class="radio inlineblock">
            <input type="radio" name="status" id="deactivated" class="with-gap" value="deactivated" {{ isset($data->deactivated) && $data->status == 'deactivated' ? 'checked':'' }}>
            <label for="deactivated">Deactivated</label>
        </div>
        @error('status')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
