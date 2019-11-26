@csrf
@component('components.form.select', [
    'name' => 'challenge_category_id',
    'label' => 'Categorie',
    'model' => $challenge,
    'items' => $categories,
    'item_key' => 'id',
    'item_value' => 'name',
])@endcomponent
@component('components.form.input', [
    'name' => 'title',
    'label' => 'Titel',
    'placeholder' => 'Titel van de actie',
    'model' => $challenge,
])@endcomponent
@component('components.form.textarea', [
    'name' => 'subtitle',
    'label' => 'Ondertitel',
    'placeholder' => 'Ondertitel',
    'model' => $challenge,
])@endcomponent

@component('components.form.input', [
    'name' => 'image',
    'label' => 'Afbeelding',
    'placeholder' => 'Afbeelding van de uitdaging',
    'model' => $challenge,
    'type' => 'file',
])@endcomponent

@component('components.form.textarea', [
    'name' => 'content',
    'label' => 'Inhoud',
    'placeholder' => 'Inhoud van de actie',
    'model' => $challenge,
])@endcomponent

@component('components.form.datetime', [
    'name' => 'start_time',
    'label' => 'Start tijd',
    'model' => $challenge,
])@endcomponent
@component('components.form.datetime', [
    'name' => 'end_time',
    'label' => 'Eind tijd',
    'model' => $challenge,
])@endcomponent
@component('components.form.input', [
    'name' => 'location_name',
    'label' => 'Locatie naam',
    'placeholder' => 'Naam van locatie',
    'model' => $challenge,
])@endcomponent
@component('components.form.input', [
    'name' => 'location_address',
    'label' => 'Locatie adres',
    'placeholder' => 'Adres van de locatie',
    'model' => $challenge,
])@endcomponent
@component('components.form.input', [
    'name' => 'registration_url',
    'label' => 'Registratie URL',
    'placeholder' => 'URL om je te registreren',
    'model' => $challenge,
])@endcomponent

@component('components.form.input', [
    'name' => 'latitude',
    'label' => 'Breedtegraad',
    'placeholder' => 'Breedtegraad',
    'model' => $challenge,
])@endcomponent

@component('components.form.input', [
    'name' => 'longitude',
    'label' => 'Lengtegraad',
    'placeholder' => 'Lengtegraad',
    'model' => $challenge,
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
