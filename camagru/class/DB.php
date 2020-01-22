<?php
	require "../config/database.php";
class DB {
	private static function connect() {
		$dsn = DSN;
		$user = DB_USER;
		$pass = DB_PASS;
		$pdo = new PDO("$dsn", "$user", "$pass");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

	public static function query($query, $params = array()) {
		$stmt = self::connect()->prepare($query);
		$stmt->execute($params);

		if (explode(' ', $query)[0] == 'SELECT') {
			$data = $stmt->fetchALL();
			return $data;
		}
	}
}
?>
