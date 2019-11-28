<div class="form-item{{ $errors->has($name) ? ' has-error' : '' }}">
    @if (isset($label))
        <label for="{{ $name }}" class="form-item-label">{{ $label }}</label>
    @endif

    <div class="form-item-holder">
        <input id="{{ $name }}_date"
               type="date"
               class="form-item-field form-item-narrow"
               name="{{ $name }}_date"
               value="{{
                old($name) ?: (isset($model) ? DateTime::createFromFormat('Y-m-d H:i:s', $model->{$name})->format('Y-m-d') : (new DateTime())->format('Y-m-d'))
            }}"
            {{ isset($attributes) ? $attributes : '' }}>
        <input id="{{ $name }}_time"
               type="time"
               class="form-item-field form-item-narrow"
               name="{{ $name }}_time"
               value="{{
                old($name) ?: (isset($model) ? DateTime::createFromFormat('Y-m-d H:i:s', $model->{$name})->format('H:i') : (new DateTime())->format('H:i'))
            }}"
            {{ isset($attributes) ? $attributes : '' }}>
    </div>
</div>
