<?php

class Storex_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function upload($nameimage,$dataname,$tablename,$file,$allowed,$max_size)
    {


        if (!empty($file['name'])):
            $filex = $file['tmp_name'];
            $size = $file['size'];
            $type = $file['type'];
            $name = $file['name'];

            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            if (strstr($allowed, $extension)):


                if ($size > $max_size * 1000000):

                    return 'Tamanho maximo de ' . $max_size. 'MB, excedido.';

                else:

                    $database = $this->load->database($dataname, TRUE);
                    $date['file'] = file_get_contents(addslashes($filex));
                    $date['name'] = $nameimage;
                    $date['ext'] = $extension;
                    $date['type'] = $type;
                    $date['date'] = date('d/m/Y H:i:s');

                    $database->insert($tablename, $date);
                    $return = $database->insert_id();

                    if ($return > 0) {
                        return $return;
                    } else {
                        return 'Erro a salvar a imagem, tente mais tarde.';
                    }

                endif;


            else:

                return 'Somente as extensões ' . $allowed . ' são permitidas.';

            endif;


        else:


            return 'Por favor selecione o arquivo.';


            endif;


        }






}