<?php if($_SERVER["SCRIPT_NAME"] == "/workflowmanagement/sidebar.php"){
 header("location: index.php");
}

?>
<div class="offcanvas offcanvas-start sidebar-navbar bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  


  <div class="offcanvas-body p-0">
    <nav class="navbar-dark">
      <ul class="navbar-nav"> 
        <li>
          <div class="text-muted small fw-bold text-uppercase px-3 ">
            CORE
          </div>
        </li>
        <li>
          <a href="index.php" class="nav-link px-3 active">
            <span class="me-2">
            <i class="bi bi-house"></i>
            </span>
            <span>Home</span>
          </a>
        </li>
        <li>
          <a href="profile.php" class="nav-link px-3 active">
            <span class="me-2">
            <i class="bi bi-person-square"></i> 
            </span>
            <span>PROFILE</span>
          </a>
        </li>
        <li class="my-4">
          <hr class="dropdown-divider" style="color:white;" />
        </li> 
        <li>
          <div class="text-muted small fw-bold text-uppercase px-3 ">
            DASHBOARD
          </div>
        </li>
        <li>
        <a class="nav-link px-3 sidebar-link " data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        <span class="me-2">
            <i class="bi bi-layout-split"></i>
            </span>
            <span>Projects</span> 
            <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>       
          </a>
        <div class="collapse" id="collapseExample">
        <div>
          <ul class="navbar-nav ps-3 ">
            <li>
              <a href="new_tasks.php" class="nav-link px-3">
              <span class="me-2">
              <i class="bi bi-cloud-plus-fill"></i>
            </span>
            <span>New Task</span> 
              </a>
            </li>
            <!-- <li>
              <a href="viewtask.php" class="nav-link px-3">
              <span class="me-2">
              <i class="bi bi-view-list"></i>
            </span>
            <span>View Tasks</span> 
              </a>
            </li> -->
          </ul>
        </div>
      </div>
        </li>
        <li class="my-4">
          <hr class="dropdown-divider" style="color:white;" />
        </li> 
        <li>
          <div class="text-muted small fw-bold text-uppercase px-3 ">
            Contacts
          </div>
        </li>
        <li>
          <a class="nav-link px-3 sidebar-link " data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
          <span class="me-2">
              <i class="bi bi-layout-split"></i>
              </span>
              <span>Team</span> 
              <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>       
            </a>
          <div class="collapse" id="collapseExample1">
          <div>
            <ul class="navbar-nav ps-3 ">
              <li>
                <a href="find_users.php" class="nav-link px-3">
                <span class="me-2">
                <i class="bi bi-cloud-plus-fill"></i>
              </span>
              <span>Add Team Mates</span> 
                </a>
              </li>
              <li>
                <a href="viewTeam.php" class="nav-link px-3">
                <span class="me-2">
                <i class="bi bi-view-list"></i>
              </span>
              <span>Show Team Mates</span> 
                </a>
              </li>
            </ul>
          </div>
        </div>
          </li>
      </ul>
    </nav>
  </div>
</div>