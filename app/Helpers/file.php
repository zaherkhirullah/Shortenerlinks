<?php

/**
 * Return sizes readable by humans
 */
function human_filesize($bytes, $decimals = 2)
{
  $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1000, $factor)) .
      @$size[$factor];
}
function space_size($Gbytes, $decimals = 2)
{
  $size = ['GB', 'TB', 'PB'];
  $factor = floor((strlen($Gbytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $Gbytes / pow(1000, $factor)) .
        @$size[$factor];
}

function int_size($bytes, $decimals = 2)
{
  $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1000, $factor));
}
function calculate_size($bytes, $decimals = 2)
{
  $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
  
$length = strlen($bytes)-2;
$get_size_type =str_split($bytes,1);

for($i = 0 ; $i < count($size);$i++){
    $ss[]+=$get_size_type[strlen($bytes)-($i+1)];    
    if($size[$i] == $get_size_type[1])
    {  
        dd($get_size_type[strlen($bytes)-($i+1)]);
        $type = $i;
    }
}
$factor = 1;
for($i = 0 ; $i < $type ;$i++){
    $factor *=  1000;
}
return $factor * $get_size_type[0];

}

function safeName($data)
{   
  $dizi=array(['.','$','+','<','>','|','*','^','/','(',')','"',"'","\"",'!','&','#','%']);
  for( $i=0;$i < count($dizi); $i++ )
  {
    $data = str_replace($dizi[$i],str_random(1,2),$data);
  }
  return $data;
}

/**
 * Is the mime type an image
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}