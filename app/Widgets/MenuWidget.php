<?php
namespace App\Widgets;

use App\Widgets\Contract\ContractWidget;
use App\Menu;

class MenuWidget implements ContractWidget 
{
      public function execute(){
       $data = 'test widget data';
        return view('Widgets::menu', [
            'data' => $data
        ]);
     }
}