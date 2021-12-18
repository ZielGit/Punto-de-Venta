<div class="form-group">
    <label for="client_id">{{ __('Client') }}</label>
    <select class="form-control" name="client_id" id="client_id">
        @foreach ($clients as $client)
        <option value="{{$client->id}}">{{$client->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
  <label for="code">{{ __('Barcode') }}</label>
  <input type="text" name="code" id="code" class="form-control" value="{{old('code')}}">
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="product_id">{{ __('Product') }}</label>
            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
            <select class="form-control" name="product_id" id="product_id">
                <option value="" disabled selected>{{ __('Select a Product') }}</option>
                @foreach ($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
                {{-- <option value="" disabled selected>Selecccione un producto</option>
                @foreach ($products as $product)
                    <option value="{{$product->id}}_{{$product->stock}}_{{$product->sell_price}}">
                    {{$product->name}}</option>
                @endforeach --}}
            </select>
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label>{{ __('Current Stock') }}</label>
            <input type="text" id="stock" class="form-control" value="" disabled>
          </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label>{{ __('Sale Price') }}</label>
            <input type="number" class="form-control" name="price" id="price" disabled>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="quantity">{{ __('Amount') }}</label>
            <input type="number" class="form-control" name="quantity" id="quantity" value="{{old('quantity')}}">
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="tax">{{ __('Tax') }}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">%</span>
            </div>
            <input type="number" class="form-control" name="tax" id="tax" aria-describedby="basic-addon3" value="18">
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="discount">{{ __('Discount Rate') }}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2">%</span>
            </div>
            <input type="number" class="form-control" name="discount" id="discount" aria-describedby="basic-addon2" value="0">
        </div>
    </div>
</div>

<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">{{ __('Add product') }}</button>
</div>

<div class="form-group">
    <h4 class="card-title">{{ __('Sale Details') }}</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table">
            <thead>
                <tr>
                    <th>{{ __('Delete') }}</th>
                    <th>{{ __('Product') }}</th>
                    <th>{{ __('Sale Price') }} (PEN)</th>
                    <th>{{ __('Discount') }}</th>
                    <th>{{ __('Amount') }}</th>
                    <th>{{ __('SubTotal') }} (PEN)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="5">
                        <p align="right">{{ __('TOTAL') }}:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">PEN 0.00</span> </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">{{ __('TOTAL TAX') }} (18%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">PEN 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">{{ __('TOTAL PAY') }}:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">PEN 0.00</span> <input type="hidden" name="total" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>