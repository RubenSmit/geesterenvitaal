@csrf
@component('components.form.input', [
    'name' => 'title',
    'label' => 'Titel',
    'placeholder' => 'Titel van de pagina',
    'model' => $page,
])@endcomponent
@component('components.form.input', [
    'name' => 'subtitle',
    'label' => 'Ondertitel',
    'placeholder' => 'Ondertitel van de pagina',
    'model' => $page,
])@endcomponent
@component('components.form.input', [
    'name' => 'image',
    'label' => 'Afbeelding',
    'placeholder' => 'Afbeelding van de pagina',
    'model' => $page,
    'type' => 'file',
])@endcomponent
@component('components.form.textarea', [
    'name' => 'content',
    'label' => 'Inhoud',
    'placeholder' => 'Inhoud van de pagina',
    'model' => $page,
])@endcomponent
