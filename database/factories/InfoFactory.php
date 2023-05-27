<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Info>
 */
class InfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'telephone1' => '+237 690095004',
            'telephone2' => '+237 693029546',
            'telephone3' => '+237 697175938',

            'email' => 'agrimax@gmail.com',
            'address1' => 'elig edzoa, yde',
            'address2' => 'marche, mbouda',
            'address3' => 'dla',

            'period' => '08h-17h',
            'whatsapp' => '+237 678513874',
            'facebook' => 'https://facebook.com/agrimax',

            'about_title' => "Rencontrer notre equipe",
            'about_subtitle' => "Une Equipe de personnes jeunes et dynamiques pour vous servir.",

            'contact_title' => "Vous pouvez nous contacter par l'un des canaux suivants",
            'contact_subtitle' => "Vous pouvez nous appeler ou nous laisser un message et c'est avec un grand plaisir que l'equipe d'Agrimax vous repondra. Nous vous attendons.",

            'newsletter_title' => "Rejoindre notre newsletter!",
            'newsletter_subtitle' => "Voulez-vous etre averti lorsqu'il y'a du nouveau sur Agrimax? Inscrivez vous à la Newsletter et vous serez parmi les premiers à découvrir les nouveaux produits, les nouvelles articles et les informations complémentaires.",
        ];
    }
}
