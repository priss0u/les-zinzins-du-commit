<?php

namespace App\Controllers;

use App\Models\Commit;
use App\Utils\AbstractController;

//impoter la class le "use"
class CommitController extends AbstractController
{
    public function addCommit()
    {
        if(isset($_SESSION['user'])) {
            if(isset($_POST['addCommit'])){
                $text = htmlspecialchars($_POST['commit']);
                $this->totalCheck('commit', $text);

                if(empty($this->arrayError)){
                    $today = date("Y-m-d");
                    $commit = new Commit(null, $text, $today, null, null, null, null, null, null, $_SESSION['user']['id_user']);
                    $commit->addCommit();
                    $this->redirectToRoute('/', 200);
                }
            }
            require_once(__DIR__ . "/../Views/addCommit.view.php");
        }else{
            $this->redirectToRoute('/', 302);
        }
    }


    //afficher un commit par l'id s'il existe
    public function commit()
    {
        if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $commit = new Commit($id, null, null, null, null, null, null, null, null, null, null);
            $myCommit = $commit->getCommitById();

            if($myCommit)
            {
                require_once(__DIR__ . "/../Views/commit.view.php");
            }else{
                $this->redirectToRoute('/', 302);
            }
        }else{
            $this->redirectToRoute('/', 302);
        }
    }
}