<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="dni">{{ __('DNI') }}</label>
            <div class="input-group">
                <input type="number" class="form-control" name="dni" id="dni" value="{{ old('dni') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="Search">{{ __('Search') }}</button>
                </div>
            </div>
            @error('dni')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" value="{{ old('email') }}">
            <small id="helpId" class="form-text text-muted">{{ __('This is an optional field.') }}</small>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="ruc">{{ __('RUC') }}</label>
            <input type="number" class="form-control" name="ruc" id="ruc" aria-describedby="helpId" value="{{ old('ruc') }}">
            <small id="helpId" class="form-text text-muted">{{ __('This is an optional field.') }}</small>
            @error('ruc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId" value="{{ old('address') }}">
            <small id="helpId" class="form-text text-muted">{{ __('This is an optional field.') }}</small>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone">{{ __('Telephone / Mobile') }}</label>
            <input type="number" class="form-control" name="phone" id="phone" aria-describedby="helpId" value="{{ old('phone') }}">
            <small id="helpId" class="form-text text-muted">{{ __('This is an optional field.') }}</small>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>