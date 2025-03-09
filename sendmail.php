<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Destinatario e oggetto dell'email
    $to = "carlinogiovanni04@gmail.com";
    $subject = "Messaggio dal portfolio";

    // Recupera e pulisci i dati inviati
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Preparazione del corpo dell'email
    $email_content  = "Nome: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Messaggio:\n$message\n";

    // Headers per l'email
    $email_headers = "From: $name <$email>";

    // Invia l'email e fornire una risposta (modifica qui per gestire il feedback o il redirect)
    if (mail($to, $subject, $email_content, $email_headers)) {
        echo "Messaggio inviato correttamente!";
    } else {
        echo "Si è verificato un errore nell'invio del messaggio.";
    }
}
?>
