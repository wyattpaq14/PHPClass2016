<h1>Catalog</h1>
<table border="1" class="responsive-table">
    <thead>
        <tr>
            <th>Item Description</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['product'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    $<?php echo number_format($item['price'], 2); ?>
                </td>
                <td>
                    <form action="" method="post">
                        <div>
                            <input type="hidden" name="id" value="<?php echo $item['product_id']; ?>">
                            <input type="submit" name="action" value="Buy" class="waves-effect waves-light btn red">
                        </div>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>