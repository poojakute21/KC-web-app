<nav class="navbar navbar-expand-lg navbar1">
<a class="navbar-brand" href="#"><img src="images/logo.png" height="50" width="100"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../dashboard/dashboard.php">Dashboard<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Volunteer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Scheduling</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Delivery</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo WEBSITE . "main.php?page=admin/channel/channel"; ?>">Channel Types</a>
          <a class="dropdown-item" href="<?php echo WEBSITE . "main.php?page=admin/documenttype/documenttype"; ?>">Document Types</a>
          <a class="dropdown-item" href="<?php echo WEBSITE . "main.php?page=admin/requesttype/requesttype"; ?>">Request Types</a>
          <a class="dropdown-item" href="<?php echo WEBSITE . "main.php?page=admin/requeststatus/requeststatus"; ?>">Request Statuses</a>
          <a class="dropdown-item" href="<?php echo WEBSITE . "main.php?page=admin/roles/roles"; ?>">Roles</a>
          <a class="dropdown-item" href="<?php echo WEBSITE . "main.php?page=admin/volunteers/volunteers"; ?>">Volunteers</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav navbar-right">
      <li class="nav-item" style="float:right;">
        <a class="nav-link" href="login/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
