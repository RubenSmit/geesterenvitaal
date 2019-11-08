@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <main>
        <header style="background-image: url('img/blubel-ffmkD8dm7Zw-unsplash.jpg')">
            <div class="header-overlay">
                <h1 class="header-title">Geesteren Vitaal</h1>
                <p class="header-subtitle">Hier komt een mooie pakkende tekst</p>
                <a class="header-link" href="/">Meer over vitaal leven</a>
            </div>
        </header>
        <aside class="main-highlight">
            <div class="container">
                <div class="main-highlight-content">
                    <h2 class="main-highlight-title">Activiteit</h2>
                    <p class="main-highlight-subtitle">Curabitur et tempus lacus</p>
                </div>
                <p class="main-highlight-content">dinsdag 12 september<br>erve holtkamp</p>
                <a class="main-highlight-link" href="/">Lees meer</a>
            </div>
        </aside>
        <div class="container">
            <div class="main-colums">
                <aside class="main-column">
                    <h2 class="aside-title">Activiteiten</h2>
                    <p class="aside-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non elit non
                        dolor efficitur porta. Curabitur et tempus lacus. Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Quisque lorem lacus, feugiat at tellus ac, eleifend sodales tortor. Sed quis risus nisl.
                        Suspendisse justo odio, maximus nec lobortis ut, vehicula ac arcu. Aliquam erat volutpat. Nullam
                        facilisis enim a nibh placerat, vel mattis odio congue. Ut consequat mi nec arcu imperdiet gravida.
                        Nam dapibus maximus eleifend. </p>
                </aside>
                <aside class="main-column">
                    <h2 class="aside-title">Spaaracties</h2>
                    <p class="aside-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non elit non
                        dolor efficitur porta. Curabitur et tempus lacus. Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Quisque lorem lacus, feugiat at tellus ac, eleifend sodales tortor. Sed quis risus nisl.
                        Suspendisse justo odio, maximus nec lobortis ut, vehicula ac arcu. Aliquam erat volutpat. Nullam
                        facilisis enim a nibh placerat, vel mattis odio congue. Ut consequat mi nec arcu imperdiet gravida.
                        Nam dapibus maximus eleifend. </p>
                </aside>
                <aside class="main-column">
                    <h2 class="aside-title">Nieuws</h2>
                    <p class="aside-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non elit non
                        dolor efficitur porta. Curabitur et tempus lacus. Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Quisque lorem lacus, feugiat at tellus ac, eleifend sodales tortor. Sed quis risus nisl.
                        Suspendisse justo odio, maximus nec lobortis ut, vehicula ac arcu. Aliquam erat volutpat. Nullam
                        facilisis enim a nibh placerat, vel mattis odio congue. Ut consequat mi nec arcu imperdiet gravida.
                        Nam dapibus maximus eleifend. </p>
                </aside>
            </div>
        </div>
    </main>
@endsection
