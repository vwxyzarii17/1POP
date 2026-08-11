<?php
function randomUserAgent() {

    $android = ['10', '11', '12', '13', '14'];

    $devices = [
        'SM-S918B',
        'SM-A546E',
        'SM-G991B',
        'Pixel 6',
        'Pixel 7 Pro',
        'Pixel 8 Pro',
        'Redmi Note 12',
        'Redmi Note 13 Pro',
        'M2101K7AG',
        'CPH2387',
        'CPH2239',
        'V2310',
        'RMX3630',
        'Infinix X681B'
    ];

    $chromeMajor = rand(120, 126);
    $chromeMinor = 0;
    $chromeBuild = rand(1000, 6999);
    $chromePatch = rand(10, 250);

    $device = $devices[array_rand($devices)];
    $androidVersion = $android[array_rand($android)];

    return "Mozilla/5.0 (Linux; Android {$androidVersion}; {$device}) "
        . "AppleWebKit/537.36 (KHTML, like Gecko) "
        . "Chrome/{$chromeMajor}.{$chromeMinor}.{$chromeBuild}.{$chromePatch} "
        . "Mobile Safari/537.36";
}
while(true){
$agen = randomUserAgent();
$url = 'https://1pop.online/ad/banner?zone=ZONE_0CBEE4FFE579EC6B&size=728x90';

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_MAXREDIRS => 5,
    CURLOPT_CONNECTTIMEOUT => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_USERAGENT => $agen,
    CURLOPT_HTTPHEADER => [
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    ],
]);

$response = curl_exec($curl);

if ($response === false) {
    echo 'cURL Error: ' . curl_error($curl);
} else {
    echo 'HTTP Code: ' . curl_getinfo($curl, CURLINFO_HTTP_CODE) . PHP_EOL;
    echo 'Content-Type: ' . curl_getinfo($curl, CURLINFO_CONTENT_TYPE) . PHP_EOL;
    echo 'Size: ' . strlen($response) . ' bytes' . PHP_EOL;
    echo PHP_EOL;

    // Tampilkan maksimal 100 karakter pertama
    #echo substr($response, 0, 5);
}
}
