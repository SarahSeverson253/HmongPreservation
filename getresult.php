

    <?php
    // get the q parameter from URL
    $q = $_REQUEST["q"];
     
    $hint = "";
     
    include('conn.php');
     
    $fname=array();
    $query=mysqli_query($conn,"select * from `photos`");
    while($row=mysqli_fetch_array($query)){
    	$caption[]=$row['caption'];
    }
     
    // lookup all hints from array if $q is different from "" 
    if ($q !== "") {
        $q = strtolower($q);
        $len=strlen($q);
        foreach($fname as $name) {
            if (stristr($q, substr($name, 0, $len))) {
                if ($hint === "") {
                    $hint = $name;
                } else {
                    $hint .="<br> $name";
                }
            }
        }
    }
     
    echo $hint === "" ? "no suggestion" : $hint;
    ?>