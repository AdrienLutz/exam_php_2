<?php

//on extend à DbManager pour passer
// dans le constructeur et se connecter à la bdd
// quoique l'on fasse ici, nous serons connecté
class MotoManager extends DbManager
{
    public function getAll()
    {
        $query = $this->bdd->prepare("SELECT * FROM moto");
        $query->execute();

        $results = $query->fetchAll();

        $motos = [];
        foreach ($results as $res) {
            //bien respecter l'ordre du constructeur ici !

//            on ajoute ces objets dans notre tableau
            $motos[] = new moto(
                $res['id'], $res['brand'], $res['model'], $res['type'], $res['picture']
            );
        }
//        on retourne notre tableau contenant nos objets
        return $motos;

    }

    public function getOne($id)
    {
        $query =
            $this->bdd->prepare("SELECT * FROM moto WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $res = $query->fetch();

        $moto = null;

//        il fau transformer ce tableau pdo en objet mais d'abord
//        il faut metre une condition au cas où la motoe n'existe pas
        if ($res) {
            $moto = new moto($res['id'], $res['brand'], $res['model'], $res['type'], $res['picture']);

        }
        return $moto;

    }


    public function update(moto $moto){
        $brand = $moto->getBrand();
        $model = $moto->getModel();
        $type = $moto->getType();
        $picture = $moto->getPicture();
        $id = $moto->getId();

        $query = $this->bdd->prepare("UPDATE moto SET
        brand = :brand, 
        model = :model,
        type = :type,
        picture = :picture
        WHERE id = :id");

        $query->bindParam("brand", $brand);
        $query->bindParam('model', $model);
        $query->bindParam("type", $type);
        $query->bindParam("picture", $picture);
        $query->bindParam("id", $id);

        $query->execute();
    }

    public function add(moto $moto):moto
    {
        $brand = $moto->getBrand();
        $model = $moto->getModel();
        $type = $moto->getType();
        $picture = $moto->getPicture();

        $query = $this->bdd->prepare(
            'INSERT INTO moto (brand, model, type, picture) VALUES (:brand, :model, :type, :picture) '
        );
        // les paramètres à afficher sont privés, il faut utiliser les getters
        $query->bindParam(':brand', $brand);
        $query->bindParam(':model', $model);
        $query->bindParam(':type', $type);
        $query->bindParam(':picture', $picture);

        $query->execute();

        $moto->setId($this->bdd->lastInsertId());

        return $moto;
    }

    public function delete($id){
        $query = $this->bdd->prepare("DELETE FROM moto WHERE id=:id");
        $query->bindParam("id", $id);
        $query->execute();
    }

}