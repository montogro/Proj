<?php 

session_start();
    include "db_conn.php";
    if(isset($_SESSION['id_users']) && isset($_SESSION['login'])){
 
// Fetch records from database 
$sql = "SELECT * FROM users WHERE ID_users LIKE '".$_SESSION['id_users']."';"; 
$result = mysqli_query($conn, $sql);
 
    $delimiter = ","; 
    $filename = "members-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Twoje ID w bazie danych', 'Twój pojazd'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $result->fetch_assoc()){ 
        $lineData = array($row['ID_users'], $row['vehicle']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 

//header("Location: my_info.php");
exit; 
}
else{
    header("Location: index.php");
    exit(); 
}
 
?>