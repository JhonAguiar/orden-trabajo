<header>
    <div id="nav-prin"> 
        <a href="#" id="nav-link"><i class="fa fa-bars"></i></a> 
    </div>
    <div class="row text-center">
        <div class="small-12 large-offset-4 large-4 columns">
            <div class="circle-perfil" style="overflow: hidden;">
                <?php
                //echo "<img src='img/no-photo.png' alt=''>";                
                ?>
                <img src="<?php echo "img/userImg/".$_SESSION['src']; ?>" alt="" style="width: auto; height: 100%;">
            </div>
            <div class="text-prin">
                <b>Sistema de Gestión de Ordenes de Trabajo</b>
            </div>
        </div>	
    </div>
</header>