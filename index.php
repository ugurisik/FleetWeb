<?php
date_default_timezone_set('Europe/Istanbul');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);



try {
    require_once './init.php';
    $system = new System();
} catch (\Throwable $th) {
    header('HTTP/1.1 500 Internal Server Error');
    echo $th->getMessage();
    exit($th->getCode());
}

?>

<?php
if (!isset($_POST['' . TOKENIZER . ''])) :
?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                var form = document.getElementsByTagName('form');
                for (var i = 0; i < form.length; i++) {
                    var hiddenEl = document.createElement('input');
                    hiddenEl.setAttribute('type', 'hidden');
                    hiddenEl.setAttribute('name', "<?= TOKENIZER ?>");
                    hiddenEl.setAttribute('value', '<?= $_SESSION[TOKENIZER] ?>');
                    form[i].appendChild(hiddenEl);
                }
            }, 1500);
        });
    </script>
<?php endif; ?>