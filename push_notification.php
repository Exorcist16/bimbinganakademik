<?php
require __DIR__ . '/vendor/autoload.php';
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bimbingan_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$input = json_decode(file_get_contents('php://input'), true);

$sql_dosen = "SELECT nip FROM dosen WHERE nama_dosen='$input[nama_dosen]'";
$result_dosen = $conn->query($sql_dosen);
$row_dosen = $result_dosen->fetch_assoc();

$dosen_username = $row_dosen["nip"];

$sql_subscription = "SELECT * FROM subscription WHERE username='$dosen_username'";
$result_subscription = $conn->query($sql_subscription);
$row_subscription = $result_subscription->fetch_assoc();

$auth = [
    'GCM' => '267660624424', // deprecated and optional, it's here only for compatibility reasons
    'VAPID' => [
        'subject' => 'mailto:me@website.com', // can be a mailto: or your website address
        'publicKey' => 'BBM3ZhbZ9j0Og57QieQ0dT6MjU5U4sVZcsc5j4dSWTlC3WvFp3Db1GBvwNcyAFfRn9VpiTuYUgcoFDSJYFYGkvo', // (recommended) uncompressed public key P-256 encoded in Base64-URL
        'privateKey' => 'MmNVM1tOf4fgsF76QD-dJYL0iDM3rXBUOdKlZx8JWAo', // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
    ],
];

$nim_mahasiswa = $input['nim_mahasiswa'];
$nama_mahasiswa = $input['nama_mahasiswa'];
$ujian_tanggal = $input['ujian_tanggal'];
$ujian_waktu = $input['ujian_waktu'];
$ujian_tempat = $input['ujian_tempat'];

if ($input['jenis'] == 'konfirmasi_seminar_tutup') {
    $title = "Konfirmasi Jadwal Ujian Skripsi Baru";
    $body = "Nama : $nama_mahasiswa ($nim_mahasiswa)\nPada Tanggal $ujian_tanggal di $ujian_tempat.\nWaktu : $ujian_waktu.";
}
elseif ($input['jenis'] == 'konfirmasi_seminar_hasil') {
    $title = "Konfirmasi Jadwal Seminar Hasil Baru";
    $body = "Nama : $nama_mahasiswa ($nim_mahasiswa)\nPada Tanggal $ujian_tanggal di $ujian_tempat.\nWaktu : $ujian_waktu.";
} 
else {
    $title = "No message";
    $body = "No message";
}

// array of notifications
$notifications = [
    [
        'subscription' => Subscription::create([ // this is the structure for the working draft from october 2018 (https://www.w3.org/TR/2018/WD-push-api-20181026/) 
            "endpoint" => $row_subscription['endpoint'],
            "keys" => [
                'p256dh' => $row_subscription['p256dh'],
                'auth' => $row_subscription['auth']
            ],
        ]),
        'payload' => json_encode([
            'title' => $title,
            'body' => $body,
            'url' => $input['url']
        ]),
    ],
];

$webPush = new WebPush($auth);

// send multiple notifications with payload
foreach ($notifications as $notification) {
    $webPush->sendNotification(
        $notification['subscription'],
        $notification['payload']
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