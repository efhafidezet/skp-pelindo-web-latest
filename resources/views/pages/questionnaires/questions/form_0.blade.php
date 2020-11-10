

<div class="form-group row">
    <label for="inputQuestion" class="col-sm-3 col-form-label">Pertanyaan</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="inputQuestion" placeholder="Pertanyaan" name="question" value="{{ old('question') }}"/>
        @error('question')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<input type="hidden" name="questionnaire_id" value="{{ $detailQ->questionnaire_id }}">
<input type="hidden" name="is_active" value="1">
<input type="hidden" class="form-control" id="inputName" placeholder="Nama Kuesioner" name="group_id" value="0"/>
{{-- <div class="form-group row">
    <label for="inputAnswer1" class="col-sm-3 col-form-label">Jawaban 1</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="inputAnswer1" placeholder="Jawaban 1" name="details" value="{{ old('answer1') }}"/>
        @error('details')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div> --}}

<button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>