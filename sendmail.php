<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Configurazione email
    $to = "carlinogiovanni04@gmail.com"; // Sostituisci con la tua email
    $subject = "Messaggio dal portfolio";

    // Sanitizzazione input
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Validazione base
    if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Errore: Compila tutti i campi e inserisci un'email valida.";
        exit;
    }

    // Creazione corpo email
    $email_content  = "Nome: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Messaggio:\n$message\n";

    // Header email
    $email_headers = "From: giovannicarlino04.github.io\r\n"; 
    $email_headers .= "Reply-To: $email\r\n";
    $email_headers .= "MIME-Version: 1.0\r\n";
    $email_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Tentativo di invio email
    if (mail($to, $subject, $email_content, $email_headers)) {
        echo "Messaggio inviato correttamente!";
    } else {
        http_response_code(500);
        echo "Errore: Impossibile inviare il messaggio. Controlla la configurazione del server.";
    }
} else {
    // Metodo non consentito
    http_response_code(405);
    echo "Errore: Metodo non consentito.";
}
?>
