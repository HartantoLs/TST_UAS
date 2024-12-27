<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Supabase extends BaseConfig
{
    public $url;
    public $apiKey;

    public function __construct()
    {
        $this->url = getenv('SUPABASE_URL');
        $this->apiKey = getenv('SUPABASE_API_KEY');
    }
}
