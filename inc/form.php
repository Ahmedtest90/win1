<?php
$FirstName =  $_POST['FirstName'];
$LastName =   $_POST['LastName'];
$Email =      $_POST['Email'];

$errors = 
[
  'FirstNameError' => '' ,
  'LastNameError' => '' ,
  'EmailError' => '' ,
];



if (isset($_POST['submit']))
{
 
  

 
//تحقق الاسم الاول
if(empty($FirstName))
{
  $errors['FirstNameError'] = 'يرجى ادخال الاسم الاول: ';
}

//تحقق الاسم الاخير
if(empty($LastName))
{
  $errors['LastNameError'] = 'يرجى ادخال الاسم الاخير: ';
}
//تحقق الايميل
if(empty($Email))
{
  $errors['EmailError'] = 'يرجى ادخال الاسم الايميل: ';
}

elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL))
{
  $errors['EmailError'] = 'يرجى ادخال الايميل الصحيح';  
}

//تحقق لايوجد اخطاء
if(!array_filter($errors))
{
  $FirstName =    mysqli_real_escape_string($conn, $_POST['FirstName']);
  $LastName =     mysqli_real_escape_string($conn, $_POST['LastName']);
  $Email =        mysqli_real_escape_string($conn, $_POST['Email']);

  $sql = "INSERT INTO users(FirstName,LastName,Email)
         VALUES ('$FirstName', '$LastName', '$Email')";

 if(mysqli_query($conn, $sql ))
 {
    header('location:' . $_SERVER['PHP_SELF']); 
 } 
  else
   {
    echo'Error: ' . mysqli_connect_error($conn);
   }
}

        
}
      