<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;



class Helper
{
    public static function applClasses()
    {
      
        // default data array
        $DefaultData = [
          'title' => 'EIS - RSUD H. A. SULTHAN DAENG RADJA BULUKUMBA',
          'favicon' => 'favicon_trans.ico',
          'project' => 'TRANSMEDIC',
          'namaProfile' => 'RSUD H. A. SULTHAN DAENG RADJA BULUKUMBA',
          'navbarColor' => '',
          'horizontalMenuType' => 'floating',
          'verticalMenuNavbarType' => 'floating',
          'footerType' => 'static', //footer
          'layoutWidth' => 'full',
          'showMenu' => true,
          'bodyClass' => '',
          'bodyStyle' => '',
          'pageClass' => '',
          'pageHeader' => true,
          'contentLayout' => 'default',
          'blankPage' => false,
          'defaultLanguage'=>'en',
          'direction' => env('MIX_CONTENT_DIRECTION', 'ltr'),
        ];

       
        return $DefaultData;
    }

    
}
