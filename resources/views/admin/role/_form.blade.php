<h3>Lista de permisos</h3>
<div class="form-group">
 <ul class="list-unstyled">
     @foreach ($permissions as $permission)
        <li>
            <div class="form-check form-check-success">
                <label class="form-check-label">
                    {!! Form::checkbox('permissions[]', $permission->id, null) !!}
                    {{$permission->description}}
                </label>
            </div>
        </li>
     @endforeach
 </ul>
</div>

{{-- <h3>Permisos especiales</h3>
<div class="form-group">
    <label>{!! Form::radio('special', 'all-access') !!} Acceso total</label>
    <label>{!! Form::radio('special', 'no-access') !!} Ningún acceso</label>
</div> --}}

{{-- <h3>Lista de permisos</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($permissions as $permission)
            <li>
                <div class="form-check form-check-success">
                    <label class="form-check-label">
                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}" class="form-check-input">
                        {{$permission->description}}
                    </label>
                </div>
            </li>
        @endforeach
    </ul>
</div> --}}
