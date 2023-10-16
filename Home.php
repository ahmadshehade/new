<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Young+Serif&display=swap" rel="stylesheet">
    <style>
        body{
            background-color: whitesmoke;
            font-style:normal ;
            font-family: 'Young Serif', serif;

        }
        .mother{
            width: 100%;
            font-size: 20px;
        }
        main{
            float:left;
            border:1px solid gray;
            padding:5px;

        }
        input{
            padding:4px;
            border:2px solid black;
            text-align: center;
            font-size: 17px;
            font-family: 'Young Serif', serif;
        }
        aside{
            text-align: center;
            width: 300px;
            float:right;
            border:solid 1px black;
            padding:20px; 
            background-color: silver;
            color:wheat;
        }
        #tbl{
           width:1130px;
           font-size:20px;
           text-align: center;
        }
        td:hover{
          color: gold;
        }
        #tbl th{
            background-color: silver;
            color:black;
            font-size: 20px;
            padding: 10px;
        }
         aside button{
            width:192px;
            padding:8px;
            margin-top:7px;
            font-size: 17px;
            font-family: 'Young Serif', serif;
            font-weight: bold;


         }
    </style>
</head>
<body dir="rtl">
    <!--connect to database...#-->
    <?php
    $host='localhost';
    $user='root';
    $pass='';
    $db='student11';
    $conn=mysqli_connect($host,$user,$pass,$db);
    $res=mysqli_query($conn,"select * from student");
    #button variable
    $id='';
    $name='';
    $address='';
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['address'])){
        $address=$_POST['address'];
    }
    $sqls='';
  if(isset($_POST['add'])){
    $sqls="insert into student values($id,'$name','$address')";
    mysqli_query($conn,$sqls);
    header("location:Home.php");
  }
  if(isset($_POST['del'])){
    $sqls="delete from student where name='$name'";
    mysqli_query($conn,$sqls);
  }

    ?>
<div id="mother">
    <form method="POST">
        <!-- control pannel-->
    <aside>
<div id="div">
   <img src="https://www.freepnglogos.com/uploads/student-png/student-png-algebra-nation-30.png" alt=" Web Logo" width="200px"/>
    <h3>Manage_Photo</h3>
    <lable>std_number:</lable><br>
    <input type="text" name="id" maxlength="16" id="id" /><br>
    <lable> std_name:</lable><br>
    <input type ="text" name="name" id="name" maxlength="16" required/><br>
    <lable>Address:</lable><br>
    <input type="text" name="address" id="address" />
 <br><br>
 <button name="add">Add_std</button>
 <button name="del">del_std</button>
</div>
    </aside>
    <!-- Data of students-->
    <main>
    <table id="tbl">
     <tr>
        <th>Serial_Number</th>
        <th>Student_Name</th>
        <th>Student_Address</th>
     </tr>
     <?php
     while($row=mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<tr>";
     }
     
     ?>

    </table>
    </main>
    </form>
</div>
</body>
</html>