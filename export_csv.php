<?php 

session_start();
    include "db_conn.php";
    if(isset($_SESSION['id_users']) && isset($_SESSION['login'])){
 
// Wydobycie rekordów z bazy danych
$sql = "SELECT * FROM users WHERE ID_users LIKE '".$_SESSION['id_users']."';"; 
$result = mysqli_query($conn, $sql);
 
    $delimiter = ","; 
    $filename = "dane-klienta_" . date('Y-m-d') . ".csv"; 
     
    // Utworzenie wskaźnika do pliku
    $f = fopen('php://memory', 'w');
     
    // Ustawienie nagłówków kolumn
    $fields = array('Twoje ID w bazie danych', 'Twoj pojazd'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Wypisanie każdego wiersza danych, jego formatowanie jako csv oraz dopisanie do wskaźnika pliku
    while($row = $result->fetch_assoc()){ 
        $lineData = array($row['ID_users'], $row['vehicle']);
        fputcsv($f, $lineData, $delimiter);
    } 
     
    // Powrót do początku pliku
    fseek($f, 0); 
     
    // Ustawienie nagłówków do pobrania
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //Wypisanie pozostałych plików we wskaźniku pliku
    fpassthru($f); 

//header("Location: my_info.php");
exit; 
}
else{
    header("Location: index.php");
    exit(); 
}
 
?>