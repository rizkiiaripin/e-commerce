<div class="mb-3">
    <label class="form-label mb-1">{{ $lable }}</label>
    <select class="form-control select2" name="role" id="select-category" style="width: 100%;" required>
        <option value="">Select</option>
        @foreach ($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
        @endforeach
    </select>
    @error('role')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>