<?php
class Api_Path{
    public $api_path;
    public $domain_path ;
    public $download;
    public $api_path_dev;
    public $pdf_path;
    function __construct() {
        $this->api_path='https://xinchaobacsi.vn/version-domain-deploy/api/1.1/';
        $this->domain_path='https://dev.at1ts.com/';
        $this->download = 'download_file/';
        $this->api_path_dev ='https://api.dev.at1ts.com/';
        $this->pdf_path = 'https://dev.at1ts.com/download_file/';
    }
}


