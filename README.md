# PHP-YouWatch-API
 A Web Service for the YouWatch API
 
 ## VERSION API
0.02

## DEPENDENCIES

##### File YouWatchAPI.php

This API use file_get_contents, you need to enable 'allow_url_fopen' in php.ini

##### File YouWatchAPICurl.php

This API use cURL, you need to enable lib curl, [http://php.net/manual/en/curl.installation.php](http://php.net/manual/en/curl.installation.php)

Account Info
------------

```

<?php
include 'YouWatchAPICurl.php';

$api = new YouWatchAPI;

$result = $api->AccountInfo(
  [
    key => 'your_key'
  ]
);

if(!$result->{error}){
    echo 'Login: ' . $result->{login};
    echo '<br />';
    echo 'Money: ' . $result->{money};
}else{
    echo $result->{error};
}
?>

```

Add URL Upload
--------------

```

<?php
include 'YouWatchAPICurl.php';

$api = new YouWatchAPI;

$result = $api->UploadURL(
  [
    key => 'your_key',
    url => 'http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4',
    folder => 'name_your_folder'
  ]
);

if(!$result->{error}){
    echo 'Queue ID: ' . $result->{queue_id};
}else{
    echo $result->{error};
}
?>

```

Check URL Upload
----------------

```

<?php
include 'YouWatchAPICurl.php';

$api = new YouWatchAPI;

$result = $api->CheckUploadURL(
  [
    key => 'your_key',
    id => 'queue_id'
  ]
);

if(!$result->{error}){
    echo 'Status: ' . $result->{status};
    echo '<br />';
    echo 'URL: ' . $result->{url};
    echo '<br />';
    echo 'File Code: ' . $result->{file_code};
    echo '<br />';
}else{
    echo $result->{error};
}
?>

```


Upload Server Request
---------------------

```

<?php
include 'YouWatchAPICurl.php';

$api = new YouWatchAPI;

$result = $api->GetUploadServer(
  [
    key => 'your_key'
  ]
);

if(!$result->{error}){
    echo 'URL: ' . $result->{url};
    echo '<br />';
    echo 'srv_id: ' . $result->{srv_id};
    echo '<br />';
    echo 'disk_id: ' . $result->{disk_id};
    echo '<br />';
}else{
    echo $result->{error};
}
?>

```

Check Files
-----------

```

<?php
include 'YouWatchAPICurl.php';

$api = new YouWatchAPI;

$result = $api->CheckFiles(
  [
    key => 'your_key',
    files => [
      '1a1a1a1a1a1a',
      '1b1b1b1b1b1b',
      '2c2c2c2c2c2c'
    ]
  ]
);

if(!$result->{error}){
    foreach($result as $row){
      echo 'File Code: ' . $row->{file_code};
      echo '<br />';
    }
}else{
    echo $result->{error};
}
?>

```

Renew File code
---------------

```

<?php
include 'YouWatchAPICurl.php';

$api = new YouWatchAPI;

$result = $api->RenewFile(
  [
    key => 'your_key',
    file_code => 'a1a1a1a1a1a1'
  ]
);

if(!$result->{error}){
    echo 'File Code: ' . $result->{file_code};
}else{
    echo $result->{error};
}
?>

```

Clone File code
---------------

```

<?php
include 'YouWatchAPICurl.php';

$api = new YouWatchAPI;

$result = $api->CloneFile(
  [
    file_code => '1a1a1a1a1a1a',
    folder => 'name_your_folder',
    new_title => 'new_title_to_file_cloned'
  ]
);

if(!$result->{error}){
    echo 'File Code: ' . $result->{file_code};
}else{
    echo $result->{error};
}
?>

```

Check Files DMCA
----------------

```

<?php
include 'YouWatchAPICurl.php';

$api = new YouWatchAPI;

$result = $api->CheckFilesDMCA(
  [
    key => 'your_key',
    date => 'YYYY-MM-DD',
    order => 'down'
  ]
);

if(!$result->{error}){
    foreach($result as $row){
      echo 'File Code: ' . $row->{file_code};
      echo '<br />';
      echo 'Date DMCA Created: ' . $row->{dmca_created};
      echo '<br />';
      echo 'Date DMCA expire: ' . $row->{dmca_expire};
      echo '<br />';
    }
}else{
    echo $result->{error};
}
?>

```
