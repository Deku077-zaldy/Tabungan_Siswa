<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppService
{
    protected string $baseUrl;
    protected string $apiKey;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->baseUrl = config('services.wa.api_url');
        $this->apiKey = config('services.wa.api_key');
    }

    public function sendMessage(string $message, string $targetNumber)
    {
        $payload = [
            'number' => $targetNumber,
            'message' => $message,
        ];

        return Http::withHeaders(['x-api-key' => $this->apiKey])
            ->post("{$this->baseUrl}/wa/send-message", $payload)
            ->json();
    }

}
