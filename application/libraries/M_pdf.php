<?php
  if (!defined('BASEPATH')) exit('No direct script access allowed');
  //include_once APPPATH.'third_party/MPDF60/mpdf.php';

  class M_pdf {

    public $param;
    public $pdf;
    public function __construct()
    {
      // $this->param =$param;
      $this->pdf = new \Mpdf\Mpdf(['mode' => 'utf-8','default_font' => 'dejavusans','format' => [180.00,130.00]]);
    }
 }
?>
