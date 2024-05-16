<section class="cover">
            <div class="container">
                <div class="section-header">
                    <h2>Our menu</h2>
                    <p>
                        Check Our
                        <span>Warm Menu</span>
                    </p>
                </div>

                <div class="products">


                    <div class="box-container">

                        <?php
                        $select_product = mysqli_query($conn, "SELECT * FROM `product`") or die('query failed');
                        if (mysqli_num_rows($select_product) > 0) {
                            while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                        ?>
                        <form method="post" class="box" action="">
                            <img src="assets/img/<?php echo $fetch_product['image']; ?>" alt="">
                            <div class="name"><?php echo $fetch_product['name']; ?></div>
                            <div class="price">$<?php echo $fetch_product['price']; ?></div>
                            <input type="number" min="1" name="product_quantity" value="1">
                            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                        </form>
                        <?php
                            };
                        };
                        ?>

                    </div>

                </div>
            </div>
        </section>