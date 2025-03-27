<div class="mb-3">
    <label class="form-label text-capitalize">{{ $label ? $label : $name }}</label>
    <input type="text" name="{{ $name }}" class="form-control" placeholder="{{ $placeholder }}"
        value="{{ $value }}">
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
