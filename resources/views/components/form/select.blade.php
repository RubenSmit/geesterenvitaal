<div class="form-item{{ $errors->has($name) ? ' has-error' : '' }}">
    @if (isset($label))
        <label for="{{ $name }}" class="form-item-label">{{ $label }}</label>
    @endif

    <select
        name="{{ $name }}"
        {{ isset($attributes) ? $attributes : '' }}>
        @foreach ($items as $item)
            <option
                value="{{ $item->{$item_key} }}" {{old($name) ? (old($name) == $item->{$item_key} ? 'selected=selected' : '') : ( isset($model) ? ($model->{$name} == $item->{$item_key} ? 'selected=selected' : '') : '')}}>{{ $item->{$item_value} }}</option>
        @endforeach
    </select>

    @if ($errors->has($name))
        <span class="form-item-help" role="alert">
            {{ $errors->first($name) }}
        </span>
    @endif
</div>
