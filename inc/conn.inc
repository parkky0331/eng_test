<?php

function getConnection()
{
  $server = "localhost";
  $id = "parkky0331";
  $pw = "parkky0331_db";

  $db = "parkky0331";

  $conn = mysqli_connect($server, $id, $pw, $db);
  mysqli_set_charset($conn, "utf8");
  mysqli_select_db($conn, $db);
  return $conn;
}

function begin()
{
  mysql_query("BEGIN");
}
function commit()
{
  mysql_query("COMMIT");
}
function rollback()
{
  mysql_query("ROLLBACK");
}

//mysqli_result == mysql_result
function mysqli_result($res,$row=0,$col=0)
{ 
  $nums=mysqli_num_rows($res);
  if($nums && $row<=($nums-1) && $row>=0)
  {
    mysqli_data_seek($res,$row);
    $resrow=(is_numeric($col))?mysqli_fetch_row($res):mysqli_fetch_assoc($res);
    if(isset($resrow[$col]))
    {
      return $resrow[$col];
    }
  }
  return false;
}
?>
