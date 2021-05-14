<?php


class nScript
{
	var $maxLength,
		$lim,
		$db_name,
		$db_host,
		$db_user,
		$db_pass,
		$showmodul,
		$sfull,
		$conn;

	function nScript()
	{
		require('server.php');

		$this->db_host = $db_host;
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass= $db_pass;
		$this->lim = $lim;
		$this->showmodul = $showmodul;
		$this->sfull = $sfull;
	}

	function displayAll()
	{
		$this->connect();

		$result = mysqli_query($this->conn,"SELECT * FROM nportal ORDER BY date DESC LIMIT 0, $this->lim");

		while($row = mysqli_fetch_assoc($result))
		{

			$id = $row['id'];
			$topic = $row['topic'];
			$date = $this->convertDate($row['date']);
			$author =  $row['author'];

			require($this->showmodul);

		}

		$this->close();
	}



	function displayOne( $id )
	{
		if(is_numeric($id))
		{
			$this->connect();

			$result = mysqli_query($this->conn,"SELECT * FROM nportal WHERE id = '$id'");
			$row = mysqli_fetch_assoc($result);
			$image =  $row['image'];
			$author =  $row['author'];
			$topic = $row['topic'];
			$content= $row['content'];
			$date = $this->convertDate($row['date']);

			require($this->sfull);

			$this->close();
			return true;
		}
		else return false;

	}

	function connect()
	{
		$this->conn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass)
							or die("Unable to connect to MySQL");

		mysqli_select_db($this->conn,$this->db_name) or die("Unable to select DB!");

		if(!$this->conn)
		{
			return false;
		}
		else return true;
	}

	function close()
	{
		mysqli_close($this->conn);
	}

	function convertDate($date)
	{
		$date_array = explode("-",$date); // split the array
		$y = $date_array[0];
        $m = $date_array[1];
        $d = $date_array[2];

        return $d . "/" . $m . "/" . $y;
	}
}

?>
