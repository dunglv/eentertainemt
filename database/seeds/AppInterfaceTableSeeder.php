<?php

use Illuminate\Database\Seeder;
use App\AppInterface;
class AppInterfaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interface = new AppInterface;
        $interface->menu = 1;
        $interface->search = 1;
        $interface->language = 1;
        $interface->slider = 1;
        $interface->featured = 1;
        $interface->newest = 1;
        $interface->footer_logo = 1;
        $interface->footer_logo_url = '';
        $interface->footer_preface = '';
        $interface->footer_menu = 1;
        $interface->copyright = '{"type":"link","url":"link","text":"luongvietdung.com"}';
        $interface->footer_social ='{"facebook":{"url":"url facebook","text":"facebook","icon":"icon facebook"},"youtube":{"url":"url utube","text":"utube","icon":"icon utube"},"twitter":{"url":"url twitter","text":"twitter","icon":"icon twitter"},"instagram":{"url":"url instagram","text":"instagram","icon":"icon instagram"},"pinterest":{"url":"url pinterest","text":"pinterest","icon":"icon pinterest"},"tumblr":{"url":"url tumblr","text":"tumblr","icon":"icon tumblr"}, }';
        $interface->save();
    }
}
