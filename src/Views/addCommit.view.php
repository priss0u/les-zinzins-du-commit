<?php

require_once(__DIR__.'/partials/head.view.php');
?>

<h1>Création d'un commit</h1>
<form method="POST">
    <div class="container">
    
        <div class="form-group">
            <label for="commit" class="form-label">Parle moi de ton commit:</label>
            <textarea class="form-control" id="commit" name="commit" style="height: 100px"></textarea> 
        </div>
        
        <button type="submit" name="addCommit" class="btn btn-success mt-5">Commiter</button>
    </div>
</form>
<?php
require_once(__DIR__.'/partials/footer.view.php');