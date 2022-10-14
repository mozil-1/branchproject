<?php

/**
 * 
 */
class Admin
{
	
	private $con;

	function __construct()
	{
		include_once("classes/db.php");
		$con = new Database();
		$this->con = $con->connect();
	}

	public function getAdminList(){
		$query = $this->con->query("SELECT `id`, `firstname`, `lastname`, `email`, `password` FROM `admin` WHERE 1");
		$ar = [];
		if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'No Admin'];
	}


}


if (isset($_POST['GET_ADMIN'])) {
	$a = new Admin();
	echo json_encode($a->getAdminList());
	exit();
	
}
if ($_SERVER['REQUEST_METHOD']=='POST'){

}

?>