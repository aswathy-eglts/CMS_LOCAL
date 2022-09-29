<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                              <?php $query=mysqli_query($con,"select firstName,lastName from customer where email='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>  
                   <li class="mtt">
                      <a href="">
                          <i class=""></i>
                          <span></span>
                      </a>
                  </li>
                  
                  <li class="mtt">
                      <a href="">
                          <i class=""></i>
                          <span></span>
                      </a>
                  </li>
                  <a href="profile.php"><h5 class="centered"><?php echo htmlentities($row['firstName']);?> <?php echo htmlentities($row['lastName']);?></h5></a>
                  <?php } ?>
                  <li class="mt">
                      <a href="dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="profile.php" >
                          <i class="fa fa-book"></i>
                          <span>Account Setting</span>
                      </a>
                    </li>
                  <li class="sub-menu">
                      <a href="register-complaint.php" >
                          <i class="fa fa-book"></i>
                          <span>Lodge Complaint</span>
                      </a>
                    </li>
                  </li>
                  <li class="sub-menu">
                      <a href="complaints-history.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Complaint History</span>
                      </a>
                      
                  </li>
                 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>