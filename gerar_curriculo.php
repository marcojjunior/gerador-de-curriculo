<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $education = $_POST["education"];
    $experience = $_POST["experience"];

    $resume_content = "Nome: $name<br>";
    $resume_content .= "E-mail: $email<br>";
    $resume_content .= "Telefone: $phone<br><br>";

    $resume_content .= "Educação:<br>";
    for ($i = 0; $i < count($education); $i += 3) {
        $resume_content .= "- Instituição: " . $education[$i] . "<br>";
        $resume_content .= "  Título: " . $education[$i + 1] . "<br>";
        $resume_content .= "  Período: " . $education[$i + 2] . "<br>";
    }

    $resume_content .= "<br>Experiência:<br>";
    for ($i = 0; $i < count($experience); $i += 4) {
        $resume_content .= "- Empresa: " . $experience[$i] . "<br>";
        $resume_content .= "  Cargo: " . $experience[$i + 1] . "<br>";
        $resume_content .= "  Período: " . $experience[$i + 2] . "<br>";
        $resume_content .= "  Descrição: " . $experience[$i + 3] . "<br>";
    }

    $resume_content_js = json_encode($resume_content);

    echo "<script>
        function generateResume() {
            var resume = $resume_content_js;
            document.write('<pre>' + resume + '</pre>');
            window.print();
        }
        generateResume();
    </script>";
}
?>