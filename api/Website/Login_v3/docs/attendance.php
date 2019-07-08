<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Teacher's Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
     <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html"></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
        <li><a class="app-menu__item" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="studentDetails.php"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Student Details</span></a>
        </li>
        <li><a class="app-menu__item" href="attendance.php"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Attendance</span></a>
        </li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Student Attendance</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="container">

<br/>
<br/>
<br/>
<br/>
  <h2>Student Attendance</h2>
  <p>Update student attendance:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>RollNo</th>
        <th>Branch</th>
        <th>Lectures Attended</th>
        <th>Extra Attendence</th>
        <th>Total Attendance</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php

          $connection = mysqli_connect('Localhost' , 'id10093143_inara' ,'@gnels2017' ,'id10093143_biometricattendance');
      
          $sql = "SELECT * FROM attendance19_20";
          $result  = mysqli_query($connection ,$sql);

          while($row  = mysqli_fetch_array($result)){ ?>
              <tr id="<?php echo $row['RollNo']; ?>">
                <td data-target="RollNo"><?php echo $row['RollNo']; ?></td>
                <td data-target="BranchID"><?php echo $row['BranchID']; ?></td>
                <td data-target="Lectures"><?php echo $row['Lectures']; ?></td>
                <td data-target="extraAttendance"><?php echo $row['extraAttendance']; ?></td>
                <td data-target="totalAttendance"><?php echo $row['totalAttendance']; ?></td>
                <td><a href="#" data-role="update" data-id="<?php echo $row['RollNo'] ;?>">Update</a></td>
              </tr>
         <?php }
       ?>
       
    </tbody>
  </table>

  
</div>

    <!-- Modal -->
    <div id="justWorkAlready">
      <div id="myModal" class="modal fade in" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Roll No</label>
                <input type="text" id="RollNo" class="form-control">
              </div>
              <div class="form-group">
                <label>Branch ID</label>
                <input type="text" id="BranchID" class="form-control">
              </div>

               <div class="form-group">
                <label>Lectures</label>
                <input type="text" id="Lectures" class="form-control">
              </div>
              <div class="form-group">
                <label>Extra Attendance</label>
                <input type="text" id="extraAttendance" class="form-control">
              </div>
                <input type="hidden" id="userId" class="form-control">


          </div>
          <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>



    </div>
    
              <!-- From: <input type="text" name="fromRoll" id = "fromRollID">
              To: <input type="text" name="toRoll" id = "toRollID">
              <input type="submit" name="getStudentDataBtn" id="getStudentDataBtnID">
              <div id="studentTableDiv">
              <table>
               <thead>
                <th>RollNo</th> 
                <th>BranchID</th> 
                <th>Name</th>
                <th>EmailID</th>
                <th>Password</th>
                <th>PhoneNo</th>
                <th> </th>
               </thead>
               <tbody id="tbodyStudent">
                 
               </tbody>
                  </table>

              </div> -->
              

            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
    </script>

    <script>
  $(document).ready(function(){
      $(document).on('click','a[data-role=update]',function(){

            var RollNo  = $(this).data('RollNo');
            var BranchID  = $('#'+RollNo).children('td[data-target=BranchID]').text();
            var Lectures  = $('#'+RollNo).children('td[data-target=Lectures]').text();
            var extraAttendance  = $('#'+RollNo).children('td[data-target=extraAttendance]').text();

            $('#RollNo').val(RollNo);
            $('#BranchID').val(BranchID);
            $('#Lectures').val(Lectures);
            $('#extraAttendance').val(extraAttendance);
            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database 

       $('#save').click(function(){
          var RollNo  = $('#RollNo').val(); 
          var BranchID =  $('#BranchID').val();
          var Lectures =  $('#Lectures').val();
          var extraAttendance =   $('#extraAttendance').val();

          $.ajax({
              url      : 'connectionAttendance.php',
              method   : 'post', 
              data     : {RollNo : RollNo , BranchID: BranchID , Lectures : Lectures , extraAttendance: extraAttendance},
              success  : function(data){
                            // now update user record in table 
                             $('#justWorkAlready').html(data);
                             $('#myModal').modal('toggle'); 

                         }
          });
       });
  });
</script>

   <!--  <script type="text/javascript">
      $('#getStudentDataBtnID').click(function(){
        var fromData = $('#fromRollID').val();
        var toData = $('#toRollID').val();
        $.ajax({
          url: 'displayStudentTable.php',
          data: {fromData: fromData, toData: toData},
          type: 'POST',
          success: function(data) {
            $('#tbodyStudent').html(data);

          }
        });
        function editRecord()
                {

                  var RollNo = $('#RollNo').val();
                  var BranchID = $('#BranchID').val();
                  var Name = $('#Name').val();
                  var EmailID = $('#EmailID').val();
                  var Password = $('#Password').val();
                  var PhoneNo = $('#PhoneNo').val();

                  $.ajax(
                  {
                    url: 'addEditsStudent.php',
                    type: 'POST',
                    data: {
                        RollNo: RollNo,
                      BranchID: BranchID,
                      Name: Name,
                      EmailID: EmailID,
                      Password: Password,
                      PhoneNo: PhoneNo
                    },
                    success: function(data)
                    {
                      $('#tbodyStudent').html(data)
                    }
                  });
                }
      });
    </script>
    <script type="text/javascript">
              
              
    </script>
 -->
  <!--   <script type="text/javascript">
      
      $('#submitEditsID').click(function()
      {
        $.ajax(
        {
          url: 'addEditsStudent.php',
          type: 'POST',
          success: function(data)
          {
            $('#tbodyStudent').html(data)
          }
        });
      });

    </script> -->
  </body>
</html>
              


