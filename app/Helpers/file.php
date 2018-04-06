<?php

/**
 * Return sizes readable by humans
 */
function human_filesize($bytes, $decimals = 2)
{
  $size = ['B', 'Kb', 'Mb', 'Gb', 'TB', 'PB'];
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1000, $factor)) .
      @$size[$factor];
}
function space_size($Gbytes, $decimals = 2)
{
  $size = ['Gb', 'TB', 'PB'];
  $factor = floor((strlen($Gbytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $Gbytes / pow(1000, $factor)) .
        @$size[$factor];
}

function int_size($bytes, $decimals = 2)
{
  $size = ['B', 'Kb', 'Mb', 'Gb', 'TB', 'PB'];
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1000, $factor));
}
function calculate_size($bytes, $decimals = 2)
{
  $size = ['B', 'Kb', 'Mb', 'Gb', 'TB', 'PB'];
  
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

/**
 * Convert from  Byte to _BYTE  (_ = M , K , G ,T)  
 */
function size_to_kb($size)
{
  return $size  / 1024;
}
function size_to_mb($size)
{
  return $size  / 1048576;
}
function size_to_gb($size)
{
  return $size  / 1073741824;
}
function size_to_tb($size)
{
  return $size  / (1073741824*1024);
}

/**
 * Convert from _BYTE  (_ = M , K , G ,T) to Byte 
 */
 
/* Kb To _BYTE */  
function size_kb_to_byte($size)
{
  return $size  * 1024; // 1024
}
/* Mb To _BYTE */  
function size_mb_to_kb($size)
{
  return $size  * 1024; 
}
function size_mb_to_byte($size)
{
  return $size  * 1048576; // 1048576 = 1024*1024
}
/* Gb To _BYTE */  
function size_gb_to_mb($size)
{
  return $size  * 1024; 
}
function size_gb_to_kb($size)
{
  return $size  * 1048576; 
}
function size_gb_to_byte($size)
{
  return $size  * 1073741824; // 1073741824 = 1024*1024*1024
}
/* TB To _BYTE */  
function size_tb_to_gb($size)
{
  return $size  * 1024; // 1024
}
function size_tb_to_mb($size)
{
  return $size  * 1048576; // 1048576 = 1024*1024
}
function size_tb_to_kb($size)
{
  return $size  * 1073741824; // 1073741824 = 1024*1024*1024
}
function size_tb_to_byte($size)
{
  return $size  * (1073741824*1024); // 1073741824*1024 = 1024*1024*1024*1024
}
