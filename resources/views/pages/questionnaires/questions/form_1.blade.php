

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
<div class="form-group row">
    <label for="inputDetails" class="col-sm-3 col-form-label">Parameter</label>
    <div class="col-sm-9">
        <select class="form-control select2bs4" name="group_id" style="width: 100%;">
            @foreach ($listGroup as $val)
            @if ($val->group_id != 0)
            <option value="{{$val->group_id}}">{{$val->name}}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>

<button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>