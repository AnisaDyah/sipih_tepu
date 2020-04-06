<?php defined('BASEPATH') OR exit('No direct script access allowed');

    use Dompdf\Dompdf;

    class Pdf extends Dompdf
    {
        public function __construct()
        {
            parent::__construct();
        }

        protected function ci()
        {
            return get_instance();
        }

        public function load_view($view, $data= [], $filename = 'laporan.pdf')
        {
            $html = $this->ci()->load->view($view, $data, true);
            $this->loadHtml($html);
            $this->render();
            //untuk menampilkan
            $this->stream($filename, ['Attachment' => 0]);
        }
    }