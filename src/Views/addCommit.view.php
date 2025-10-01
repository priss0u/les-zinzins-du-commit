<?php

require_once(__DIR__.'/partials/head.view.php');
?>

<h1>Création d'un commit</h1>
<form method="POST">
    <div class="container">
    
        <div class="form-group">
            <label for="power" class="form-label">Le pouvoir de ton commit:</label>
            <input type="text" name="power" id="power" class="form-control"> 

        </div>
        <div class="form-group">
            <label for="description" class="form-label">Parle moi de ton commit:</label>
            <textarea class="form-control" id="description" name="description" style="height: 100px"></textarea> 
        </div>
        
        <button type="submit" class="btn btn-success mt-5">Commiter</button>
    </div>
</form>
<?php
require_once(__DIR__.'/partials/footer.view.php');