@stack($name . '_input_start')

<akaunting-select
    class="{{ $col }} {{ isset($attributes['required']) ? 'required' : '' }}"
    :form-classes="[{'has-error': {{ isset($attributes['v-error']) ? $attributes['v-error'] : 'form.errors.get("' . $name . '")' }} }]"
    :title="'{{ $text }}'"
    :placeholder="'{{ trans('general.form.select.field', ['field' => $text]) }}'"
    :name="'{{ $name }}'"
    :options="{{ json_encode($values) }}"
    :value="{{ json_encode(old($name, $selected)) }}"
    :icon="'{{ $icon }}'"
    :multiple="true"
    @if (!empty($attributes['collapse']))
    :collapse="true"
    @endif
    @interface="{{ !empty($attributes['v-model']) ? $attributes['v-model'] . ' = $event' : (!empty($attributes['data-field'])  ? 'form.' . $attributes['data-field'] . '.' . $name . ' = $event' : 'form.' . $name . ' = $event') }}"
    @if (!empty($attributes['change']))
    @change="{{ $attributes['change'] }}($event)"
    @endif
    @if(isset($attributes['v-error-message']))
    :form-error="{{ $attributes['v-error-message'] }}"
    @else
    :form-error="form.errors.get('{{ $name }}')"
    :no-data-text="'{{ trans('general.no_data') }}'"
    :no-matching-data-text="'{{ trans('general.no_matching_data') }}'"
    @endif
></akaunting-select>

@stack($name . '_input_end')
