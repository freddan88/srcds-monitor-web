------------
START README
------------

Updated: 2019-02-05

------
Links:
------

URL: http://www.leemann.se/fredrik
Donate: https://www.paypal.me/freddan88
YouTube: https://www.youtube.com/user/FreLee54

Github-main: https://github.com/freddan88
Github-page: https://github.com/freddan88/srcds-monitor-web

Video:
Tutorial: https://github.com/freddan88/srcds-monitor-web/blob/master/readme.txt
Download: http://www.leemann.se/fredrik/file_downloads/srcds_monitor1.zip

Platform: WEB
Language: HTML CSS PHP

----------------------------------------------------
License MIT: https://choosealicense.com/licenses/mit
----------------------------------------------------

------------
Description:
------------

Simple SRCDS Monitor is a webpage that will monitor and query Valves Dedicated Source [ SRCDS ] Servers by using php
The code that connect to the server is based on s1lk´s Simple server query
URL: https://oxidemod.org/threads/php-simple-server-query.2374

I have edited and added to this code and built a website around it to display a picture of current map and more
This webpage will only work if your webhost supports php-sockets and is not blocking any communication...

-------------
Instructions:
------------

1.
Edit the configuration is index.php to include your IP and port for the game server
Example:
	# Configuration:
	$ip = '192.168.0.5';
	$queryport = 27015;
	
	OR
	
	# Configuration:
	$ip = '82.10.41.5';
	$queryport = 27015;
	
2.
Upload index.php, style.css and the folder 'img' to your webhost and visit the webpage

------------------
Actions and usage:
------------------

You can upload more pictures of maps in 'img/maps'
Simple SRCDS Monitor only supports .jpg-files and will display a picture of the same name as the current map
If a picture can´t be found the default picture from 'img/maps/srcds.jpg' will be used...
	
This monitoring page has only been tested on SRCDS servers that are playing Counter Strike Source
	
----------
END README
----------
