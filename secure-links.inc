<?php
/**
 * Generates a valid link to a protected Linkwell website.
 *
 * Use of this function requires a pre-shared secrent known by the generating
 * generating party (You) and Validating party (Linkwell).
 *
 * Parameters:
 *   @shared_secret: the pre-shared key. If you are unsure of what your
 *                   pre-shared key is, contact your Linkwell representative
 *
 *   @duration:      The duration for which the generated link is valid in
 *                   seconds. Linkwell recommends that you you set this
 *                   value to at least one hour to accommodate for server time
 *                   discrepencies and the fact that the link is generated
 *                   at page load and some time may expire while the user
 *                   browses the page.
 *
 *   @url:           The URL of your Linkwell property including the path if
 *                   applicable. E.g.:
 *                     - http://savings.healthycoupons.com/emblemhealth
 *                     - http://savings.healthycoupons.com/emblemhealth/recipes
 *
 * Return value:     A URL to be used as a link valid for the duration
 *                   specified
 */
function generate_secure_link($shared_secret, $duration, $url) {
  $timestamp = time() + $duration;
  $hash = md5($shared_secret . $timestamp);
  $link =  $url . '?s=' . $hash . '&t=' . $timestamp;
  return $link;
}
?>
