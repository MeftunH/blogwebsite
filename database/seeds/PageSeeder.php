<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages=['About','Carier','Mission','Vision'];
        $count=0;
        foreach($pages as $page){
            $count++;
          DB::table('pages')->insert([

            'title'=>$page,
            'slug'=>str_slug($page),
            'image'=>'https://lh3.googleusercontent.com/proxy/p5IfJIjhmDB4h2SjpHODaIJs7bVuceHUNGB987C-8EF2CRFhqUDocFaqaA1IJnzWYn7tyRZkv_2NCC7unYacEl1qRJYH4Iwk9F1vB_CFA7XJ1-8',
            'content'=>'Quis tempor mollit.Veniam dolore reprehenderi
                         Ipsum proident consectetur proident aliquip ex anim tempor culpa est ipsum magna ut.
                         Consectetur ad minim qui sunt dolore.
                         Adipisicing nostrud cupidatat excepteur aute tempor.
                         Reprehenderit commodo dolore in sint elit sunt labore mollit irure duis eu aliquip ad.
                         Sit Lorem voluptate culpa deserunt tempor velit commodo sit exercitation sint nostrud tempor aliqua do.
                         Ullamco ut nisi dolor sint ullamco ut ad culpa veniam qui sint magna ad.
                         Fugiat cupidatat sint ad non ipsum laboris laborum aliqua nostrud.
                         Culpa reprehenderit enim aliquip consectetur sunt labore aute enim est non fugiat.',
             'order'=>$count,
            'created_at'=>now(),
            'updated_at'=>now()
          ]);
        }
    }
}
