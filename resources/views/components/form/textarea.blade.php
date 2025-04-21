@props([
    'name' => 'input',
    'label' => 'Input',
    'placeholder' => 'Enter text here',
    'type' => '',
    'required' => '',
    'id' => ''
])

{{-- Input field component --}}
<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <textarea type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="form-control @error($name) is-invalid @enderror"
        value="nsans" placeholder="please enter {{ $placeholder }}..." {{ $required }}>{{ old($name,$value) }}</textarea>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>