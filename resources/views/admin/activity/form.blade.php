@csrf

@component('components.form.select', [
    'name' => 'activity_category_id',
    'label' => 'Categorie',
    'model' => $activity,
    'items' => $categories,
    'item_key' => 'id',
    'item_value' => 'name',
])@endcomponent
@component('components.form.input', [
    'name' => 'title',
    'label' => 'Titel',
    'placeholder' => 'Titel van de activiteit',
    'model' => $activity,
])@endcomponent
@component('components.form.input', [
    'name' => 'subtitle',
    'label' => 'Ondertitel',
    'placeholder' => 'Ondertitel van de activiteit',
    'model' => $activity,
])@endcomponent
@component('components.form.input', [
    'name' => 'image',
    'label' => 'Afbeelding',
    'placeholder' => 'Afbeelding van de activiteit',
    'model' => $activity,
    'type' => 'file',
])@endcomponent
@component('components.form.textarea', [
    'name' => 'content',
    'label' => 'Inhoud',
    'placeholder' => 'Inhoud van de activiteit',
    'model' => $activity,
])@endcomponent

@component('components.form.datetime', [
    'name' => 'start_time',
    'label' => 'Start tijd',
    'model' => $activity
])@endcomponent
@component('components.form.datetime', [
    'name' => 'end_time',
    'label' => 'Eind tijd',
    'model' => $activity,
])@endcomponent

@component('components.form.input', [
    'name' => 'location_name',
    'label' => 'Locatie naam',
    'placeholder' => 'Naam van de locatie',
    'model' => $activity,
])@endcomponent
@component('components.form.input', [
    'name' => 'location_address',
    'label' => 'Locatie adres',
    'placeholder' => 'Adres van de locatie',
    'model' => $activity,
])@endcomponent
@component('components.form.input', [
    'name' => 'registration_url',
    'label' => 'Registratie url',
    'placeholder' => 'URL van het google registratie formulier',
    'model' => $activity,
    'type' => 'url',
])@endcomponent


@if (count($errors) > 0)
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
