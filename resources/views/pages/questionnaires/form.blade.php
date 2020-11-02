

<div class="form-group row">
    <label for="inputName" class="col-sm-3 col-form-label">Nama Kuesioner</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="inputName" placeholder="Nama Kuesioner" name="name" value="{{ old('name') }}"/>
        @error('name')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="inputStartDate" class="col-sm-3 col-form-label">Tanggal Mulai</label>
    <div class="col-sm-9">
        <input type="date" class="form-control" id="inputStartDate" placeholder="Tanggal Mulai" name="start_date" value="{{ old('start_date') }}"/>
        @error('start_date')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="inputEndDate" class="col-sm-3 col-form-label">Tanggal Selesai</label>
    <div class="col-sm-9">
        <input type="date" class="form-control" id="inputEndDate" placeholder="Tanggal Selesai" name="end_date" value="{{ old('end_date') }}"/>
        @error('end_date')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="inputDetails" class="col-sm-3 col-form-label">Keterangan</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="inputDetails" placeholder="Keterangan" name="details" value="{{ old('details') }}"/>
        @error('details')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>