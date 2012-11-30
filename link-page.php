<?php
/**
 * See secure-link.inc for more information
 */
include('secure-links.inc'); // contains the generate_secure_link() function

// Set the variables
$shared_secret = 'passphrase'; // The pre-shared secret known by Linkwell
$duration = (60 * 60); // The generated URL will be valid for one hour (60*60) = (3600 seconds) = (1 hour)
$url = 'result-page.php'; // The URL of your Linkwell property

//Generate the URL
$secure_url = generate_secure_link($shared_secret, $duration, $url);
?>

<a href="<?php print $secure_url; ?>">This link will be valid for one hour</a>
