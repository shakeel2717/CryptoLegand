<div class="js-form-message form-group">
    <label class="input-label" for="{{ $name }}">{{ $placeholder }}</label>
    <input type="{{ $type }}" class="form-control form-control-lg" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value ?? "" }}" {{ $attribute ?? "" }}>
</div>