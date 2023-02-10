<?php
include 'init.php';
?>


<!-- Jumbotron -->
<div class="p-5  bg-light" id="main-content" style="margin-top: 58px">
    <div class="row">

        <div class="col-12">
        <div class="row d-flex justify-content-center" style=" width: 100%; ">
            <div class="col-md-4">
            <form class="form-inline search-box " id="form-search">
        <input class="form-control mr-sm-2" id="search" type="search" placeholder="search here  ..." aria-label="Search">
             </form>
            </div>
        </div>
        </div>
        <div class="col-3" id="sidebar" >
            
            <!-- Tab navs -->
            <div class="nav shuffle flex-column nav-tabs text-center" >
            <a class="nav-link active  control" data-filter="all">all</a>

           
            <!--print the ctatogre from the database -->
            <?php 
                $all_depart = getAllFrom("*", 'depart', NULL,  NULL, 'depart_id');

            foreach( $all_depart as $dep){?>
                <a class="nav-link  control"  data-filter=".tabs<?=$dep['depart_id']?>" > <?=$dep['depart_name']?></a>
         <?php   }
            ?>


            </div>
            <!-- Tab navs -->
        </div>

        <div class="col-9" class="sidebar__inner" >
            <!-- Tab content -->
            <div class="tab-content"  >
                <div class="tab-pane fade show active" >
                    <section class="  d-flex justify-content-center mb-4">
                    <div class="container" id="Container">
            
            <div class="row">
            <?php 
               //print all works for all user
                $all_works=fromAll("where deletetion = 0");
               // $all_works = getAllFrom("*", 'works', NULL,  NULL, 'work_id');
               
            foreach( $all_works as $work){?>

                <div class="col-sm-12 col-md-6 mix tabs<?=$work['work_depart_id']?>" >
                    <div class="iq-blog-box">
                        <div class="iq-blog-image clearfix">
                            <img class="img-responsive center-block" style="    height: 262px; display: block;
                             margin-left: auto; margin-right: auto;" src="<?=$workimg_dir.  $work['work_pic']?>" alt="#">
                        </div>
                        <div class="iq-blog-detail">
                            <div class="blog-title"> <a href="#"><h5 class="iq-tw-6"><?=$work['work_topping']?></h5> </a> </div>
                            <div class="iq-blog-meta">
                                <ul class="list-inline">
                                    <li><a href="#"> <?=$work['work_date']?></a></li>
                                </ul>
                            </div>
                            <div class="blog-content">
                                <p class="describe" style="width: 100%; height: 72px; overflow: auto; background-color: #3d28280a; text-align: center;"> <?=$work['work_describe']?></p>
                            </div>
                            <hr>
                            <div class="blog-button" style="padding-bottom: 10px;" >
                                <div class="pull-left iq-tw-6 iq-user">
                                    <div class="imge" style=" background-image: url(<?=$profile_dir. $work['pic']  ?>); ">
                                    </div>
                                    <h5 class="name" style="display: inline;"><?=$work['user_name']?> </h5>
                                </div>
                                <a href="profile.php?id=<?=$work['user_id']?>" class="pull-right iq-tw-6 btn btn-outline-primary" style="    color: #212529;" >  more works </a> </div>
                        </div>
                    </div>
                </div>
              
                
         <?php   }
            ?>
            </div>
        </div>

                    </section>
                </div>


            </div>
            <!-- Tab content -->
        </div>
    </div>
</div>
<!-- Jumbotron -->


<?php

include $tpl . 'footer.php';

?>
<!--stick said par -->
<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/js/sticky-sidebar.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    $("#sidebar, #content").theiaStickySidebar({
      additionalMarginTop: 30,
      topSpacing: 70,
    })
});
	</script>



