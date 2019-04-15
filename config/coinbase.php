<?php

return [
    'apiKey' => '1074094f-b1bd-44c7-9ca3-e285a0f0c0ff',
    'apiVersion' => '2018-03-22',

    'webhookSecret' => '8422287f-b536-4c12-9940-0cc006638531',
    'webhookJobs' => [
        'charge:created' => \App\Jobs\CoinbaseWebhooks\HandleCreatedCharge::class,
        'charge:confirmed' => \App\Jobs\CoinbaseWebhooks\HandleConfirmedCharge::class,
        // 'charge:failed' => \App\Jobs\CoinbaseWebhooks\HandleFailedCharge::class,
        // 'charge:delayed' => \App\Jobs\CoinbaseWebhooks\HandleDelayedCharge::class,
        // 'charge:pending' => \App\Jobs\CoinbaseWebhooks\HandlePendingCharge::class,
        // 'charge:resolved' => \App\Jobs\CoinbaseWebhooks\HandleResolvedCharge::class,
    ],
    'webhookModel' => Shakurov\Coinbase\Models\CoinbaseWebhookCall::class,
];
