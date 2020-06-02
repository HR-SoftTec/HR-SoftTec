
<?php


$id = $_SESSION['id'];
if ($id == null) {
    header("Location:index.php");
}


$user_access_level = $_SESSION['user_access_level'];




    
    require 'db_connect.php';
    
    $sql="SELECT * FROM tbl_client_information WHERE deletion_status=1";
    
    if(mysqli_query($con, $sql)){
        $query_result=mysqli_query($con, $sql);
       
        
    } else {
    die('query problem'. mysqli_error($con));    
    }
    
    
   if (isset($_GET['btn'])) {
    require 'db_connect.php';
    
    $date_formate= time();
    $date_d= date("d",$date_formate);
    $date_m= date("m",$date_formate);
    $date_Y= date("Y",$date_formate);
    $date="0".($date_d-1)."-".$date_m."-".$date_Y;
      $sql = "UPDATE tbl_current_date SET today_date='$date'";
    if (mysqli_query($con, $sql)) {


      
   
    } else {
        die('query problem' . mysqli_error($con));
    }
       
  
 
                                        
                                      
   
    
 
}
    
    


?>

<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">

                <div class="info">
                    <a data-toggle="collapse" class="active btn" href="#collapseExample" aria-expanded="true">
                        <span>

                            <span class="user-level"><img src="assets/Fontent_assets/logoImage/logo_j.png"></span>
                             <h5>Bismillah Enterprise</h5>

                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">

                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                
                <?php if($user_access_level == 1) { ?>
                   <li class="nav-item active">
                    <a href="TheOwnerInfo.php?btn=click" class="btn"  aria-expanded="false">
                       <i class="fas fa-lock-open"></i>
                        <p>Administrator Access</p>

                    </a>
                </li>
                <?php } else {?>
                  <li class="nav-item active">
                    <a href="TheOwnerInfo.php" class="btn"  aria-expanded="false">
                      <i class="fas fa-lock"></i>
                     <button class="btn btn-primary" disabled="disabled">Administrator Access</button>

                    </a>
                </li>
                
                <?php }?>
                <li class="nav-item active">
                    <a href="product_order.php" class="btn"  aria-expanded="false">
                        <i class=fas fa-layer-group"></i>
                        <p>Products Order</p>

                    </a>
                </li>

                <li class="nav-item active">



                    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Client Information</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                              <?php while ($client_info= mysqli_fetch_assoc($query_result)) {?>
                            <li>
                                <a href="client_information.php?client_id=<?php echo $client_info['client_name']; ?>"">
                                    <span class="sub-item"><?php echo $client_info['client_name'];?></span>
                                </a>
                            </li>
                              <?php } ?>
                          
                       
                          
                        </ul>
                    </div>
                    
                    
                    
                    
                </li>
                 <li class="nav-item active">
                    <a href="billing_information.php" class="btn"  aria-expanded="false">
                        <i class=fas fa-layer-group"></i>
                        <p>Billing Information</p>

                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-desktop"></i>
                        <p>Base</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                           
                            <li>
                                <a href="components/typography.html">
                                    <span class="sub-item">Typography</span>
                                </a>
                            </li>
                           
                            <li>
                                <a href="components/typography.html">
                                    <span class="sub-item">Typography</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
               
              
               
                <li class="nav-item">
                    <a data-toggle="collapse" href="#charts">
                        <i class="far fa-chart-bar"></i>
                        <p>Charts</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="charts/charts.html">
                                    <span class="sub-item">Chart Js</span>
                                </a>
                            </li>
                            <li>
                                <a href="charts/sparkline.html">
                                    <span class="sub-item">Sparkline</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="message.php">
                        <i class="fas fa-layer-group"></i>
                        <p>Message</p>
                        <span class="badge badge-success">online</span>
                    </a>
                </li>
               
                <li class="mx-4 mt-2">
                    <a href="Add_Information.php" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fa fa-layer-group"></i> </span>ADD +</a> 
                </li>
            </ul>
        </div>
    </div>
</div>