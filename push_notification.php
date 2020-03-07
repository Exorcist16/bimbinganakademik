<?php
require __DIR__ . '/vendor/autoload.php';
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

$auth = [
    'GCM' => '267660624424', // deprecated and optional, it's here only for compatibility reasons
    'VAPID' => [
        'subject' => 'mailto:me@website.com', // can be a mailto: or your website address
        'publicKey' => 'BBM3ZhbZ9j0Og57QieQ0dT6MjU5U4sVZcsc5j4dSWTlC3WvFp3Db1GBvwNcyAFfRn9VpiTuYUgcoFDSJYFYGkvo', // (recommended) uncompressed public key P-256 encoded in Base64-URL
        'privateKey' => 'MmNVM1tOf4fgsF76QD-dJYL0iDM3rXBUOdKlZx8JWAo', // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
    ],
];

// array of notifications
$notifications = [
    [
        'subscription' => Subscription::create([ // this is the structure for the working draft from october 2018 (https://www.w3.org/TR/2018/WD-push-api-20181026/) 
            "endpoint" => "https://fcm.googleapis.com/fcm/send/ccJecTaPQQk:APA91bFhaYfTDMQpWcN2BQbjxifMAluyXVSdoaW1pvwCgDuivuitvKP-OYZ3ufbBLlAlbJzEoQJKmMrPbnXVQHlvC8v0WWXcbk6sJK-pmp5CCX_tJevVCGp6rN021nEbq4FIJyj1sdmv",
            "keys" => [
                'p256dh' => 'BMVEu3yZhQlrvNpuxIOXa45y+0pf0keU60xFGHll4/Vho3nxNwhmWv1zekTF1ZgVcCc+3EbDx0dlDhbB1WgVZck=',
                'auth' => 'SmSMHKoUlyJ0VlTe7JX+rQ=='
            ],
        ]),
        'payload' => 'Yo',
    ],
];

$webPush = new WebPush($auth);

// send multiple notifications with payload
foreach ($notifications as $notification) {
    $webPush->sendNotification(
        $notification['subscription'],
        $notification['payload'] // optional (defaults null)
    );
}

/**
 * Check sent results
 * @var MessageSentReport $report
 */
foreach ($webPush->flush() as $report) {
    $endpoint = $report->getRequest()->getUri()->__toString();

    if ($report->isSuccess()) {
        echo "[v] Message sent successfully for subscription {$endpoint}.";
    } else {
        echo "[x] Message failed to sent for subscription {$endpoint}: {$report->getReason()}";
    }
}

// /**
//  * send one notification and flush directly
//  * @var \Generator<MessageSentReport> $sent
//  */
// $sent = $webPush->sendNotification(
//     $notifications[0]['subscription'],
//     $notifications[0]['payload'], // optional (defaults null)
//     true // optional (defaults false)
// );