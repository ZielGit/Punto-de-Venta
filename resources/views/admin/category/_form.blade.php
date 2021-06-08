<div class="form-group">
    <label for="">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Descripción</label>
    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>