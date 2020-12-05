<?php

session_start();

function con()
{
	return mysqli_connect("localhost", "root", "root", "sv-cms");
	// return mysqli_connect("localhost", "samanehv_svajdi", "Salamazizam12", "samanehv_cms");
}

function processLogin($email, $password)
{
	// connect db and check if we have a user... 
	$sql = "SELECT * FROM users WHERE strEmail='" . $_POST["strEmail"] . "' AND strPassword='" . $password . "'";

	$results = mysqli_query(con(), $sql);

	$userFound = mysqli_fetch_assoc($results);

	if ($userFound) {
		// record who they are... 
		$_SESSION["nUserID"] = $userFound["id"];
		$_SESSION["strUserEmail"] = $userFound["strEmail"];
		return true;
	} else {
		return false;
	}
}

function checkLogin()
{
	if (isset($_SESSION["nUserID"])) {
		// this is terrible
		return true;
	} else {
		header("location: admin.php?error=1");
	}
}

function getPages()
{
	$data = false;

	$sql = "SELECT * FROM pages ORDER BY strName";

	$results = mysqli_query(con(), $sql);

	// multipele records... 
	while ($row = mysqli_fetch_assoc($results)) {
		$data[] = $row;
	}

	return $data;
}

function getPagesView()
{
	$data = false;

	$sql = "SELECT * FROM pages ORDER BY nView DESC";

	$results = mysqli_query(con(), $sql);

	// multipele records... 
	while ($row = mysqli_fetch_assoc($results)) {
		$data[] = $row;
	}

	return $data;
}

function saveNewPage($name, $body)
{
	$sql = "INSERT INTO pages (strName, strBody) VALUES ('" . $name . "', '" . $body . "')";
	$con = con();
	mysqli_query($con, $sql);

	$lastID = mysqli_insert_id($con);

	return $lastID;
}

function saveNewNav($name)
{
	$sql = "INSERT INTO navgroups (strName) VALUES ('" . $name . "')";
	$con = con();
	mysqli_query($con, $sql);

	$lastID = mysqli_insert_id($con);

	return $lastID;
}



function deletePage($id)
{
	$sql = "DELETE FROM pages WHERE id='" . $id . "'";

	$success = mysqli_query(con(), $sql);

	return true;
}

function getPage($id)
{
	$sql = "SELECT * FROM pages WHERE id='" . $id . "'";

	$results = mysqli_query(con(), $sql);

	$page = mysqli_fetch_assoc($results);
	$view = $page['nView'] + 1;

	$sql = "UPDATE pages SET nView='" . $view . "' WHERE id='" . $id . "'";
	$results = mysqli_query(con(), $sql);


	return $page;
}

function updatePage($id, $name, $body)
{
	$sql = "UPDATE pages SET strName='" . $name . "', strBody='" . $body . "' WHERE id='" . $id . "'";

	$results = mysqli_query(con(), $sql);

	return true;
}

function updateNav($id, $name)
{
	$sql = "UPDATE navgroups SET strName='" . $name . "'  WHERE id='" . $id . "'";

	$results = mysqli_query(con(), $sql);

	return true;
}

function getNavigationAreas()
{
	$data = false;

	$sql = "SELECT * FROM navgroups ORDER BY strName";

	$results = mysqli_query(con(), $sql);

	// multipele records... 
	while ($row = mysqli_fetch_assoc($results)) {
		$data[] = $row;
	}

	return $data;
}

function getNavGroup($id)
{
	$sql = "SELECT * FROM navgroups WHERE id='" . $id . "'";

	$results = mysqli_query(con(), $sql);

	$record = mysqli_fetch_assoc($results);

	return $record;
}

function updateNavGroup($id, $whichPages)
{
	$sql = "DELETE FROM pages_navgroups WHERE nNavgroupsID ='" . $id . "'";
	mysqli_query(con(), $sql);

	foreach ($whichPages as $pageID) {
		$sql = "INSERT INTO pages_navgroups (nNavgroupsID, nPagesID) VALUES('" . $id . "', '" . $pageID . "')";

		mysqli_query(con(), $sql);
	}
}

function getPagesInGroup($id)
{
	$data = false;
	$sql = "SELECT * FROM pages_navgroups WHERE nNavgroupsID='" . $id . "'";

	$results = mysqli_query(con(), $sql);

	while ($row = mysqli_fetch_assoc($results)) {
		$data[$row["nPagesID"]] = true;
	}

	return $data;
}

function getPagesByGroup($id)
{
	$data = [];
	$sql = "SELECT pages.* FROM pages
	JOIN pages_navgroups
	ON pages.id=pages_navgroups.nPagesID
	WHERE pages_navgroups.nNavgroupsID='" . $id . "'";

	$results = mysqli_query(con(), $sql);

	while ($row = mysqli_fetch_assoc($results)) {
		$data[] = $row;
	}

	return $data;
}

function getUsers()
{
	$data = false;

	$sql = "SELECT * FROM users ORDER BY strEmail";

	$results = mysqli_query(con(), $sql);

	// multipele records... 
	while ($row = mysqli_fetch_assoc($results)) {
		$data[] = $row;
	}

	return $data;
}


function getUser($id)
{
	$sql = "SELECT * FROM users WHERE id='" . $id . "'";

	$results = mysqli_query(con(), $sql);

	$data = mysqli_fetch_assoc($results);

	return $data;
}



function saveNewUser($email, $password)
{
	$sql = "INSERT INTO users (strEmail, strPassword) VALUES ('" . $email . "', '" . $password . "')";
	$con = con();
	mysqli_query($con, $sql);

	$lastID = mysqli_insert_id($con);

	return $lastID;
}

function updateUser($id, $email, $password)
{
	$sql = "UPDATE users SET strEmail='" . $email . "', strPassword='" . $password . "' WHERE id='" . $id . "'";

	$results = mysqli_query(con(), $sql);

	return true;
}


function deleteUser($id)
{
	$sql = "DELETE FROM users WHERE id='" . $id . "'";

	$success = mysqli_query(con(), $sql);

	return true;
}
