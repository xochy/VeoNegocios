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
        $contact->name      = 'Teléfono';
        $contact->color     = 'info';
        $contact->iconClass = 'phone';
        $contact->save();

        $contact = new Contact();
        $contact->name      = 'WhatsApp';
        $contact->color     = 'success';
        $contact->iconClass = 'whatsapp';
        $contact->save();

        $contact = new Contact();
        $contact->name      = 'Facebook';
        $contact->color     = 'primary';
        $contact->iconClass = 'facebook-square';
        $contact->save();

        $contact = new Contact();
        $contact->name      = 'YouTube';
        $contact->color     = 'danger';
        $contact->iconClass = 'youtube';
        $contact->save();
    }
}