<?php 
if(isset($_POST['page'])){ 
    // Include pagination library file 
    include_once 'Pagination.php'; 
     
    // Include database configuration file 
    require_once 'db.php'; 
     
    // Set some useful configuration 
    $baseURL = 'page.php'; 
    $offset = !empty($_POST['page'])?$_POST['page']:0; 
    $limit = 1; 
     
    // // Set conditions for search 
    // $whereSQL = $orderSQL = ''; 
    // if(!empty($_POST['keywords'])){ 
    //     $whereSQL = "WHERE name LIKE '%".$_POST['keywords']."%'"; 
    // } 
    // if(!empty($_POST['sortBy'])){ 
    //     $orderSQL = " ORDER BY name ".$_POST['sortBy']; 
    // }else{ 
    //     $orderSQL = " ORDER BY name DESC "; 
    // } 
     
    // Count of all records 
    $query   = $conn->query("SELECT COUNT(*) as rowNum FROM blog "); 
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
    $query = $conn->query("SELECT * FROM blog LIMIT $offset,$limit"); 
     
    if($query->num_rows > 0){ 
    ?> 
        <!-- Display posts list -->
           <div class="full-blog-list-style-6">
            <?php while($row = $query->fetch_assoc()){ ?>
                 <div class="blog-start">
                                <div class="blog-image">
                                    <a href="blog-details.php?id=<?php echo $row['id']; ?>">
                                        <img src="admin/blog/<?php echo $row['image']; ?>" alt="blog-image" class="img-fluid">
                                    </a>
                                    <div class="image-link">
                                        <a href="">Online</a>
                                        <a href="">Offer</a>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-title">
                                        <h6><a href="blog-details.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h6>
                                    </div>
                                    <p class="blog-description"><?php  
                                           $cont = $row['content'];
                                            $result = substr("$cont", 0, 80);
                                            echo $result;
                                            ?>...</p>
                                    <div class="more-blog">
                                        <a href="blog-details.php?id=<?php echo $row['id']; ?>" class="read-link">
                                            <span>Read more</span>
                                            <i class="ti-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
            <?php } ?>        <?php echo $pagination->createLinks(); ?> 
<?php 
    }else{ 
        echo '<div class="all-page">
                   <div class="page-number style-6">
					  <a>Blog(s) not found...</a>   
					 </div>
			     </div>'; 
    } 
} 
?>
                </div>
         
        <!-- Display pagination links --> 
