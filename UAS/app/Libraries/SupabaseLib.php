<?php

namespace App\Libraries;

use Supabase\SupabaseClient;

class SupabaseLib
{
    protected $client;

    public function __construct()
    {
        $supabaseUrl = getenv('SUPABASE_URL');
        $supabaseKey = getenv('SUPABASE_KEY');

        $this->client = new SupabaseClient($supabaseUrl, $supabaseKey);
    }

    /**
     * Mendapatkan instance SupabaseClient
     *
     * @return SupabaseClient
     */
    public function getClient()
    {
        return $this->client;
    }
}
