<?php

require 'config.php';

$get_page = filter_input(INPUT_GET, 'page');

$page = (!empty($get_page)) ? $get_page : "dashboard\dashboard";

$page = strtolower($page) .".php";

if(file_exists($page)): require ABSPATH . $page; ?>

<?php else: ?>

    <p><b>404.</b>&nbsp; <span class="text-muted">That's an error.</span></p>
    <p>The requested URL was not found on this server.</p>
    <p><b><a href="<?php echo WEBSITE . "index.php?page=". core_encrypt("dashboard\dashboard"); ?>">click here</a></b> to load home page.</p>

<?php endif; ?>