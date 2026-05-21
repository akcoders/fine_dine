<?php

namespace App\Libraries;

use RuntimeException;

class StripeCheckoutService
{
    private const API_BASE = 'https://api.stripe.com/v1';

    /**
     * @param array<string, mixed> $payload
     * @return array<string, mixed>
     */
    public function createCheckoutSession(string $secretKey, array $payload): array
    {
        return $this->request('POST', '/checkout/sessions', $secretKey, $payload);
    }

    /**
     * @return array<string, mixed>
     */
    public function retrieveCheckoutSession(string $secretKey, string $sessionId): array
    {
        return $this->request('GET', '/checkout/sessions/' . rawurlencode($sessionId), $secretKey);
    }

    /**
     * @param array<string, mixed> $payload
     * @return array<string, mixed>
     */
    private function request(string $method, string $path, string $secretKey, array $payload = []): array
    {
        $ch = curl_init();

        if ($ch === false) {
            throw new RuntimeException('Unable to initialize Stripe request.');
        }

        $url = self::API_BASE . $path;
        $headers = [
            'Authorization: Bearer ' . $secretKey,
        ];

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        }

        $response = curl_exec($ch);
        $statusCode = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($response === false || $error !== '') {
            throw new RuntimeException('Stripe request failed: ' . $error);
        }

        $decoded = json_decode($response, true);

        if (! is_array($decoded)) {
            throw new RuntimeException('Stripe returned an invalid response.');
        }

        if ($statusCode >= 400) {
            $message = $decoded['error']['message'] ?? 'Stripe request failed.';
            throw new RuntimeException($message);
        }

        return $decoded;
    }
}
