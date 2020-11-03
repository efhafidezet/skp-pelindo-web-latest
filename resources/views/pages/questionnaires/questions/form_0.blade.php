

<div class="form-group row">
    <label for="inputName" class="col-sm-3 col-form-label">Pertanyaan</label>
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
    <label for="inputAnswer1" class="col-sm-3 col-form-label">Jawaban 1</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="inputAnswer1" placeholder="Jawaban 1" name="details" value="{{ old('answer1') }}"/>
        @error('details')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>