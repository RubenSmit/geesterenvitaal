<?php

use Illuminate\Database\Seeder;
use App\User;
use App\ActionCategory;
use App\Action;
use App\Page;
use App\ActivityCategory;
use App\Activity;
use App\ChallengeCategory;
use App\Challenge;

class ProductionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password1234')
        ]);

        $electronics_category = factory(ActionCategory::class)->create([
            'name' => 'elektronica',
        ]);

        factory(Action::class)->create([
            'title' => 'Accu-schroefmachine',
            'content' => "Compacte Lithium-Ion accu-schroefmachine met micro USB-oplader. Ideaal om mee te werken in krappe ruimtes vanwege het compacte ontwerp!",
            'samengezond_url' => 'https://www.samengezond.nl/shop/accu-schroefmachine-2636ad/',
            'points_required' => 350,
            'old_price' => 44.96,
            'new_price' => 39.65,
            'action_category_id' => $electronics_category->id,
            'image_url' => 'seeds/ju3uldgz.bmp',
        ]);

        factory(Action::class)->create([
            'title' => 'JBL Bluetooth in-ear hoofdtelefoon ',
            'content' => "Ontdek de vrijheid van een draadloze manier van leven onderweg. Luister nu naar muziek, beheer je telefoontjes of ga sporten zonder dat je ooit verstrikt raakt.",
            'samengezond_url' => 'https://www.samengezond.nl/shop/jbl-bluetooth-hoofdtelefoon-jblt120twsht/',
            'points_required' => 240,
            'old_price' => 79.99,
            'new_price' => 76.35,
            'action_category_id' => $electronics_category->id,
            'image_url' => 'seeds/rh3kqn4e.bmp',
        ]);

        factory(Action::class)->create([
            'title' => 'JBL Charge',
            'content' => 'Draagbare luidspreker met krachtig geluid!',
            'samengezond_url' => 'https://www.samengezond.nl/shop/jbl-charge-4blk/',
            'points_required' => 610,
            'old_price' => 139,
            'new_price' => 136.55,
            'action_category_id' => $electronics_category->id,
            'image_url' => 'seeds/9qzf3f58.bmp',
        ]);

        $beauty_category = factory(ActionCategory::class)->create([
            'name' => 'mooi & gezond',
        ]);

        factory(Action::class)->create([
            'title' => 'Berghoff Messenblok \'Leo\'',
            'content' => 'Met een perfecte combinatie van modern design en praktische features is dit 6-delige messenblok een aanwinst in elke keuken.',
            'samengezond_url' => 'https://www.samengezond.nl/shop/berghoff-messenblok-leo/',
            'points_required' => 850,
            'old_price' => 84.95,
            'new_price' => 72.15,
            'action_category_id' => $beauty_category->id,
            'image_url' => 'seeds/akd9n202.bmp',
        ]);

        factory(Action::class)->create([
            'title' => 'Kortingsvoucher: Ekomenu',
            'content' => 'Jouw ideale leefstijl bereiken via 100% biologisch en niet duurder dan de wekelijkse boodschappen? Ekomenu biedt jou een persoonlijk leefstijl-menu aan.',
            'samengezond_url' => 'https://www.samengezond.nl/shop/ekomenu-korting/',
            'points_required' => 125,
            'old_price' => 0,
            'new_price' => 0,
            'action_category_id' => $beauty_category->id,
            'image_url' => 'seeds/vqv0m5qd.bmp',
        ]);

        $leasure_category = factory(ActionCategory::class)->create([
            'name' => 'vrije tijd',
        ]);

        factory(Action::class)->create([
            'title' => 'THULE Backpack \'Enroute\'',
            'content' => 'Een rugzak van 20L met stevige flapachtige opening en dubbele toegangspunten voor uw spullen.',
            'samengezond_url' => 'https://www.samengezond.nl/shop/thule-backpack-enroute/',
            'points_required' => 490,
            'old_price' => 54.99,
            'new_price' => 47.65,
            'action_category_id' => $leasure_category->id,
            'image_url' => 'seeds/q6u4bgbh.bmp',
        ]);

        factory(Action::class)->create([
            'title' => 'FC Twente - Vitesse',
            'content' => 'Voor de wedstrijd FC Twente - Vitesse biedt Menzis, als maatschappelijk partner van FC Twente, jou de kans om aanwezig te zijn bij deze voetbalwedstrijd.',
            'samengezond_url' => 'https://www.samengezond.nl/shop/fc-twente-vitesse-voetbal-kaarten/',
            'points_required' => 200,
            'old_price' => 0,
            'new_price' => 0,
            'action_category_id' => $leasure_category->id,
            'image_url' => 'seeds/z2d8c2ki.bmp',
        ]);

        factory(Page::class)->create([
            'nav_position' => 1,
            'title' => 'vitaal leven',
            'subtitle' => 'wat is dat nu eigenlijk?',
            'image_url' => 'seeds/patrick-schneider-HkNKkRoiGk8-unsplash.jpg',
            'content' => "Vitaliteit is een breed begrip. Om een duidelijk beeld te krijgen van wat vitaal leven inhoudt, is er onderscheid gemaakt in vier dimensies:
+ Hoofd: hierbij ligt de focus op de persoonlijke groei en ontwikkeling;
+ Hart: waarbij het gaat om het zelfbewustzijn en goede samenwerkingsrelaties;
+ Lichaam: waarbij het draait om de balans tussen inspanning en ontspanning;
+ Ziel: het gaat hierbij om het betekenisvol en nuttig (bezig) zijn.

Deze vier dimensies staan met elkaar in verbinding. Dit wil zeggen dat om vitaal te kunnen leven, je alle vier de dimensies zal moeten aanpakken.
Maar, waarom zouden wij vitaal gaan leven?
Vitaal leven beschrijft beknopt de balans tussen de mentale en de fysieke gezondheid. Een vitaal mens blijft langer gezond en geniet meer van het leven. Vanuit Geesteren Vitaal worden er verschillende activiteiten en uitdagingen aangeboden, die betrekking hebben bij één of meerdere dimensies die helpen om de mentale en fysieke gezondheid in balans te brengen.",
        ])->each(function ($homepage) {
            factory(Page::class)->create([
                'parent_id' => $homepage->id,
                'title' => 'muziek',
                'subtitle' => 'inspiratie voor de geest',
                'image_url' => 'seeds/wes-hicks-MEL-jJnm7RQ-unsplash.jpg',
                'content' => "Muziek onstpant en inspireert. Het zorgt voor de aanmaak van het gelukshormoon Oxytocine, en activeert hersengebieden die stress en pijn afremmen. Muziek komt binnen in de hersenstam, en daar zitten de meest vitale functies, namelijk de bloeddruk, ademhaling en hartregulatie.

Er zijn verschillende manieren om met muziek in aanraking te komen. Zingen, het bespelen van een instrument en het luisteren van muziek zijn allemaal verschillende manieren om met muziek bezig te zijn. Vanuit Geesteren vitaal vinden wij het belangrijk om niet alleen met bewegen bezig te zijn, maar juist ook de ontspanning op te zoeken. Dus aarzel niet en kom een keer een kijkje nemen bij de muziekvereniging in Geesteren. Wij hebben als Geesteren Vitaal muzieklijsten voor u beschikbaar met verschillende thema’s om u te motiveren, ontspannen en te ondersteunen tijdens het bewegen. Wij wensen u veel luisterplezier."
            ]);
            factory(Page::class)->create([
                'parent_id' => $homepage->id,
                'title' => 'mindfullness',
                'subtitle' => 'balans van je geest',
                'image_url' => 'seeds/kyson-dana-t3M5MzqVZAI-unsplash.jpg',
                'content' => "Vanuit Geesteren vitaal vinden wij het belangrijk dat er ook stil wordt gestaan bij de geest. Mindfullness is een van de methodes om hierbij stil te staan. Bij mindfullness sta je stil bij het hier en nu. Een gezonde geest in een gezond lichaam, dat is het doel. Met dagelijks een paar miniuten aan mindfulness, merk je al een positief effect op je gezondheid. Klik [hier](https://www.samengezond.nl/mindfulness-oefeningen/) voor columns en meer informatie."
            ]);
            factory(Page::class)->create([
                'parent_id' => $homepage->id,
                'title' => 'voeding',
                'subtitle' => 'begin bij de basis',
                'image_url' => 'seeds/brooke-lark-jUPOXXRNdcA-unsplash.jpg',
                'content' => "Voeding vormt de basis van onze gezondheid en vitaliteit. Verse en ooorspronkelijke voeding bevat de meeste levensenergie en deze worden dan ook het meest aangeraden om te concumeren. Hieronder een kort op een rijtje wat onze uitgangspunten van goede en passende voeding.

-  Vers en oorspronkelijk
-  Bevat een scala aan voedingsstoffen
-  Is afgestemd op iemands persoonlijke consitutie
-  Biedt een variëteit aan smaken
-  Kan goed door het lichaam worden verteerd
-  Past bij het seizoen
-  Is klaargemaakt met kruiden die de spijsvertering stimuleren

Om je goed te voelen en een goede gezondheid te behouden, probeer dan overwegend goede en passende voeding te eten. "
            ]);
            factory(Page::class)->create([
                'parent_id' => $homepage->id,
                'title' => 'samen gezond',
                'subtitle' => 'vitaal leven loont',
                'content' => "Werk je aan je gezondheid met [SamenGezond](https://www.samengezond.nl)? Dan belonen we die inspanning met SamenGezond-punten. Deze punten kun je inwisselen in onze webwinkel voor populaire producten en aantrekkelijke kortingen.

In de online webshop vind je een rijk assortiment aan producten zoals huishoudelijke apparaten, elektronica en sportartikelen en diverse kortingsvouchers. Spaar voor kortingsbonnen voor interessante cursussen als EHBO en reanimatie of wissel je punten in voor een preventieve gezondheidscheck bij een fysiotherapeut of diëtist. Zin in een dagje uit? In de SamenGezond webshop kan je ook kortingsbonnen bestellen voor een dagje uit met korting. Kies bijvoorbeeld voor een bioscoop voucher of ga naar de sauna met korting. Zo ben je altijd voordelig uit simpel door gezond te leven. Speciaal voor Geesteren zullen er ook lokale acties zijn, die vind je hier op de website.

Wil je liever voordeel op je verzekering? Ook dat is mogelijk. SamenGezond beloont gezond gedrag met korting op je aanvullende zorgverzekering of reisverzekering. Waardoor je ook met je verzekeringen goedkoper uit bent. Ook kun je ervoor kiezen je punten niet zelf te besteden maar te doneren aan een goed doel.

Doe ook mee met SamenGezond, ontdek leuke activiteiten, spaar punten en wissel ze in. Download de SamenGezond-app uit de [Apple app store](https://itunes.apple.com/nl/app/menzis-samengezond/id1290297195) of de [Google play store](https://play.google.com/store/apps/details?id=nl.menzis.samengezond.menzis&referrer=utm_source%3Dsamengezond%26utm_medium%3Dwebsite%26utm_term%3Dbutton) en begin vandaag nog met gezonder leven.

Vraag je je af hoe je deze app kunt gebruiken, [kijk dan hier](https://www.samengezond.nl/gezondheid-app/)"
            ]);
        });

        factory(Page::class)->create([
            'footer_position' => 1,
            'title' => 'privacy',
            'subtitle' => 'wat er met uw data gebeurt',
            'content' => "Wij verkopen alles aan china."
        ]);

        factory(Page::class)->create([
            'footer_position' => 2,
            'title' => 'over ons',
            'subtitle' => 'wie zijn de mensen achter geesteren vitaal',
            'content' => "Eigenlijk zijn we gewoon een stelletje studenten."
        ]);

        $talks_category = factory(ActivityCategory::class)->create([
            'name' => 'lezingen',
        ]);

        factory(Activity::class)->create([
            'title' => 'gelukskunde',
            'subtitle' => 'wil je gelijk of wil je geluk?',
            'image_url' => 'seeds/gelukskunde.jfif',
            'content' => "Vitaal Geesteren zal in zaal Kottink te Geesteren een lezing over Gelukskunde organiseren onder leiding van Mirjam Spitholt.

Het bijwonen van deze avond kost € 5,00 entree p.p en dat is inclusief koffie/thee bij ontvangst en een consumptie gedurende de avond. De entreekosten kunnen bij binnenkomst contant worden betaald.

Ook inwoners van buurtdorpen zijn deze avond van harte welkom. Meld je dus snel aan!",
            'activity_category_id' => $talks_category->id,
        ]);

        factory(Activity::class)->create([
            'title' => 'voeding en vitaliteit',
            'subtitle' => 'de invloed van voeding op je dagelijks leven',
            'image_url' => 'seeds/voeding.jpg',
            'content' => " Margret geeft uitleg over de invloed van voeding op je dagelijkse leven en hoe je een passend eetpatroon kunt aannemen voor meer energie en een fit lichaam.

De entree is gratis en aanmelden kan via de knop hierboven",
            'activity_category_id' => $talks_category->id,
        ]);

        factory(Activity::class)->create([
            'title' => 'imperfectie',
            'subtitle' => 'de kloof tussen wie we denken te moeten zijn en wie we daadwerkelijk zijn',
            'image_url' => 'seeds/holger-link-CSyT2auC69w-unsplash.jpg',
            'content' => "Een maatschappelijk probleem is de stijgende lijn Nederlanders met een burn-out of depressie. Belangrijk om hier aandacht aan te besteden d.m.v. een bijeenkomst. Gedurende deze bijeenkomst wordt de problematiek in kaart gebracht door prestatiedruk, onzekerheid, faalangst en keuzestress.",
            'activity_category_id' => $talks_category->id,
        ]);

        factory(Activity::class)->create([
            'title' => 'stress',
            'subtitle' => 'hoe pak jij je rust?',
            'image_url' => 'seeds/nikko-macaspac-6SNbWyFwuhk-unsplash.jpg',
            'content' => "Stress is alles dat door ons lichaam en brein als gevaar wordt gezien. Het is de grootste bedreiging voor je gezondheid en je energieniveau. De effecten van stress zijn voor iedereen anders. Het is individueel bepaald. De een ervaart eerder stress, dan de ander. Door een bijeenkomst te organiseren voor Geestenaren over ‘stress’ wordt aan hun meegegeven wat stress doet op je lijf en geest en tips over rol de leefstijl kan spelen bij stress.",
            'activity_category_id' => $talks_category->id,
        ]);

        $moving_category = factory(ActivityCategory::class)->create([
            'name' => 'bewegen',
        ]);

        factory(Activity::class)->create([
            'title' => 'wandeltocht',
            'subtitle' => 'met het hele dorp op stap',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "We vertrekken weer vanaf De Peuverweide.
Laat u ook verrassen langs de mooie route. Iedereen is welkom! Tot dan!",
            'location_name' => 'De Peuverweide',
            'activity_category_id' => $moving_category->id,
        ]);

        factory(Activity::class)->create([
            'title' => 'bootcamp',
            'subtitle' => 'werken aan je gezondheid',
            'image_url' => 'seeds/hester-ras-5qxsSIqLH60-unsplash.jpg',
            'location_name' => 'Sportpark Lutkeberg',
            'activity_category_id' => $moving_category->id,
        ]);

        $hike_category = factory(ChallengeCategory::class)->create([
            'name' => 'wandelroutes',
        ]);

        factory(Challenge::class)->create([
            'title' => 'Dorpsommetje Geesteren',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "Er zijn vier mooie dorpsommetjes gerealiseerd vanuit het dorp Geesteren met informatie over de cultuurhistorie.",
            'location_name' => 'Noaberplein bij Erve Kampboer',
            'challenge_category_id' => $hike_category->id,
        ]);
        factory(Challenge::class)->create([
            'title' => 'Veldhoekroute',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "Langs historische erven met een eeuwenoude geschiedenis.",
            'location_name' => 'Noaberplein bij Erve Kampboer',
            'challenge_category_id' => $hike_category->id,
        ]);
        factory(Challenge::class)->create([
            'title' => 'Delmaroute',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "Wandel langs vergezichten, weilanden en akkers.",
            'location_name' => 'Noaberplein bij Erve Kampboer',
            'challenge_category_id' => $hike_category->id,
        ]);
        factory(Challenge::class)->create([
            'title' => 'Molenhoekroute',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "Ten noordwesten van Geesteren ligt het dorpsommetje Molenhoek.",
            'location_name' => 'Noaberplein bij Erve Kampboer',
            'challenge_category_id' => $hike_category->id,
        ]);
        factory(Challenge::class)->create([
            'title' => 'Vermolenroute',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "Bewandel het langste dorpsommetje! ",
            'location_name' => 'Noaberplein bij Erve Kampboer',
            'challenge_category_id' => $hike_category->id,
        ]);
        factory(Challenge::class)->create([
            'title' => 'Huyerensche Veld',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "Wandel langs verschillende weilanden van de Huyerensche",
            'location_name' => 'Noaberplein bij Erve Kampboer',
            'challenge_category_id' => $hike_category->id,
        ]);
        factory(Challenge::class)->create([
            'title' => 'Langs de Broekbeek',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "De langste wandelroute in Geesteren is ‘Langs de Broekbeek’.",
            'location_name' => 'Noaberplein bij Erve Kampboer',
            'challenge_category_id' => $hike_category->id,
        ]);

        $mtb_category = factory(ChallengeCategory::class)->create([
            'name' => 'mountainbiken',
        ]);
        factory(Challenge::class)->create([
            'title' => 'MTB route Hellendoorn',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "Deze MTB-route over de Sallandse Heuvelrug bij Hellendoorn heeft een lengte van 18 kilometer. Het is ook aaneengesloten te rijden met de blauwe route (30 kilometer) in Holten. De route is gemarkeerd met paarse MTB-bewegwijzering (driehoek met daaronder 2 rondjes). www.mtbsallandseheuvelrug.nl",
            'location_name' => 'Hellendoorn',
            'location_address' => 'Grotestraat 281, 7441 GS in Nijverdal',
            'challenge_category_id' => $mtb_category->id,
            'latitude' => 52.3658568,
            'longitude' => 6.4414077,
        ]);
        factory(Challenge::class)->create([
            'title' => 'MTB route Holterberg',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "Deze MTB-route tussen Holten en Nijverdal heeft een lengte van 30 kilometer. Het is ook aaneengesloten te rijden met de paarse route (18 kilometer) in Hellendoorn. De route is gemarkeerd met blauwe MTB-bewegwijzering (driehoek met daaronder 2 rondjes). www.mtbsallandseheuvelrug.nl",
            'location_name' => 'Holten',
            'location_address' => 'Stationsstraat 12, 7451 BH in Holten',
            'challenge_category_id' => $mtb_category->id,
            'latitude' => 52.2840077,
            'longitude' => 6.419222,
        ]);
        factory(Challenge::class)->create([
            'title' => 'MTB Route Lageveld',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "De MTB-route Lageveld heeft een lengte van 4,3 kilometer en is gemarkeerd met houten palen met in het rood het internationale MTB-teken (driehoek met daaronder 2 rondjes). De route Wierden-Lageveld, gelegen in het bosgebied Het Lageveld, is onderdeel van de mountainbikeroute Wierden.",
            'location_name' => 'Wierden',
            'location_address' => 'Vlierdijk, 7641 PB Wierden',
            'challenge_category_id' => $mtb_category->id,
            'latitude' => 52.3750974,
            'longitude' => 6.5849643,
        ]);
        factory(Challenge::class)->create([
            'title' => 'MTB route Lemelerberg',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "De MTB-route op de Lemelerberg heeft een lengte van 13 kilometer. Op deze pittige route kun je er voldoende energie kwijt! De route wordt aangegeven met de zwarte MTB-bewegwijzering. www.mtbsallandseheuvelrug.nl",
            'location_name' => 'Lemele',
            'location_address' => 'Kerkweg 32, 8148 PZ, Lemele',
            'challenge_category_id' => $mtb_category->id,
            'latitude' => 52.4583452,
            'longitude' => 6.3949878,
        ]);
        factory(Challenge::class)->create([
            'title' => 'MTB route Reggedal',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "Deze MTB-route Reggedal gaat door het gelijknamige gebied Het Reggedal en bestaat voor een deel uit nieuw aangelegde singletracks. De route is 19 km lang en is een wat vlakkere route, met een paar heuvels in het Duivecatebos. De route is gemarkeerd met groene MTB-bewegwijzering.",
            'location_name' => 'Nijverdal',
            'location_address' => 'Sportlaan 6, Nijverdal',
            'challenge_category_id' => $mtb_category->id,
            'latitude' => 52.3720438,
            'longitude' => 6.4631779,
        ]);
        factory(Challenge::class)->create([
            'title' => 'MTB route Rijssen',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "Deze MTB-route bij Rijssen heeft een lengte van 20 kilometer en loopt door het ongeveer 600 hectare grote natuurgebied De Borkeld, gelegen tussen de A1 en Rijssen. De route is gemarkeerd met groene MTB-bewegwijzering. www.mtbsallandseheuvelrug.nl / www.mtbrouterijssen.nl",
            'location_name' => 'Rijssen',
            'location_address' => 'Arend Baanstraat 102, 7461 DX, Rijssen',
            'challenge_category_id' => $mtb_category->id,
            'latitude' => 52.29538,
            'longitude' => 6.5161387,
        ]);
        factory(Challenge::class)->create([
            'title' => 'MTB route Wierden',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "De MTB-route Wierden heeft een lengte van 32 kilometer en is gemarkeerd met houten palen met in het rood het internationale MTB-teken (driehoek met daaronder 2 rondjes). De route Wierden bestaat voornamelijk uit singletracks die zijn gelegen in bosrijke gebieden rondom Wierden.",
            'location_name' => 'Wierden',
            'location_address' => 'Vriezenveenseweg 57, 7641 PE, Wierden',
            'challenge_category_id' => $mtb_category->id,
            'latitude' => 52.3804134,
            'longitude' => 6.5904855,
        ]);
        factory(Challenge::class)->create([
            'title' => 'MTB route Hellendoorn',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "",
            'location_name' => 'Hellendoorn',
            'location_address' => 'Grotestraat 281, 7441 GS in Nijverdal',
            'challenge_category_id' => $mtb_category->id,
            'latitude' => 52.3657847,
            'longitude' => 6.4423197,
        ]);
        factory(Challenge::class)->create([
            'title' => 'MTB-route Sibculo',
            'image_url' => 'seeds/wandelen.jpg',
            'content' => "De route rondom Sibculo heeft een lengte van 26 kilometer en is gemarkeerd met in het groen het internationale MTB-teken (driehoek met daaronder 2 rondjes). De mountainbikeroute Zand en Veen is een route met veel afwisseling. De route bevat uitdagende stukken voor meer ervaren mountainbikers.",
            'location_name' => 'Sibculo',
            'location_address' => 'Gemeenteweg 8, 7693 PM in Sibculo',
            'challenge_category_id' => $mtb_category->id,
            'latitude' => 52.4854412,
            'longitude' => 6.6399339,
        ]);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


        $cycling_category = factory(ChallengeCategory::class)->create([
            'name' => 'fietsroutes',
        ]);
        factory(Challenge::class)->create([
            'title' => 'Noordoost-Twenteroute',
            'subtitle' => 'De kroonjuwelen van Twente',
            'image_url' => 'seeds/noordoosttwenteroute.jpg',
            'content' => "Fietsen door een fraai landschap met de kroonjuwelen van Twente: bossen, lanen, landgoederen, akkers, weilanden en moerassen!",
            'location_name' => 'Ootmarsum',
            'location_address' => 'Oldenzaalsestraat, 7631 CT in Ootmarsum',
            'challenge_category_id' => $cycling_category->id,
            'latitude' => 52.404637,
            'longitude' => 6.896019,
        ]);
        factory(Challenge::class)->create([
            'title' => 'Ontdek de Reggestreek',
            'subtitle' => 'Het Reggedal is veelzijdig en afwisselend',
            'image_url' => 'seeds/reggestreek.jpg',
            'content' => "Een stukje paradijs op aarde! Het Reggedal is veelzijdig en afwisselend. Het biedt weiden (omzoomd met de zo typische Twentse houtwallen), onontgonnen veengebied, bossen en fraaie heidevelden.",
            'location_name' => 'Enter',
            'location_address' => 'Dorpsstraat 42, 7468 CL in Enter',
            'challenge_category_id' => $cycling_category->id,
            'latitude' => 52.296960,
            'longitude' => 6.577478,
        ]);
        factory(Challenge::class)->create([
            'title' => 'Rondje Borne - fietsen',
            'subtitle' => 'Rondje Borne: een prachtige fietsroute',
            'image_url' => 'seeds/rondjeborne.jpg',
            'content' => "Rondje Borne is een erg mooie fietsroute die loopt door het fraaie en veelzijdige buitengebied van Borne.",
            'location_name' => 'Borne',
            'location_address' => 'Burenweg, 7622 GM in Borne',
            'challenge_category_id' => $cycling_category->id,
            'latitude' => 52.287422,
            'longitude' => 6.752778,
        ]);
        factory(Challenge::class)->create([
            'title' => 'Rondje in het Veen',
            'subtitle' => 'Deze fietsroute neemt je mee naar vervlogen tijden',
            'image_url' => 'seeds/rondjeveen.jpg',
            'content' => "Deze fietsroute neemt je mee naar vervlogen tijden. Je fietst langs het bijzondere natuurgebied “De Engbertsdijksvenen” ten oosten van Westerhaar-Vriezenveensewijk, in een driehoek met de dorpjes Bruinehaar en De Pollen.",
            'location_name' => 'Vriezeveen',
            'location_address' => 'Westeinde, 7671 CN in Vriezenveen ',
            'challenge_category_id' => $cycling_category->id,
            'latitude' => 52.408359,
            'longitude' => 6.614279,
        ]);
        factory(Challenge::class)->create([
            'title' => 'Rondje Regge en Heuvelrug 175 km',
            'subtitle' => 'Route voor de vijf-daagse fietsvakantie Rondje Regge en Heuvelrug',
            'image_url' => 'seeds/rondjereggeheuvelrug.jpg',
            'content' => "Route voor de 5 daagse fietsvakantie Rondje Regge en Heuvelrug",
            'location_name' => 'Regge & de heuvelrug',
            'location_address' => 'Zwolseweg 13, 7731 BC in Ommen',
            'challenge_category_id' => $cycling_category->id,
            'latitude' => 52.516100,
            'longitude' => 6.414284,
        ]);
        factory(Challenge::class)->create([
            'title' => 'Smaak en Vermaak Notter - Zuna',
            'subtitle' => 'Maak kennis met de rivier de Regge',
            'image_url' => 'seeds/smaakenvermaaknotter.jpg',
            'content' => "Maak kennis met de rivier de Regge. Een mooie fietsroute over het afwisselende platteland met knusse boerderijen, de vele streekproducenten, het open coulisselandschap en de dorpen Rijssen en Enter. Een route langs buurtschappen met namen als Notter, Zuna, Rectum en IJpelo.",
            'location_name' => 'Notter',
            'location_address' => 'Klokkendijk 14, 7467 PD in Notter',
            'challenge_category_id' => $cycling_category->id,
            'latitude' => 52.326773,
            'longitude' => 6.529041,
        ]);
        factory(Challenge::class)->create([
            'title' => 'Stift fietsroute',
            'subtitle' => 'Historische plekken in de omgeving van Weerselo en Tubbergen',
            'image_url' => 'seeds/stiftfietsroute.jpg',
            'content' => "Middels deze fietsroute laten we u graag kennis maken met een aantal historische plekken in de omgeving van Weerselo en Tubbergen, schilderachtige watermolens en de prachtige natuur in de omgeving van Ootmarsum. Klik op de knop route downloaden voor de pdf van de route.",
            'location_name' => 'Ootmarsum',
            'location_address' => 'Markt 9, 7631 BW in Ootmarsum',
            'challenge_category_id' => $cycling_category->id,
            'latitude' => 52.408114,
            'longitude' => 6.897335,
        ]);
        factory(Challenge::class)->create([
            'title' => 'Twentse hooilandenroute',
            'subtitle' => 'Tussen Drenthe en Twente, ligt een verborgen juweel',
            'image_url' => 'seeds/twentsehooilandenroute.jpg',
            'content' => "Tussen Drenthe en Twente, ligt een verborgen juweel. Waar de geur van vers gemaaid hooi warme herinneringen oproept aan lang vervlogen zomers en waar u nog in alle rust kunt genieten van de gemoedelijke sfeer van Twente.",
            'location_name' => 'Den Ham',
            'location_address' => '<> Brink 4, 7683 BP in Den Ham',
            'challenge_category_id' => $cycling_category->id,
            'latitude' => 52.464246,
            'longitude' => 6.494988,
        ]);
    }
}
