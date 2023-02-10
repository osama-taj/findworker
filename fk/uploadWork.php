<?php
include 'init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>upload work</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<style>

    body {
    margin: 0;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff;
}
    h1 {
  font-size: 20px;
  margin-top: 24px;
  margin-bottom: 24px;
}

    img {
height: 40px;
}

    .form-group {
    margin-bottom: 1rem;
}
    .form-control {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
    .btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
    .btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
    .col-md-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
}
    .offset-md-3 {
    margin-left: 25%;
}
    .mt-5, .my-5 {
    margin-top: 3rem!important;
}



    </style>
</head>
<body>
    

   <div class="col-md-6 offset-md-3 mt-5">
       
        <br>
        
        <h1> upload Work</h1>
        <form  action="upload.php" method="POST" enctype="multipart/form-data" >
          <div class="form-group">
            <label for="exampleInputName">Work topic</label>
            <input type="text" name="jobtitle" class="form-control" 
            placeholder="" required="required">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" required="required">Describ</label>
            <input type="text" name="describtion" class="form-control" 
              placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" required="required">date</label>
            <input type="date" name="data_of_work" class="form-control" 
              placeholder="">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Work type</label>
            <select class="form-control" id="serchdepart" name="works" required="required">
              
                <option>-- select depart of the work --</option>
                <?php
                 $all_depart = getAllFrom("*", 'depart', NULL,  NULL, 'depart_id');
                 foreach( $all_depart as $dep)
                   {
                       print"<option value='$dep[depart_id]'> $dep[depart_name]</option>";
                   }
           
                  ?>
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
               <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
                 <script>
                 $("#serchdepart").chosen();
                 </script>

            </select>
          </div>
          <hr>
          <div class="form-group mt-3">
            <label class="mr-2">Upload pic of the work:</label>
            <input type="file" name="fileToUpload" required="required">
          </div>

          



          <hr>
          <button type="submit" name="submit" class="btn btn-primary">POST</button>
        </form>
    </div> 
    

</body>
</html>