<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                              <?php $query=mysqli_query($con,"select email from admin where email='".$_SESSION['alogin']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
                  <p class="centered"><a href="">

</a>
</p>
 
                  <h5 class="centered"><?php echo htmlentities($row['email']);?></h5>
                  <?php } ?>
                    	
							<li>
								<a href="manage-users.php">
									<i class="menu-icon icon-group"></i>
									Manage users
								</a>
							</li>
                            
						</ul>

					</div><!--/.sidebar-->
				
 </aside>