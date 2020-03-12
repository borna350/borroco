<div class="mb-3">
    <label for="shipping_text">Shipping Text</label>
    <div class="form-group">
        <textarea  id="shipping_text" name="shipping_text" class="form-control @error('shipping_text') is-invalid @enderror" placeholder="Shipping Text">{{ old('shipping_text', isset($data->shipping_text) ? $data->shipping_text:'') }}</textarea>
        @error('shipping_text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
    

<div class="mb-3">
    <label for="payments_text">Payments Text</label>
    <div class="form-group">
        <textarea  id="payments_text" name="payments_text" class="form-control @error('payments_text') is-invalid @enderror" placeholder="Payments Text">{{ old('payments_text', isset($data->payments_text) ? $data->payments_text:'') }}</textarea>
        @error('payments_text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="mb-3">
    <label for="returns_text">Returns Text</label>
    <div class="form-group">
        <textarea  id="returns_text" name="returns_text" class="form-control @error('returns_text') is-invalid @enderror" placeholder="Returns Text">{{ old('returns_text', isset($data->returns_text) ? $data->returns_text:'') }}</textarea>
        @error('returns_text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

    
<div class="mb-3">
    <label for="contacts_text">Contacts Text</label>
    <div class="form-group">
        <textarea  id="contacts_text" name="contacts_text" class="form-control @error('contacts_text') is-invalid @enderror" placeholder="contacts_text">{{ old('contacts_text', isset($data->contacts_text) ? $data->contacts_text:'') }}</textarea>
        @error('contacts_text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

        
<div class="mb-3">
    <label for="resi_text">Resi e Remborsi Text</label>
    <div class="form-group">
        <textarea  id="resi_text" name="resi_text" class="form-control @error('resi_text') is-invalid @enderror" placeholder="Resi e Remborsi Text">{{ old('resi_text', isset($data->resi_text) ? $data->resi_text:'') }}</textarea>
        @error('resi_text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

            
<div class="mb-3">
    <label for="company_text">Company Info</label>
    <div class="form-group">
        <textarea  id="company_text" name="company_text" class="form-control @error('company_text') is-invalid @enderror" placeholder="Company Info">{{ old('company_text', isset($data->company_text) ? $data->company_text:'') }}</textarea>
        @error('company_text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
                