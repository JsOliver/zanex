<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data3 = $this->load->database('data2', TRUE);
$data3->from('teste');
$query = $data3->get();
$row = $query->num_rows();
$fetch = $query->result_array();
echo $fetch[0]['name'].'<br>';




?>