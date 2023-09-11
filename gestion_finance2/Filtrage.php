<?php
// Récupérer les dates à partir de la méthode POST
$dateDebut = $_POST['date_debut'];
$dateFin = $_POST['date_fin'];

// Vérifier si les dates ont été fournies
if (isset($dateDebut) && isset($dateFin)) {
    // Connexion à la base de données (à personnaliser avec vos informations de connexion)
    $host = 'localhost';
    $db = 'gestion_finance';
    $user = 'root';
    $password = '';

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);

    // Préparer la requête SQL pour récupérer les éléments entre les deux dates
    $sql = "SELECT * FROM transaction WHERE trans_date BETWEEN :date_debut AND :date_fin";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':date_debut', $dateDebut);
    $stmt->bindParam(':date_fin', $dateFin);

    // Exécuter la requête SQL
    $stmt->execute();

    // Récupérer les résultats
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les résultats
    foreach ($resultats as $row) {
        // Faites quelque chose avec les résultats (par exemple, les afficher)
        echo "ID : " . $row['id'] . "<br>";
        echo "trans_description : " . $row['trans_description'] . "<br>";
        echo "trans_date : " . $row['trans_date'] . "<br>";
        echo "montant : " . $row['montant'] . "<br>";
        echo "trans_type : " . $row['trans_type'] . "<br>";
        echo "destinateur : " . $row['destinateur'] . "<br>";
        echo "deleted : " . $row['deleted'] . "<br>";
        echo "categorie_id : " . $row['categorie_id'] . "<br>";
        echo "compte_id : " . $row['compte_id'] . "<br>";

        // Ajoutez d'autres colonnes au besoin
        echo "<br>";
    }

    // Fermer la connexion à la base de données
    $pdo = null;
} else {
    echo "Veuillez fournir les deux dates.";
}
?>
