Permit Number:<br>
<input type="text" name="permit_number" value="{{ old('permit_number', $permit->permit_number ?? '') }}"><br><br>

Request By:<br>
<input type="text" name="request_by" value="{{ old('request_by', $permit->request_by ?? '') }}"><br><br>

Section:<br>
<input type="text" name="section" value="{{ old('section', $permit->section ?? '') }}"><br><br>

Work Date:<br>
<input type="date" name="work_date" value="{{ old('work_date', $permit->work_date ?? '') }}"><br><br>

Description:<br>
<textarea name="description">{{ old('description', $permit->description ?? '') }}</textarea><br><br>

<br>
<button type="submit">Simpan</button>
<button type="button" onclick="window.location='{{ route('permits.index') }}'">
    Batal
</button>