<?php

namespace App\Http\Controllers;

class testcontroller extends Controller{

    public function dbAction(){
        $post = ['SUZUKI','Mehran','KIA'];
        echo "<pre>";
        print_r($post);
    }
}
?>