<?php
setlocale(LC_ALL, 'tr_TR.UTF-8');
$ulke = "tr"
$url = "https://disease.sh/v3/covid-19/countries/",$ulke

$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
 
$sonuc = json_decode($response);
 
$dogrulanan = $sonuc->recovered;
$olum = $sonuc->deaths;
$iyilesen = $sonuc->cases;
 
$unix_timestamp = $sonuc->updated;
$son_guncelleme = date("H:i:s", substr($unix_timestamp, 0, 10));
 
?>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Covid Stat</title>
<head>
</head>
	<body>
<table class="table">
		<thead>
    <tr>
      <th scope="row">Son Güncelleme</th>
      <th>Doğrulanan Vaka Sayısı</th>
      <th>Toplam Ölüm Sayısı</th>
      <th>İyileşen Hasta Sayısı</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo strftime("%e %B %Y %A, $son_guncelleme", time());?></td>
      <td><?php echo $dogrulanan;?></td>
      <td><?php echo $olum;?></td>
      <td><?php echo $iyilesen;?></td>
    </tr>
   
  </tbody>
</table>
	</body>
</html>
