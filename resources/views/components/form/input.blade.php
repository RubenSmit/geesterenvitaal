<div class="form-item{{ $errors->has($name) ? ' has-error' : '' }}">
    @if (isset($label))
        <label for="{{ $name }}" class="form-item-label">{{ $label }}</label>
    @endif

    <input id="{{ $name }}"
           type="{{ isset($type) ? $type : 'text' }}"
           class="form-item-field"
           name="{{ $name }}"
           placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
           value="{{
                old($name) ?: (isset($model) ? $model->{$name} : '')
            }}"
        {{ isset($attributes) ? $attributes : '' }}>

    @if ($errors->has($name))
        <span class="form-item-help">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>
