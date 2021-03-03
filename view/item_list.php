<?php include('../view/header.php'); ?>

<section>
    <header>
        <h1>Items</h1>
        <form action="." method="get">
            <input type="hidden" name="action" value="list_items">
            <select name="category_id" required>
                <option value="0">View All</option>
                <?php foreach($categories as $category) : ?>
                <?php if ($category_id == $category['categoryID']) { ?>
                    <option value="<?= $category['categoryID'] ?>" selected>
                <?php } else { ?>
                    <option value="<?= $category['categoryID'] ?>">
                <?php } ?>
                        <?= $category['categoryName'] ?>
                    </option>
                    <?php endforeach; ?>
            </select>
            <button>Go</button> 
        </form>
    </header>
    <?php if($items) { ?>
        <?php foreach ($items as $item) : ?>
        <div>
            <div>
                <p><?= $item['categoryName'] ?></p>
                <p><?= $item['Title'] ?></p>
                <p><?= $item['Description'] ?></p>
            </div>
            <div>
                <form action="." method="post">
                    <input type='hidden' name="action" value="delete_item">
                    <input type="hidden" name="item_id" value="<?=
                    $item['ID'] ?>">
                    <button>Delete</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
    <?php } else { ?>
    <br>
    <?php if ($category_id) { ?>
        <p>No items exist for this category yet.</p>
    <?php } else { ?>
        <p>No items exist yet.</p>
    <?php } ?>
    <br>
    <?php } ?>
<section>
    <h2>Add item</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_item">
        <div>
            <label>Category:</label>
            <select name="category_id" required>
                <option value="">Please select</option>
                <?php foreach ($categories as $category) : ?>
                <option value="<?= $category['categoryID']; ?>">
                    <?= $category['categoryName']; ?>
                </option>
                <?php endforeach ; ?>
                </select>
                <label>Title:</label>
                <input type="text" name="title" maxlength="20"
                placeholder="Description" required>
                <label>Description:</label>
                <input type="text" name="description" maxlength="50"
                placeholder="Description" required>
            </div>
            <div>
                <button>Add</button>
            </div>
        </form>
</section>
<br>
<p><a href=".?action=list_categories">View/Edit Categories</a></p>
<?php include('../view/header.php'); ?>