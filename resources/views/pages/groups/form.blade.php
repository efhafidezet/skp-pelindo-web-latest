

<div class="form-group row">
    <label for="inputName" class="col-sm-3 col-form-label">Nama Parameter1</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="inputName" placeholder="Nama Parameter" name="name" value="{{ old('name') }}"/>
        @error('name')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="inputOrder" class="col-sm-3 col-form-label">Order</label>
    <div class="col-sm-9">
        <input type="number" class="form-control" id="inputOrder" placeholder="Order" name="order" value="{{ old('order') }}"/>
        @error('order')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>