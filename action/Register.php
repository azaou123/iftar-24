<?php
include 'Database.php';

$db = Database::getInstance();
$conn = $db->getConnection();

// Other form fields
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$cne = $_POST["cne"];
$appogee = $_POST["appogee"];
$cin = $_POST["cin"];
$adresse_parents = $_POST["adresse_parents"];
$adresse_actuel = $_POST["adresse_actuel"];
$location = $_POST["location"];
$cite = $_POST["cite"];
$etat_bourse = $_POST["etat_bourse"];
$adresse_email = $_POST["adresse_email"];
$telephone = $_POST["telephone"];
$orphelin = $_POST["orphelin"];
$nb_membres_famille = $_POST["nb_membres_famille"];
$agreement = isset($_POST["agreement"]) ? 1 : 0;

// File upload handling for 'photo' field
$uploadDir = '../uploads/students/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
} // Specify the directory where you want to store the uploaded files
$uploadFile = $uploadDir . basename($_FILES['photo']['name']);

if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
    $sql = "INSERT INTO students (nom, prenom, cne, appogee, cin, adresse_parents, adresse_actuel, location, cite, etat_bourse, adresse_email, telephone, photo, orphelin, nb_membres_famille, agreement)
        VALUES ('$nom', '$prenom', '$cne', '$appogee', '$cin', '$adresse_parents', '$adresse_actuel', '$location', '$cite', '$etat_bourse', '$adresse_email', '$telephone', '$uploadFile', '$orphelin', '$nb_membres_famille', '$agreement')";
    if ($conn->query($sql) === TRUE) {
        echo "Application submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} 
else {
    echo "Upload failed.\n";
}

// Insert data into the database


$conn->close();
?>
