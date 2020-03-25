<?php

use App\Contact;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact = new Contact();
        $contact->name        = 'Teléfono';
        $contact->color       = 'info';
        $contact->iconClass   = 'fas fa-phone';
        $contact->placeholder = 'Ej. (+55) 2128 7411 & (+55) 1126 7414';
        $contact->save();

        $contact = new Contact();
        $contact->name        = 'WhatsApp';
        $contact->color       = 'success';
        $contact->iconClass   = 'fab fa-whatsapp';
        $contact->placeholder = 'Ej. (+45) 3852 7415 & (+42) 5789 4123';
        $contact->save();

        $contact = new Contact();
        $contact->name        = 'Facebook';
        $contact->color       = 'primary';
        $contact->iconClass   = 'fab fa-facebook';
        $contact->placeholder = 'https://www.facebook.com/veonegocios';
        $contact->save();

        $contact = new Contact();
        $contact->name        = 'YouTube';
        $contact->color       = 'danger';
        $contact->iconClass   = 'fab fa-youtube';
        $contact->placeholder = 'https://www.youtube.com/watch?v=PB0qwbexR70&t';
        $contact->save();
    }
}