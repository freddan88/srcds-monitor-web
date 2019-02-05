<?php
error_reporting(0);
header("Refresh:10");
# -------------------------------------------------------- #
# Simple srcds query based on s1lk [PHP] Simple server query
# URL: https://oxidemod.org/threads/php-simple-server-query.2374
# Configuration:
#
$ip = '192.168.0.5';
$queryport = 27015;
#__________________________________________________________________#
####################################################################
$socket = @fsockopen("udp://".$ip, $queryport , $errno, $errstr, 5);

stream_set_timeout($socket, 1);
stream_set_blocking($socket, TRUE);
fwrite($socket, "\xFF\xFF\xFF\xFF\x54Source Engine Query\x00");
$response = fread($socket, 4096);
@fclose($socket);

$packet = explode("\x00", substr($response, 6), 5);
$server = array();

$server['name'] = $packet[0];
$server['map'] = $packet[1];
$server['game'] = $packet[2];
$server['description'] = $packet[3];
$inner = $packet[4];

$server['players'] = ord(substr($inner, 2, 1));
$server['playersmax'] = ord(substr($inner, 3, 1));
$server['password'] = ord(substr($inner, 7, 1));
$server['vac'] = ord(substr($inner, 8, 1));

$file="img/maps/$server[map].jpg";
file_exists($file) ? $img="$file" : $img="img/maps/srcds.jpg";

$server['game'] ? $status="<span style='color:green;'>Server Online</span>" : $status="<span style='color:red;'>Server Offline</span>";
$server['password'] ? $password="Yes" : $password="No";
$server['vac'] ? $vac="VAC Enabled" : $vac="VAC Disabled";

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Simple Srcds Monitor</title>
		<link href="style.css" type="text/css" rel="stylesheet"/>
        <meta name="robots" content="noindex,nofollow"/>
		<meta charset="UTF-8"/>
    </head>

    <body>
        <div class="main-box">
            <header><h2>Simple Srcds Monitor</h2></header>
            <main>
                <div class="flex">
                    <div class="flex-1">
                        <div>
                            <img src="<?= $img ?>"/>
                            <h4><?= $server['map']; ?></h4>
                        </div>
                    </div>
                    <div class="flex-2">
                        <h3>Status: <?= $status ?></h3>
                        <h3>Name: <?= $server['name']; ?></h3>
                        <br/>
                        <h3>Game: <?= $server['description']; ?></h3>
                        <h3>Map: <?= $server['map']; ?></h3>
                        <h3>Players: <?= $server['players']; ?>/<?= $server['playersmax']; ?></h3>
                        <br/>
                        <h3>Password: <?= $password; ?></h3>
                        <h3>Secure: <?= $vac; ?></h3>
                    </div>
                </div>
				</br>
				<center><a href="steam://connect/<?= $ip ?>:<?= $queryport ?>"><h4>Click here to connect</h4></center></a>
            </main>

			<footer>
				<h2>Simple Srcds Monitor</h2>
			</footer>
        </div>
    </body>
</html>