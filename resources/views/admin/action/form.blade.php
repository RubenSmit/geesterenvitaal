@csrf

@component('components.form.select', [
    'name' => 'action_category_id',
    'label' => 'Categorie',
    'model' => $action,
    'items' => $categories,
    'item_key' => 'id',
    'item_value' => 'name',
])@endcomponent

@component('components.form.input', [
    'name' => 'title',
    'label' => 'Titel',
    'placeholder' => 'Titel van de actie',
    'model' => $action,
])@endcomponent

@component('components.form.input', [
    'name' => 'image',
    'label' => 'Afbeelding',
    'placeholder' => 'Afbeelding van de actie',
    'model' => $action,
    'type' => 'file',
])@endcomponent

@component('components.form.textarea', [
    'name' => 'content',
    'label' => 'Inhoud',
    'placeholder' => 'Inhoud van de actie',
    'model' => $action,
])@endcomponent

@component('components.form.datetime', [
    'name' => 'start_time',
    'label' => 'Start tijd',
    'model' => $action
])@endcomponent
@component('components.form.datetime', [
    'name' => 'end_time',
    'label' => 'Eind tijd',
    'model' => $action,
])@endcomponent

@component('components.form.input', [
    'name' => 'points_required',
    'label' => 'Benodigd aantal punten',
    'placeholder' => 'Benodigd aantal punten',
    'model' => $action,
])@endcomponent

@component('components.form.input', [
    'name' => 'old_price',
    'label' => 'Oude prijs',
    'placeholder' => 'Oude prijs',
    'model' => $action,
])@endcomponent

@component('components.form.input', [
    'name' => 'discount',
    'label' => 'Korting',
    'placeholder' => 'Korting',
    'model' => $action,
])@endcomponent

@component('components.form.input', [
    'name' => 'new_price',
    'label' => 'Nieuwe prijs',
    'placeholder' => 'Nieuwe prijs',
    'model' => $action,
])@endcomponent

@component('components.form.input', [
    'name' => 'samengezond_url',
    'label' => 'SamenGezond URL',
    'placeholder' => 'SamenGezond URL',
    'model' => $action,
])@endcomponent

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
