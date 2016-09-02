<nav>
    <div class="nav-wrapper red">
        <?php if (isset($allCategories)) : ?>
            <ul id="nav-mobile" class="left hide-on-med-and-down"> 
                <li><a href="?">All</a> </li>    
                <?php foreach ($allCategories as $category): ?>
                    <li>
                        <a href="?cat=<?php echo $category['category_id']; ?>" class="waves-effect">
                            <?php echo $category['category']; ?>
                        </a>
                    </li>    
                <?php endforeach; ?> 

            </ul>
            <ul class="waves-effect right hide-on-med-and-down">
                <li>
                    <a href="account.php">
                        My Account
                    </a>
                </li>
                <li>
                    <a href="checkout.php">
                        Checkout: <?php echo $cartCount; ?>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        Logout
                    </a>
                </li>

            </ul>

        </div>
    </nav>
<?php endif; ?>


