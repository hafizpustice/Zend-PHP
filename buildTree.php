<?php

function buildTree(Array $data, $parent = null) {
    $tree = array();
    foreach ($data as $d) {
        if ($d['parent'] == $parent) {
            $children = buildTree($data, $d['id']);
            // set a trivial key
            if (!empty($children)) {
                $d['_children'] = $children;
               /* echo json_encode($d['_children']);
                echo "<br>";*/
            }
            $tree[] = $d;
        }
    }
    //print_r(json_decode(json_encode($tree)));
    //echo "<br>";
    return $tree;
}

$rows = array(
    array (
        'id' => 1001,
        'name' => 'Bangladesh', 
        'parent' => null
    ),
    array (
        'id' => 1002,
        'name' => 'Dhaka', 
        'parent' => 1001
    ),
    array (
        'id' => 1003, 
        'name' => 'Mirpur', 
        'parent' => 1002),
    array (
        'id' => 1004, 
        'name' => 'Mirpur DOHS', 
        'parent' => 1003
    ),
    array (
        'id' => 1005,
        'name' => 'Rajshahi', 
        'parent' => 1001
    ),
    array (
        'id' => 1006,
        'name' => 'Raani Bazar', 
        'parent' => 1005
    ),  
    array (
        'id' => 2001,
        'name' => 'India', 
        'parent' => null
    ),
    array (
        'id' => 2002,
        'name' => 'kolkata', 
        'parent' => 2001
    ),
   
);

$tree = buildTree($rows);

/*TestTree($tree);
function TestTree($tree)
{
    echo "<ul>";
    foreach ($tree as $i => $t) {
        printf("<li> %s </li>", $t['name'] );
    }
    echo "</ul>";
    echo "<br>";
}*/

function printTree($tree, $r = 0, $p = null) {
    foreach ($tree as $i => $t) {
        $dash = ($t['parent'] == null) ? '' : str_repeat('-', $r) .' ';
        printf("\t<option value='%d'>%s%s</option>\n", $t['id'], $dash, $t['name']);
       /* if ($t['parent'] == $p) {
            // reset $r
            $r = 0;
        }*/
        if (isset($t['_children'])) {
            /*if ($t['parent'] == $p) {
                $r = 0;
            }*/
            printTree($t['_children'], ++$r, $t['parent']);
            --$r;
        }
    }
}

print("<ul>");
printTree($tree);
print("</ul>");