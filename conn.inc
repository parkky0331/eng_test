<?php

  function getConnection()
  {
    $server = "localhost";
    $id = "moin123";
    $pw = "moin123";

    $db = "moin123";

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
?>
