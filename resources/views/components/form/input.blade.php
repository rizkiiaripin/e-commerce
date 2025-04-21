@props([
    'name' => 'input',
    'label' => 'Input',
    'placeholder' => 'Enter text here',
    'type' => '',
    'value' => '',
    'required' => '',
    'id' => ''
])

{{-- Input field component --}}
<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
        value="{{ old($name,$value) }}" placeholder="please enter {{ $placeholder }}..." {{ $required }}>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>