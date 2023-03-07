<script>$('html, body').animate({ scrollTop: 100 }, 100);</script><?php 
session_start();

if(isset($_POST['page'])){ 
    // Include pagination library file 
    include_once 'Pagination.php'; 
     
    // Include database configuration file 
    require_once 'db.php'; 
     
    //$whr = " ";     
     if(isset($_REQUEST['catm']) && isset($_REQUEST['cat']) && !empty($_REQUEST['cats'])){
         $cat = $_REQUEST['cat'];
         $catm = $_REQUEST['catm'];
          $cats = $_REQUEST['cats'];
        $whr = "WHERE m_ctg = '" . $cat . "' AND c_ctg = '" . $catm. "' AND s_ctg = '" . $cats . "'";
      } 
     if(isset($_REQUEST['cat']) && empty($_REQUEST['catm'])){
         $cat = $_REQUEST['cat'];
        $whr = "WHERE m_ctg = '" . $cat . "'";
     }
      if(isset($_REQUEST['catm']) && isset($_REQUEST['cat']) && empty($_REQUEST['cats'])){ 
        $catm = $_REQUEST['catm'];
        $cat = $_REQUEST['cat'];
          $whr = "WHERE m_ctg = '" . $cat . "' AND c_ctg = '" . $catm . "'";
      }
          if(isset($_SESSION["Filter"])){
      $filt = $_SESSION["Filter"];
        if($filt == 'AZ'){
            $filt = 'ORDER BY name ASC';      
        }elseif($filt == 'ZA'){
             $filt = 'ORDER BY name DESC';
        }elseif($filt == 'LH'){
             $filt = 'ORDER BY price ASC';
        }elseif($filt == 'HL'){
             $filt = 'ORDER BY price DESC';
        }else{
            $filt = 'ORDER BY id DESC';
        }    
      }else{
            $filt = 'ORDER BY id DESC';
        }
     
    // Set some useful configuration 
    $baseURL = 'prod_page.php'.strrchr(basename($_SERVER["REQUEST_URI"]), "?");  
    $offset = !empty($_POST['page'])?$_POST['page']:0; 
    $limit = 12; 
    
    // Count of all records 
    $query   = $conn->query("SELECT COUNT(*) as rowNum FROM product $whr AND status='1'"); 
    $result  = $query->fetch_assoc(); 
    $rowCount= $result['rowNum']; 
     
    // Initialize pagination class 
    $pagConfig = array( 
        'baseURL' => $baseURL, 
        'totalRows' => $rowCount, 
        'perPage' => $limit, 
        'currentPage' => $offset, 
        'contentDiv' => 'postContent', 
        'link_func' => 'searchFilter' 
    ); 
    $pagination =  new Pagination($pagConfig); 
 
    // Fetch records based on the offset and limit 
    $query = $conn->query("SELECT * FROM product " . $whr . " AND status='1' $filt LIMIT $offset,$limit"); 
     
    if($query->num_rows > 0){ 
    ?> 
        <!-- Display posts list -->
           <div class="grid-pro">
             <ul class="grid-product">
            <?php while($rows = $query->fetch_assoc()){ ?>
                 <li class="grid-items">
                                    <div class="tred-pro">
                                        <div class="tr-pro-img">
                                            <a href="product-details.php?p_id=<?php echo $rows['p_id']; ?>">
                                                <img class="img-fluid" src="admin/products/<?php echo $rows['img1']; ?>" alt="pro-img1">
                                                <?php
                                                            $image2 = $rows['img2'];
                                                            if($image2 != 'NULL'){
                                                            ?>
                                                <img class="img-fluid additional-image" src="admin/products/<?php echo $rows['img2']; ?>" alt="additional image" alt="additional image">
                                            <?php } ?>
                                            </a>
                                        </div>
                                      
                                        <div class="pro-icn">
                                            <a href="category.php?actions=add&p_id=<?php echo $rows['p_id']; ?>" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                            <a href="category.php?action=add&quantity=1&p_id=<?php echo $rows['p_id']; ?>" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                            <a href="product-details.php?p_id=<?php echo $rows['p_id']; ?>"  class="w-c-q-icn"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                       <p>Product ID : <?php echo $rows['id']; ?></p>
                                        <h3><a href="product-details.php?p_id=<?php echo $rows['p_id']; ?>"><?php echo $rows['name']; ?></a></h3>
                                        
                                        <div class="pro-price">
                                            <span class="new-price">₹ <?php echo $rows['price']; ?> INR</span>
                                        </div>
                                    </div>
                                </li>
                            
                            
                      <?php } ?></ui></div><?php
            echo $pagination->createLinks();  
       }else{ 
        echo '<div class="all-page">
                   <div class="page-number style-6">
					  <a>Products(s) not found...</a>   
					 </div>
			     </div>'; 
            } 
        } 
     ?>
