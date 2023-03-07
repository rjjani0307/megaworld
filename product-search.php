<?php
  require_once "db.php";
 
  if (isset($_POST['query'])) {
      $query = "SELECT * FROM product WHERE status='1' AND name LIKE '{$_POST['query']}%' OR id LIKE '{$_POST['query']}%'  LIMIT 100";
      $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {

        while ($res = mysqli_fetch_array($result)) { 
        
        $name = $res['name'];
         $names = substr("$name", 0, 35) ."...";
         
        echo '<div>
            <img src="admin/products/' . $res['img1']. '" class="flag-img" alt="' . $res['img1']. '">
             <a href="product-details.php?p_id=' . $res['p_id']. '" style="all:revert;">' . $names . '</a>
                
                    </div>';
      }
    } else {
      echo "
      <div class='alert-danger mt-1 text-center' role='alert'>
          Product Not Found
      </div>
      ";
    }
  }
?>