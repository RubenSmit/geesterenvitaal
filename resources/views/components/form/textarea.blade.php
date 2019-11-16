<div class="form-item{{ $errors->has($name) ? ' has-error' : '' }}">
    @if (isset($label))
        <label for="{{ $name }}" class="form-item-label">{{ $label }}</label>
    @endif

    <textarea id="{{ $name }}"
              class="form-item-field"
              name="{{ $name }}"
              placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
        {{ isset($attributes) ? $attributes : '' }}>{{ old($name) ?: (isset($model) ? $model->{$name} : '') }}</textarea>

    @if ($errors->has($name))
        <span class="form-item-help" role="alert">
            {{ $errors->first($name) }}
        </span>
    @endif
</div>
