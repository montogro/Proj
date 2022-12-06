<?php
    include "db_conn.php";
    include "employee_management.php";
    if(isset($_SESSION['id_admin']) && isset($_SESSION['login'])){
    
?>

<form id="search_form" action="delete_employee.php" method="POST">
                <input type="hidden" name="id_element" value="<?php echo $_POST['id_element']; ?>">
                <br>
                <button id='modyfikuj' type='submit' name='submit'>Potwierdź usunięcie</button>
<?php

if(isset($_POST['submit'])){
    $sql = "DELETE FROM employees WHERE ID_employees LIKE ".$_POST['id_element'].";";
    $result = mysqli_query($conn, $sql);
    header("Location: employee_management.php?fine=Pomyślnie usunięto pracownika");
    exit();
}
?>
</form>
<?php
}
else{
    header("Location: index.php");
    exit(); 
}

?>