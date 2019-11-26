@csrf
@component('components.form.input', [
    'name' => 'name',
    'label' => 'Naam',
    'placeholder' => 'Naam van de categorie',
    'model' => $activity_category,
])@endcomponent
