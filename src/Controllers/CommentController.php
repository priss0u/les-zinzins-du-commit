<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Utils\AbstractController;

class CommentController extends AbstractController
{
    public function editComment()
    {
        if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id'] );
            
            //Je dois instancier l'objet Comment pour poouvoir utiliser la méthode getCommentById (pas oublier le use)
            $comment = new Comment($id, null, null, null, null, null);
            $myComment = $comment->getCommentById();
            /*
            * si j'ai bien un commentaire dans la base de donner avec cet id
            * si j'ai bien unse session avec user ( donc si une personne est connecté)
            * si id_user et === à l'id du user qui a créer le commentaire
            */
            if($myComment && $_SESSION['user'] && $_SESSION['user']['id_user'] === $myComment->getIdUser()){

                if(isset($_POST['editComment'])){
                    $comment = htmlspecialchars($_POST['comment']);
                    $this->totalCheck('comment', $comment);
                    if(empty($this->arrayError)){
                        $today = date("Y-m-d"); 
                        $newComment = new Comment($id, $comment, null, $today, $myComment->getIdCommit(), $myComment->getIdUser());
                        $newComment->editComment();
                        $this->redirectToRoute('/commit?id=' . $myComment->getIdCommit() , 200);
                    }
                }

                require_once(__DIR__ . "/../Views/editComment.view.php");
            }else{
                $this->RedirectToRoute('/', 302);
            }
            


            //Si la personne clique sur le submit alors vérifier les erreurs puis créer une méthode update pour envoyer la modification
        }else{
            $this->RedirectToRoute('/', 302);
        }
        
    }
}