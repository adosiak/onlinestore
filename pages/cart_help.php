#!/usr/bin/php
<?php
function check_each($new, $old)
{
  $new_arr = explode(";", trim($new, ";"));
  $old_arr = explode(";", trim($old,";"));

  foreach ($new_arr as $key => $value) {
    $tmp = explode(":", $value);
    $new_arr[$key] = array($tmp[0]=>$tmp[1]);
  }
  foreach ($old_arr as $key => $value) {
    $tmp = explode(":", $value);
    $old_arr[$key] = array($tmp[0]=>$tmp[1]);
  }
  foreach ($new_arr as $val1)
  {
    $flag = 0;
    foreach ($old_arr as $key_old =>$v_old) {
      foreach ($val1 as $k => $v) {
      if (strlen($old_arr[$key_old][$k]))
        {
          $old_arr[$key_old][$k] = $old_arr[$key_old][$k] + $v;
          $flag = 1;
        }
      }
    }
    if (!$flag)
      $old_arr[] = $val1;
  }

  // echo "new_arr:\n";
  // print_r($new_arr);
  // echo "\nold_arr:\n";
  // print_r($old_arr);
  foreach ($old_arr as $val1)
  {
    foreach ($val1 as $k => $v){
        $tmp = $k.":".$v.";";
    $tmp_fin = $tmp_fin.$tmp;
  }
}
//echo "str of old_arr=\n".$tmp_fin;
return ($tmp_fin);
}

check_each("444:45;3:10000000;4:45;10:56;5:111;", "33:10000000;444:45;110:56;111:67;");
//overwright("444:45;4:48;10:56;5:111;", "10:30;444:10;4:20;5:111;")
 ?>
