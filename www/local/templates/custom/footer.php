<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

use Bitrix\Main\Localization\Loc;
?>
</main>
<footer>
    <p><?= Loc::getMessage('C_F_COPYRIGHT', array('#YEAR#' => date('Y'))) ?></p>
</footer>
</body>
</html>