<?php

namespace App\Models;
use PDO;
use Config\Database;

class Commit
{
    private ?int $id_commit;
    private ?string $text;
    private ?string $creation_date;
    private ?string $modification_date;
    private ?string $picture;
    private ?int $like_reaction;
    private ?int $supports_reaction;
    private ?int $funny_reaction;
    private ?int $skeptical_reaction;
    private ?int $id_user;
    //private const PDO = Database::getConnection();

    public function __construct(?int $id_commit, ?string $text, ?string $creation_date, ?string $modification_date, ?string $picture, ?int $like_reaction, ?int $supports_reaction, ?int $funny_reaction, ?int $skeptical_reaction, ?int $id_user)
    {
        $this->id_commit = $id_commit;
        $this->text = $text;
        $this->creation_date = $creation_date;
        $this->modification_date = $modification_date;
        $this->picture = $picture;
        $this->like_reaction = $like_reaction;
        $this->supports_reaction = $supports_reaction;
        $this->funny_reaction = $funny_reaction;
        $this->skeptical_reaction = $skeptical_reaction;
        $this->id_user = $id_user;
    }

    public function addCommit()
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO `commit` (`text`, `creation_date`, `picture`, `id_user`) VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$this->text, $this->creation_date, $this->picture, $this->id_user]);
    }

    public function getCommitById()
    {
        $pdo = Database::getConnection();
        $sql = "SELECT `id_commit`, `text`, `creation_date`, `modification_date`, `picture`, `like_reaction`, `supports_reaction`, `funny_reaction`, `skeptical_reaction`, `id_user` 
        FROM `commit` WHERE `id_commit`= ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->id_commit]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
            return new Commit($result['id_commit'], $result["text"],$result["creation_date"],$result["modification_date"],$result["picture"],$result["like_reaction"],$result["supports_reaction"],$result["funny_reaction"],$result["skeptical_reaction"], $result['id_user']);
        }else{
            return false;
        }

    }

    public function editCommit()
    {
        $pdo = Database::getConnection();
        $sql = "UPDATE `commit` SET `text` = ?, `modification_date` = ?, `picture` = ? WHERE `id_commit` = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$this->text, $this->modification_date, $this->picture, $this->id_commit]);
    }

    public function getIdCommit(): ?int
    {
        return $this->id_commit;
    }
    public function getText(): ?string
    {
        return $this->text;
    }
    public function getCreationDate(): ?string
    {
        return $this->creation_date;
    }
    public function getModificationDate(): ?string
    {
        return $this->modification_date;
    }
    public function getPicture(): ?string
    {
        return $this->picture;
    }
    public function getLikeReaction(): ?int
    {
        return $this->like_reaction;
    }
    public function getSupportsReaction(): ?int
    {
        return $this->supports_reaction;
    }
    public function getFunnyReaction(): ?int
    {
        return $this->funny_reaction;
    }
    public function getSkepticalReaction(): ?int
    {
        return $this->skeptical_reaction;
    }
    public function getUserId(): ?int
    {
        return $this->id_user;
    }
    public function setIdCommit(?int $id_commit): void
    {
        $this->id_commit = $id_commit;
    }
    public function setText(?string $text): void
    {
        $this->text = $text;
    }
    public function setCreationDate(?string $creation_date): void
    {
        $this->creation_date = $creation_date;
    }
    public function setModificationDate(?string $modification_date): void
    {
        $this->modification_date = $modification_date;
    }
    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }
    public function setLikeReaction(?int $like_reaction): void
    {
        $this->like_reaction = $like_reaction;
    }
    public function setSupportsReaction(?int $supports_reaction): void
    {
        $this->supports_reaction = $supports_reaction;
    }
    public function setFunnyReaction(?int $funny_reaction): void
    {
        $this->funny_reaction = $funny_reaction;
    }
    public function setSkepticalReaction(?int $skeptical_reaction): void
    {
        $this->skeptical_reaction = $skeptical_reaction;
    }
    public function setUserId(?int $id_user): void
    {
        $this->id_user = $id_user;
    }
}