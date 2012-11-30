<?php
/**
 * Validates an incoming link
 */
function link_validate($salt = 'passphrase') {
  $p_hash = $_GET['s'];
  $p_timestamp = $_GET['t'];
  //Generate a hash of the shared salt and the provided timstamp
  $hash = md5($salt . $p_timestamp);

  //Does the hash we generated match the one they provided?
  if ($p_hash == $hash) {
    //If so, has the link expired yet?
    if ($p_timestamp >= time()) {
      //GOOD
      return TRUE;
    }
    else {
      return FALSE;
      //BAD Timestamp (expired)
    }
  }
  else {
    return FALSE;
    //BAD Hash (fraudulant)
  }
}
if (link_validate('passphrase')) {
  echo 'The URL provided is valid.';
}
else {
  echo 'The URL provided is NOT valid.';
}

?>
