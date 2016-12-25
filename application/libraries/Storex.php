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


    public function validateup($file,$allowed,$max_size){


                $filex = $file['tmp_name'];
                $size = $file['size'];
                $type = $file['type'];
                $name = $file['name'];

                      $extension = pathinfo ( $name, PATHINFO_EXTENSION );
                      $extension = strtolower ( $extension );
                      if (strstr($allowed, $extension )):

                           $data_client = $this->load->database('default', TRUE);
                           $date['image'] = file_get_contents(addslashes($filex));
                           $date['name'] = 'pp';
                           $date['ext'] = $extension;
                           $date['type'] = $type;
                           $date['date'] = date('d/m/Y H:i:s');

                        $data_client->insert('image_profile',$date);
                           $return = $data_client->insert_id();

                          if( $return > 0){
                           return $return;
                       }else
                       {
                           return 0;
                       }




              else:

                  return 0;

              endif;


    }

}


    ?>