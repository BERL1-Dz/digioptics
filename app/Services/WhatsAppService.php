<?php

namespace App\Services;

use Twilio\Rest\Client;
use Twilio\Http\GuzzleClient;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected $client;
    protected $fromNumber;

    public function __construct()
    {
        // Create a Guzzle client with SSL verification disabled
        $guzzleClient = new \GuzzleHttp\Client([
            'verify' => false
        ]);
        
        // Wrap the Guzzle client in Twilio's HTTP client
        $httpClient = new GuzzleClient($guzzleClient);

        $this->client = new Client(
            config('services.twilio.sid'),
            config('services.twilio.token'),
            null,
            null,
            $httpClient
        );
        
        $this->fromNumber = config('services.twilio.whatsapp_from');
    }

    public function sendMessage($to, $message)
    {
        try {
            // Format the number for WhatsApp
            $to = $this->formatNumber($to);
            
            Log::info('Attempting to send WhatsApp message', [
                'to' => $to,
                'from' => $this->fromNumber,
                'message' => $message
            ]);
            
            // Send the message
            $message = $this->client->messages->create(
                "whatsapp:{$to}",
                [
                    'from' => "whatsapp:{$this->fromNumber}",
                    'body' => $message
                ]
            );

            Log::info('WhatsApp message sent successfully', [
                'to' => $to,
                'message_sid' => $message->sid,
                'status' => $message->status
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send WhatsApp message', [
                'to' => $to,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return false;
        }
    }

    protected function formatNumber($number)
    {
        // Remove all non-numeric characters
        $number = preg_replace('/[^0-9]/', '', $number);
        
        // If number doesn't start with country code, add it
        if (!preg_match('/^213/', $number)) {
            $number = '213' . ltrim($number, '0');
        }
        
        return $number;
    }
} 