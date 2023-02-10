<?php

include 'init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <title>profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    
    	body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

.iq-blog-box {
    background: #FFF;
    box-shadow: 0px 6px 16px 0px rgb(0 0 0 / 6%);
    margin-bottom: 20px;

}

.iq-blog-detail {
    padding: 0 10px;
}

a:hover{
text-decoration: none;

}
.delete {
    
}
.delete:hover {
    color: #f00;
}






    </style>
</head>
<body>
<div class="container">
    <div class="main-body">
    
          
          <!-- /Breadcrumb -->
    
        <?php
         $all_works = getAllFrom("*", 'users', ' where user_id='.$_GET['id'].'',  NULL, 'user_id');
           foreach( $all_works as $info){}
        ?>



          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?=$profile_dir. $info['pic']  ?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?=$info['user_name']?></h4>
                    
                      <p class="text-muted font-size-sm"><?=$info['describetion']?></p>

                      <?php if(isset($_SESSION['ID'])){
                      if($_GET['id']==$_SESSION['ID']){
                          print '<a href="uploadWork.php" class="btn btn-primary"> 
                       post new work </a>';} }?>
                     
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?=$info['user_name']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?=$info['Email']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?=$info['phone']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?=$info['addresstion']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Knowledge</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?=$info['Knowledge']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                    <?php if(isset($_SESSION['ID'])){
                      if($_GET['id']==$_SESSION['ID']){
                          print '
                      <a class="btn btn-info "  href="editProfile.php">Edit</a>';}}?>
                    </div>
                  </div>
                </div>
              </div>

              
              


              </div>

              <?php 
               
                $all_works=fromAll('where works.user_id='.$_GET['id'].'');
               // $all_works = getAllFrom("*", 'works', NULL,  NULL, 'work_id');

            foreach( $all_works as $work){?>

                <div class="col-sm-12 col-md-4 mix tabs<?=$work['work_depart_id']?>" >
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
                                <p style="width: 100%; height: 72px; overflow: auto; background-color: #3d28280a; text-align: center;"> <?=$work['work_describe']?></p>
                            </div>
                            <hr>
                            <div class="blog-button" style="padding-bottom: 10px">
                                <div class="pull-left iq-tw-6 iq-user">
                                    <div class="imge" style=" background-image: url(<?=$profile_dir. $work['pic']  ?>); ">
                                    </div>
                                    <span><?=$work['user_name']?> </span>
                                </div>
                                <?php if(isset($_SESSION['ID'])){
                                if($_GET['id']==$_SESSION['ID']){
                                   print '
                                <a href="deleteWork.php?id='.$work['work_id'].'" class="pull-right iq-tw-6 delete btn btn-outline-danger" > delete   </a> ';}
                                }?>
                                </div>
                        </div>
                    </div>
                </div>
               
                
         <?php   }
            ?>

           
          
        
        





            </div>
          </div>

        </div>
    </div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>