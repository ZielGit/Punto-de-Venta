<div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" required>
            @error('name')
                <small>*{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
            @error('email')
                <small>*{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="number" class="form-control" name="dni" id="dni" aria-describedby="helpId" required>
            @error('dni')
                <small>*{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="ruc">RUC</label>
            <input type="number" class="form-control" name="ruc" id="ruc" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
            @error('ruc')
                <small>*{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="phone">Teléfono \ Celular</label>
            <input type="number" class="form-control" name="phone" id="phone" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
            @error('phone')
                <small>*{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
<div class="form-group">
    <label for="address">Dirección</label>
    <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId">
    <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
    @error('address')
        <small>*{{$message}}</small>
    @enderror
</div>