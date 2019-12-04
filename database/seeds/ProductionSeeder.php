<?php

use Illuminate\Database\Seeder;
use App\User;
use App\ActionCategory;
use App\Action;
use App\Page;

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
            ]);
            factory(Page::class)->create([
                'parent_id' => $homepage->id,
                'title' => 'mindfullness',
            ]);
            factory(Page::class)->create([
                'parent_id' => $homepage->id,
                'title' => 'voeding',
            ]);
            factory(Page::class)->create([
                'parent_id' => $homepage->id,
                'title' => 'samen gezond',
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

        $this->call(ActivityCategoriesTableSeeder::class);
        $this->call(ChallengeCategoriesTableSeeder::class);
    }
}
