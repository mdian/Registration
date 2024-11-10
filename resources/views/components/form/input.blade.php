@props(['name', 'label' => null, 'type' => 'text'])





@if ($label)
    <label for="{{ $name }}" class="form-label"> {{ $label }}</label>
@endif






<input type="{{ $type }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror "
    id="formGroupExampleInput" placeholder="Example input placeholder" value="{{ old($name) }}" autocomplete="on">
@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
