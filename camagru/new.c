



user.php


-------------------

require ('db.php');


$conn = new DB;

$conn->query("Create data if exist name");

class user{
	function(){
		return &conn;
	}
}

-------------------

login.php 


require ('user.php)





------------------



pipe.php


//connnect to the database
$object = new DB;

$conVar = &object->connnect;




$newCon = new user;

$newCon->query("select from id * ")


