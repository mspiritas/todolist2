<?php 

    function get_items_by_category($category_id) {
        global $db;
        if ($category_id) {
            $query = 'SELECT I.Title, I.ItemNum, I.Description, C.categoryName
                      FROM items A
                      LEFT JOIN categories C
                      ON A.categoryID = C.categoryID
                      WHERE A.categoryID = :category_id
                      ORDER BY A.ID';
        } else {
            $query = 'SELECT I.Title, I.ItemNum, I.Description, C.categoryName
                      FROM items A
                      LEFT JOIN categories C
                      ON A.categoryID = C.categoryID
                      ORDER BY C.categoryID';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }

    function delete_item($item_id) {
        global $db;
        $query = 'DELETE FROM items
                  WHERE ID = :assign_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':assign_id', $item_id);
        $statement->execute();
        $statement->closeCursor();
    }
    
    function add_item($category_id, $description) {
        global $db;
        $query = 'INSERT INTO items (Description, categoryID)
                  VALUES (:descr, :categoryID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':descr', $description);
        $statement->bindValue(':categoryID', $category_id);
        $statement->execute();
        $statement->closeCursor();
    }