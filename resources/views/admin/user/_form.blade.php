<h3>Listado de roles</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($roles as $role)
            <li>
                <div class="form-check form-check-success">
                    <label class="form-check-label">
                        {!! Form::checkbox('roles[]', $role->id, null) !!}
                        {{$role->name}}
                    </label>
                </div>
            </li>
        @endforeach
    </ul>
</div>