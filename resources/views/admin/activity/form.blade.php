@csrf
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
@component('components.form.textarea', [
    'name' => 'content',
    'label' => 'Inhoud',
    'placeholder' => 'Inhoud van de activiteit',
    'model' => $activity,
])@endcomponent

{{--TODO: DATETIME componenten maken voor firefox support--}}
@component('components.form.input', [
    'name' => 'start_time',
    'label' => 'Start tijd',
    'model' => $activity,
    'type' => 'datetime-local'
])@endcomponent
@component('components.form.input', [
    'name' => 'end_time',
    'label' => 'Eind tijd',
    'model' => $activity,
    'type' => 'datetime-local'
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
