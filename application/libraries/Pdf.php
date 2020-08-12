<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Pdf extends Dompdf{

    public $filename;
    
    public function __construct()
    {
        parent::__construct();
        $this->filename = 'report.pdf';
    }

    protected function ci()
    {
        return get_instance();
    }

    public function load_view($view, $data = [])
    {
        $html = $this->ci()->load->view($view, $data, TRUE);
        $this->loadHtml($html);

        $this->render();
        $this->stream($this->filename, ["Attachment" => false]);
    }
}