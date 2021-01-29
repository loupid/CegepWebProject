<?php
?>
<form action="<?= $this->router->generate('indexAdmin') ?>" method="post">
    <label for="name">Nom:</label>
    <input type="text" name="name" value="<?= $name ?? ''?>">

    <button>Confirmer les test </button>
</form>
