<?php
$title = strtoupper($todoObject->title);
echo <<<EOT
<div class="card" style="margin-top: 20px;">
    <div class="card-body">
    <h5 class="card-title"><span class="badge badge-$badge">$priority</span> $title</h5>
    <p class="card-text">$todoObject->description</p>
    </div>
    <div class="card-footer">
    </div>
</div>
EOT;
?>