<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Storex {
    function __construct(){

        parent::__construct();
        $this->load->libraries('database');
    }

    public function GetHost()
    {

        $dump =  explode(':',$_SERVER['HTTP_HOST']);
        if($dump[0] == 'http://127.0.0.1'):
                return 0;
            else:

            return 1;

                endif;

    }

}


    ?>