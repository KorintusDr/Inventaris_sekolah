<?php
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf {

    protected $dompdf;

    public function __construct() {
        // Initialize Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $this->dompdf = new Dompdf($options);
    }

    public function load_html($html) {
        $this->dompdf->loadHtml($html);
    }

    public function set_paper($size = 'A4', $orientation = 'portrait') {
        $this->dompdf->setPaper($size, $orientation);
    }

    public function render() {
        $this->dompdf->render();
    }

    public function stream($filename = 'document.pdf', $options = array()) {
        $this->dompdf->stream($filename, $options);
    }
}
