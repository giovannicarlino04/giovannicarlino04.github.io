<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $to = "carlinogiovanni04@gmail.com";
    $subject = "Messaggio dal portfolio";

    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    $email_content  = "Nome: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Messaggio:\n$message\n";

    $email_headers = "From: $name <$email>";

    if (mail($to, $subject, $email_content, $email_headers)) {
        echo "Messaggio inviato correttamente!";
    } else {
        echo "Si è verificato un errore nell'invio del messaggio.";
    }
} else {
    // Se si accede al file con un metodo diverso da POST, restituisce errore 405
    header("HTTP/1.1 405 Method Not Allowed");
    echo "Metodo non consentito.";
}
?>
