<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table border="1" class="responsive-table">
    <thead>
        <tr>
            <th>Item Description</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['product'], ENT_QUOTES, 'UTF-8'); ?></td>

                <td>
                    <form action="" method="post">
                        <div>
                            <input type="hidden" name="id" value="<?php echo $item['product_id']; ?>">
                            <input type="submit" name="action" value="Remove" class="waves-effect waves-light btn red">
                        </div>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 

    $removeAction = filter_input(INPUT_POST, 'action');
    $prodID = filter_input(INPUT_POST, 'id');



?>