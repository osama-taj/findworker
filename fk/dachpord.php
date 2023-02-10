<?php
include 'init.php';
?>

<?php
if(isset($_POST['state'])){
    $id =$_POST['id_no'];
        if($_POST['is_active']==0)
        {
            $update = $con->prepare("update users set 
            is_active =1
		    where user_id=".$id."");
			$update->execute();
        }
        else
        {
            $update = $con->prepare("update users set 
            is_active =0
		    where user_id=".$id."");
			$update->execute();
        }
        print'<script>
          admin.style.display="none";
          user.style.display="table";
          depart.style.display="none";
          user_search.style.display="inline-flex";
          admin_search.style.display="none";
          add_depart.style.display="none";
    
        </script>';
        
}?>
<?php

if(isset($_POST['is_admin']))
{
    $id =$_POST['id_no'];
    if($_POST['admin']==0){
      $sql ="update users set is_admin =1 where user_id=".$id."";
       /* $update = $con->prepare("update users set 
        is_admin =1
        where user_id=".$id."");*/
        $con->exec($sql);}
    else{
       /* $update = $con->prepare("update users set 
        is_admin =0
        where user_id=".$id."");
    $update->execute();*/
    $sql ="update users set is_admin =0 where user_id=".$id."";
    $con->exec($sql);
  }   
}
?>
<?php
if(isset($_POST['add_depart'])){
    $name =$_POST['departName'];
    $sql="INSERT INTO depart (depart_name) VALUES('$name')";
		$con->exec($sql);
}
?>
<?php
  
  $stmt =$con->prepare("SELECT COUNT(user_id)  from users");
  $stmt->execute();
  $count_user = $stmt->fetchColumn();

  $stmt =$con->prepare("SELECT COUNT(	work_id)  from works");
  $stmt->execute();
  $count_post = $stmt->fetchColumn();
  
  $stmt =$con->prepare("SELECT COUNT(	depart_id)  from depart");
  $stmt->execute();
  $count_dpart = $stmt->fetchColumn();



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Simple Sidebar - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" >
        <style>
            .col-sm-12.col-md-4.mix.tabs {
                   float: left;
                }
                .container-fluid.main_container {
    margin-top: 40px;
}
        </style>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Find worker Dashboard </div>
                <div class="list-group list-group-flush">
                   <button onClick="dash_show()"    class="list-group-item list-group-item-action list-group-item-light p-3">
                   Dashboard</button> 
                   <button onClick="admin_show()" class="list-group-item list-group-item-action list-group-item-light p-3">
                   admins</button> 
                   <button onClick="user_show()"  class="list-group-item list-group-item-action list-group-item-light p-3">
                   users</button> 
                   <button onClick="depart_show()"  class="list-group-item list-group-item-action list-group-item-light p-3">
                   department</button> 
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid main_container">
                    <div class="col-sm-12 col-md-4 mix tabs"  >
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header"></div>
                            <div class="card-body">
                              <h5 class="card-title">posts number</h5>
                              <h4 class="card-text"><?=$count_post?></h4>
                            </div>
                          </div>
                          
                    </div>
                    <div class="col-sm-12 col-md-4 mix tabs"  >
                        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                            <div class="card-header"></div>
                            <div class="card-body">
                              <h5 class="card-title">user number</h5>
                              <h4 class="card-text"> <?=$count_user?></h4>
                            </div>
                          </div>    
                          
                    </div>
                    <div class="col-sm-12 col-md-4 mix tabs"  >
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header"></div>
                            <div class="card-body">
                              <h5 class="card-title">department number</h5>
                              <h4 class="card-text"><?=$count_dpart?></h4>
                            </div>
                          </div>
                          
                    </div>

                    <hr>

                    <div class="input-group mb-3"  id="user_search">

                        <div class="input-group-prepend">
                          <button class="btn btn-outline-secondary" type="button">search user</button>
                        </div>
                        <input type="text" class="form-control" placeholder="user" id="search_user" aria-describedby="basic-addon1">
                    </div>
                    <script> 
                    function getElementsByText(str, tag = 'h6') {
                      return Array.prototype.slice.call(
                     document.getElementsByTagName(tag)).filter(el => el.textContent.trim().search(str.trim()) >= 0  );     
                     }
                     function getdiv(ser){
                          $('.userR').css( 'display', 'none' );
                          $(getElementsByText(ser, 'h6')).parent().parent().css( 'display', 'table-row' ); 
                                          }
                              document.getElementById('search_user').onkeyup = function (){  getdiv(this.value) }
                     </script>
            
                        <!--###############################################-->
                    <table class="table table-striped" id="tuser">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">address</th>
                            <th scope="col">phone</th>
                            <th scope="col">state</th>
                            <th scope="col">is admin</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                      $all_user = getAllFrom("*", 'users', NULL,  NULL, 'user_id');
                      foreach( $all_user as $user){?>
                          <tr class="userR">
                            <th scope="row"><?=$user['user_id']?> </th>
                            <td><h6><?=$user['user_name']?></h6> </td>
                            <td><?=$user['Email']?> </td>
                            <td><?=$user['addresstion']?> </td>
                            <td><?=$user['phone']?> </td>
                            <td> <form action="" method="post"> 
                                <?php if($user['is_active']==0){
                                        print '<button type="submit" name="state" class="btn btn-success">disable</button>';
                                }
                                else{
                                    print '<button type="submit" name="state" class="btn btn-danger">ansable</button>';
                                }
                                ?>
                                <input type="hidden" name="id_no" value="<?php echo $user['user_id']; ?>">
                                <input type="hidden" name="is_active" value="<?php echo $user['is_active']; ?>">
                                </form>
                            </td>
                            <td><form action="" method="post">
                                <?php 
                                    if($user['is_admin'] == 1){
                                        print'<button type="submit"  name="is_admin" class="btn btn-success"> disable</button>';
                                    }
                                    else
                                    {print'<button type="submit"  name="is_admin" class="btn btn-danger"> ansable</button>';}
                                ?>
                                <input type="hidden" name="id_no" value="<?php echo $user['user_id']; ?>">
                                <input type="hidden" name="admin" value="<?php echo $user['is_admin']; ?>">    
                            </form></td>
                          </tr>
                          <?php   }?>
                        </tbody>
                      </table>
                       <hr>

                      <!---####################-->
                      <div class="input-group mb-3" id="admin_search">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-secondary" type="button">search admin</button>
                        </div>
                        <input type="text" class="form-control" placeholder="admin" id="search_admin" aria-describedby="basic-addon1">
                    </div>
                    <script> 
                   
                    function getdivv(ser){
                          $('.adminR').css( 'display', 'none' );
                          $(getElementsByText(ser, 'h6')).parent().parent().css( 'display', 'table-row' ); 
                                          }
                              document.getElementById('search_admin').onkeyup = function (){  getdivv(this.value) }
                     </script>
                   

                    <table class="table table-striped" id="tadmin">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">name</th>
                          <th scope="col">Email</th>
                          <th scope="col">phone</th>
                          <th scope="col">state</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $all_admin = getAllFrom("*", 'users', "where is_admin = 1",  NULL, 'user_id');
                      foreach( $all_admin as $admin){?>
                        <tr class="adminR">
                          <th scope="row"><?=$admin['user_id']?></th>
                          <td><h6><?=$admin['user_name']?></h6></td>
                          <td><?=$admin['Email']?></td>
                          <td><?=$admin['phone']?></td>
                          <td><form action="" method="post">
                                <?php 
                                    if($user['is_admin'] == 1){
                                        print'<button type="submit"  name="is_admin" class="btn btn-success"> disable</button>';
                                    }
                                    else
                                    {print'<button type="submit"  name="is_admin" class="btn btn-danger"> ansable</button>';}
                                ?>
                                <input type="hidden" name="id_no" value="<?php echo $admin['user_id']; ?>">
                                <input type="hidden" name="admin" value="<?php echo $admin['is_admin']; ?>">    
                            </form></td>
                          <td></td>
                        </tr>
                       <?php }?>
                      </tbody>
                    </table>
                    <hr> 
                    <!--#######################-->
                    <div class="input-group mb-3" id="add_depart">
                        <div class="input-group-prepend">
                            <form action="" method="post">
                          <button class="btn btn-outline-secondary" type="submit" name="add_depart">add department</button>
                        </div>
                        <input type="text" class="form-control" placeholder="" name="departName" aria-describedby="basic-addon1">
                            </form>
                    </div>

                    <table class="table table-striped" id="tdepart">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">depart name</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                $all_depart = getAllFrom("*", 'depart', NULL,  NULL, 'depart_id');

            foreach( $all_depart as $dep){?>
                        <tr>
                          <th scope="row"><?=$dep['depart_id']?></th>
                          <td><?=$dep['depart_name']?></td>
                        </tr>
                       <?php }
                       ?>
                      </tbody>
                    </table>


                </div>  
                </div>
            </div>
        </div>

        <script>
          var user =document.getElementById("tuser");
          var admin =document.getElementById("tadmin");
          var depart =document.getElementById("tdepart");
          var user_search =document.getElementById("user_search");
          var admin_search =document.getElementById("admin_search");
          var add_depart =document.getElementById("add_depart");

            window.onload=function(){
                admin.style.display="none";
                user.style.display="none";
                depart.style.display="none";
                user_search.style.display="none";
                admin_search.style.display="none";
                add_depart.style.display="none";
          };
            function user_show(){
                admin.style.display="none";
                user.style.display="table";
                depart.style.display="none";
                admin_search.style.display="none";
                add_depart.style.display="none";
                user_search.style.display="inline-flex";
            }
            function admin_show(){
                admin.style.display="table";
                user.style.display="none";
                depart.style.display="none";
                user_search.style.display="none";
                add_depart.style.display="none";
                admin_search.style.display="inline-flex";
            }
            function dash_show(){
              admin.style.display="none";
                user.style.display="none";
                depart.style.display="none";
                user_search.style.display="none";
                admin_search.style.display="none";
                add_depart.style.display="none";
            }
            function depart_show(){
              depart.style.display="table";
              admin.style.display="none";
              user.style.display="none";
              user_search.style.display="none";
              admin_search.style.display="none";
              add_depart.style.display="inline-flex";

            }



        </script>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

       


    </body>
</html>
