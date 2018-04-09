<?php
//if we got something through $_POST
if (isset($_POST&#91;'search'&#93;)) {
    // DB Conn
    include('db.php');
    $db = new db();
    // Sanitize input
    $word = mysql_real_escape_string($_POST&#91;'search'&#93;);
    $word = htmlentities($word);
    // Build Query
    $sql = "SELECT caption, description FROM photos WHERE content LIKE '%" . $word . "%' ORDER BY caption LIMIT 10";
    // get results
    $row = $db->select_list($sql);
    if(count($row)) {
        $end_result = '';
        foreach($row as $r) {
            $result         = $r['caption'];
            // we will use this to bold the search word in result
            $bold           = '<span class="found">' . $word . '</span>';    
            $end_result     .= '<li>' . str_ireplace($word, $bold, $result) . '</li>';            
        }
        echo $end_result;
    } else {
        echo '<li>No results found</li>';
    }
}
?>