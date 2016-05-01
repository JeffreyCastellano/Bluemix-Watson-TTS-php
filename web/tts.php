<?php

///Simple PHP Test w/ FFMPEG to get TTS from Watson/Bluemix to mp3 format...because who knows why they didn't make mp3 and output method


$username='USERNAME FROM BLUEMIX CREDS';
$password='PASSWORD FROM BLUEMIX CREDS';
$URL='https://stream.watsonplatform.net/text-to-speech/api/v1/synthesize';
$format = 'audio/wav';

//header('Content-Type: '.$format); for return of the media in the format you wish

$data = array("text" => "hello there!", "Accept" => $format); 
$data_string = json_encode($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // BAD !
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept:'.$format));
curl_setopt($ch,CURLOPT_POSTFIELDS, $data_string);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$result=curl_exec ($ch);
curl_close ($ch);

//echo $result; will render out binary file use with above content type if desired.

$myfile = fopen("test.wav", "w") or die("Unable to open file!");
fwrite($myfile, $result);
fclose($myfile);
$filename = $meta_data["uri"];


$mp3 = fopen("test.mp3", "w") or die("Unable to open file!");
fclose($mp3);

$fileoutname = 'tts.mp3';

$output;
exec('ffmpeg -i test.wav -y test.mp3 2>&1', $output);

$arrlength = count($output);

for($x = 0; $x < $arrlength; $x++) {
    echo $output[$x];
    echo "<br>";
}

?>
