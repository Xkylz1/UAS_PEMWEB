<!-- content -->
<div class="container">
    <div class="row">
        <!-- main content -->
        <div class="col-md-9 content">
        <?php
            if ($pageinfo == "Biography"){
                include("content-bio.php");
            }elseif($pageinfo == "Biography Form"){
                include("content-bio-form.php");
            }elseif($pageinfo == "Portfolio"){
                include("content-porto.php");
            }elseif($pageinfo == "Portfolio Form"){
                include("content-porto-form.php");
            }elseif($pageinfo == "Login"){
                include("content-login.php");
            }
        ?>
        </div>
        <!-- sidebar content -->
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>
    </div>
</div>
<!-- end of content -->