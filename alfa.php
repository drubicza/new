<?php
function nabila($angka)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://appmoneylabs.com/alfa.php?angka=$angka");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);

    $headers = array ();
    $headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
    $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; Redmi 6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.99 Mobile Safari/537.36";
    $headers[] = "Host: appmoneylabs.com";
    $headers[] = "Proxy-Connection: keep-alive";

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);

    $result = curl_exec($ch);
    return $result;
}

print "grivy - Alfamart\n";
print "Thanks To : Muhammad Ikhsan Aprilyadi\n\n";

echo "4 Digit angka : ";
$angka = trim(fgets(STDIN));

echo "Jumlah : ";
$jumlah = trim(fgets(STDIN));

$i = 1;
while ($i < $jumlah) {
    sleep($wait);
    $i++;
    flush();

    $res   = json_decode(nabila($angka));
    //get balance
    $data  = $res->status;
    $data2  = $res->link;
    echo "Status : $data [-] Link : $data2\n";
}
?>
