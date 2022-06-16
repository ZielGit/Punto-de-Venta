<div class="form-group">
    <label for="name">{{ __('Name') }}</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Name') }}">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">{{ __('Description') }}</label>
    <textarea class="form-control" name="description" id="description" rows="3" aria-describedby="helpDescription">{{ old('description') }}</textarea>
    <small id="helpDescription" class="form-text text-muted">{{ __('This is an optional field.') }}</small>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>