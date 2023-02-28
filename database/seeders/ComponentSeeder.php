<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Models\ComponentOption;
use App\Services\AllArticlesFilter;
use App\Services\ArticleByCategoryFilter;
use App\Services\NoUrlFilter;
use App\Services\SingleArticleFilter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Artículos
        $component = Component::create([
            'name' => 'articles',
            'label' => 'Artículos',
            'route' => 'p_articles.show'
        ]);

        // Construimos dos opciones al componente
        ComponentOption::create([
            'name' => 'Artículo simple',
            'livewire_field' => 'choose-article-resource',
            'filter' => SingleArticleFilter::class,
            'component_id' => $component->id,
            'route' => 'p_articles.show'
        ]);

        ComponentOption::create([
            'name' => 'Todos los artículos',
            'livewire_field' => '',
            'filter' => AllArticlesFilter::class,
            'component_id' => $component->id,
            'route' => 'p_articles.index'
        ]);

        ComponentOption::create([
            'name' => 'Artículos por categoría',
            'livewire_field' => 'choose-article-by-category',
            'filter' => ArticleByCategoryFilter::class,
            'component_id' => $component->id,
            'route' => 'p_articles.by_category'
        ]);

        //System link
        $component = Component::create([
            'name' => 'system',
            'label' => 'Enlaces del sistema',
            'route' => ''
        ]);

        // Construimos dos opciones al componente
        ComponentOption::create([
            'name' => 'Sin url',
            'livewire_field' => '',
            'filter' => NoUrlFilter::class,
            'component_id' => $component->id,
            'route' => ''
        ]);

        //Contacts component
        $component = Component::create([
            'name' => 'contacts',
            'label' => 'Contáctenos',
            'route' => 'contacts.index'
        ]);

        // Construimos dos opciones al componente
        ComponentOption::create([
            'name' => 'Formulario contáctenos',
            'livewire_field' => '',
            'filter' => '',
            'component_id' => $component->id,
            'route' => 'contacts.index'
        ]);
    }
}
