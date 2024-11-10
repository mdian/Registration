@props(['name', 'label', 'options' => []])

<H6 class="mt-3">{{ $label }}</H6>

@foreach ($options as $key => $value)
    <div class="form-check form-check-inline">
        <input class="form-check-input @error('type') is-invalid @enderror" type="radio" name="{{ $name }}"
            value="{{ $value }}" id="flexRadioDefault2" {{ old($name) == $value ? 'checked' : '' }}>
        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <label class="form-check-label" for="flexRadioDefault2">
            {{ $value }}
        </label>
    </div>
@endforeach
