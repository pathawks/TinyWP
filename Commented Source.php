<?php

// We're going to replace some common strings with variables to save space. This way, we can keep this file as small as possible

$h='http://';
$w='wordpress';
$z='.zip';

// We use $_SERVER variables a lot, so let's use $s instead and save a few bytes
$s=$_SERVER;

// $c = 'wordpress.zip';
$c=$w.$z;

// $n = the name of this file on the server
// $n = basename($_SERVER["SCRIPT_NAME"]);
$n=basename($s["SCRIPT_NAME"]);

// Now we'll delete this file from the server, and cross our fingers that installation goes as planned.
unlink($n);

// Let's download http://wordpress.org/latest.zip to the server as 'wordpress.zip'
copy($h.$w.'.org/latest'.$z,$c);

$b = new ZipArchive;
	// Open wordpress.zip so that we can work with the directory structure
	$b->open($c);
	
	// The WordPress zip file puts all of the contents in a subdirectory called wordpress. We're going to loop through all the files in the zip, renaming them to the root directory of the zip file
	
	for($i=0;$i<$b->numFiles;$i++) {
		$f=$b->getNameIndex($i);
		$b->renameName(
			$f,
			str_replace(
				$w.'/',
				'',
				$f
			)
		);
	}
$b->close();

// Here, we're just saving the changes and reopening the zip file. Yes, it seems stupid to me too, but the changes didn't seem to work unless this step was performed.

$b=new ZipArchive;
	$b->open($c);
	
	// Extact the contents of wordpress.zip to the current directory on the server
	$b->extractTo('./');
$b->close();


// Now that everything is in place, we can delete wordpress.zip from the server
unlink($c);

/**
	Finally, we can kick the user out of this script and over to WordPress setup.

	Because we have made no changes to wp-config.php we need to direct the user to
	setup-config.php instead of wp-install.php

	'http://'.$_SERVER["HTTP_HOST"].
		str_replace(
			basename($_SERVER["SCRIPT_NAME"]),
			'wp-admin/setup-config.php',
			$_SERVER['REQUEST_URI']
		)
**/
header('Location: '.$h.$s["HTTP_HOST"].str_replace($n,'wp-admin/setup-config.php',$s['REQUEST_URI']));