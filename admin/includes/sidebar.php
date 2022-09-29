<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
             
                  <li class="sub-menu">
                      <a href="" >
                          <!-- <i class="fa fa-book"></i> -->
                          <!-- <span>Account Setting</span> -->
                      </a>
                    </li><li class="sub-menu"> 
						<a href="">
                          <!-- <i class="fa fa-book"></i> -->
                          <!-- <span>Account Setting</span> -->
                      </a>
                    </li>
					<?php $query=mysqli_query($con,"select email from admin where email='".$_SESSION['alogin']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>  
 <h5 class="centered"><?php echo htmlentities($row['email']);?> </h5>
                  <?php } ?>
                  <li class="mt">
                      <a href="dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  

                  <li class="sub-menu">
                      <a href="manage.php" >
                          <i class="fa fa-book"></i>
                          <span>Manage users</span>
                      </a>
                    </li>
                 
                 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>