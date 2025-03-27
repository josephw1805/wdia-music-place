<div class="mb-3">
    <div class="form-label">{{ $label }}</div>
    <label class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="{{ $name }}" @checked($checked) value="1">
    </label>
</div>