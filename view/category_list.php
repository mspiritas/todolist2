<?php include('../view/header.php') ?>

<?php if ($categories) { ?>
    <section>
        <header>
            <h1>Category List</h1>
        </header>

        <?php foreach ($categories as $category) : ?>
        <div>
            <div>
                <p><?= $category['categoryName'] ?></p>
            </div>
            <div>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_category">
                    <input type="hidden" name="category_id" value="<?= $category['categoryID'] ?>">
                    <button>Delete</button>
                </form>
            </div>
        </div>
        <?php endforeach ; ?>
    </section>
<?php } else { ?>
    <p>No categories exist yet.</p>
<?php } ?>

<section>
    <h2>Add Category</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_category">
        <div>
            <label>Name:</label>
            <input type="text" name="category_name" maxlength="20" placeholder="Name" autofocus required>
        </div>
        <div>
            <button>Add</button>
        </div>
    </form>
</section>
<br>
<p><a href=".">View &amp; Add Items</a></p>
<?php include('../view/footer.php') ?>