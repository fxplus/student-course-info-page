<?php 
// $con = mysql_connect("localhost","moodle","moodle");
// if (!$con) {
// die('Could not connect: ' . mysql_error());
// }

// mysql_select_db("moodle", $con);
// $result = mysql_query("SELECT name AS COURSE_NAME,parent FROM mdl_course_categories");

// if (isset($result)!=1) {
// $message  = 'Invalid query: ' . mysql_error() . "\n";
// }
// echo "<p> The courses taught are: </p>";

// ///Display Course Categories
// $query_catetories = mysql_query('SELECT cc.id, cc.parent, cc.name FROM   mdl_course_categories cc ');
// $categories = mysql_fetch_all($query_catetories);

// $tmp_categories = array();

// foreach ($categories AS $row) {

// $row['id'] = (int) $row['id'];
// $row['parent'] = (int) $row['parent'];
// if (!$tmp_categories[$row['parent']])
//     $tmp_categories[$row['parent']] = array();
// $tmp_categories[$row['parent']][] = $row;
// }

// $course_catetories = buildNode($tmp_categories);

// echo '<ul>';
// foreach ($course_catetories as $course_catetory) {
// print_category_child($course_catetory);
// }
// echo '</ul>';

// function print_category_child($category) {
// echo '<li>' . $category['name'];
// if (array_key_exists('children', $category)) {
//     echo '<ul>';
//     foreach ($category['children'] as $child) {
//         print_category_child($child);
//     }
//     echo '</ul>';
// }
// echo '</li>';
// }

// function buildNode($inputArray, $parent = 0) {
// $return = array();
// foreach ($inputArray[$parent] AS $key => $row) {
//     if (@$inputArray[$row['id']]) {
//         $row['children'] = buildNode($inputArray, $row['id']);
//     }
//     $return[] = $row;
// }
// return $return;
// }

// function mysql_fetch_all($result) {
// $all = array();
// while ($all[] = mysql_fetch_assoc($result)) {

// }
// return array_filter($all);
// }
// ///END Course Display 


// 

$mysqli = new mysqli("localhost", "root", "root", "ls26upgradetest");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* Select queries return a resultset */
if ($result = $mysqli->query("SELECT name AS COURSE_NAME,parent FROM mdl_course_categories")) {
    print_r($result);

    /* free result set */
    $result->close();
}

?>