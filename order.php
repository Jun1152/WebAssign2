<?php include 'header.inc.php'; ?>
	<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Yeo Zi Yi'>
    <title>Succulents | Cacti-Succulent Kuching</title>
    <link rel='stylesheet' href='styles/style.css'>
	</head>
	
	<body>
    <main class="main2">
        <section>
            <h2>Place Your Order</h2>
            <p>Fresh cacti and succulents from our Kuching garden. Select multiple products below, set your quantities, then choose delivery and payment.</p>
            
            <form action="order_process.php" method="POST">
                
                <!-- MULTIPLE PRODUCT SELECTION (exactly like the picture) -->
                <div class="product-list2">
                    <h3>Select Products</h3>
                    <table class="product-table2">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
<tbody>
                            <?php
                            require_once('settings.php');
                            
                            // Fetch all products from the database
                            $query = "SELECT * FROM products ORDER BY product_id ASC";
                            $result = mysqli_query($conn, $query);
                            
                            if (mysqli_num_rows($result) > 0) {
                                $i = 0; // Array index for the form inputs
                                
                                while($row = mysqli_fetch_assoc($result)) {
                                    $name = htmlspecialchars($row['product_name']);
                                    $price = $row['price'];
                                    $stock = $row['stock'];
                                    
                                    // Check if item is out of stock to disable the inputs
                                    $is_empty = ($stock <= 0);
                                    $disabled = $is_empty ? "disabled" : "";
                                    $stockLabel = $is_empty ? "<span style='color:red;'>Out of Stock</span>" : "<span style='color:green;'>Stock: $stock</span>";

                                    echo "<tr>";
                                    // Checkbox
                                    echo "<td><input type='checkbox' name='selected[$i]' value='$name' $disabled></td>";
                                    // Name & Dynamic Stock Label
                                    echo "<td>$name <br><small><strong>$stockLabel</strong></small></td>";
                                    // Price
                                    echo "<td>RM$price</td>";
                                    // Quantity Input (Max is set to remaining stock so users can't over-order)
                                    echo "<td><input type='number' name='qty[$i]' min='0' max='$stock' value='0' class='qty-input' $disabled></td>";
                                    echo "</tr>";
                                    
                                    $i++;
                                }
                            } else {
                                echo "<tr><td colspan='4' style='text-align:center; color:red;'>Inventory is currently empty. Please run setup.php</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- DELIVERY & PAYMENT SECTION -->
                <fieldset>
                    <legend>Delivery &amp; Payment</legend>
                    
                    <label for="delivery2">Delivery Mode:</label>
                    <select id="delivery2" name="delivery2" required>
                        <option value="">-- Select delivery mode --</option>
                        <option value="pickup">Self Pickup (Medan Satok stall)</option>
                        <option value="delivery">Home Delivery (Kuching area only)</option>
                    </select>
                    <br><br>

                    <label for="payment2">Payment Mode:</label>
                    <select id="payment2" name="payment2" required>
                        <option value="">-- Select payment mode --</option>
                        <option value="cash">Cash on Pickup / Delivery</option>
                        <option value="transfer">Bank Transfer (Maybank / CIMB)</option>
                        <option value="card">Credit / Debit Card (on pickup)</option>
                    </select>
                </fieldset>
                <br>

                <fieldset>
                    <legend>Customer Information</legend>
                    
                    <label for="customer_name">Full Name:</label>
                    <input type="text" id="customer_name" name="customer_name" required>
                    <br><br>

                    <label for="address">Delivery / Billing Address:</label>
                    <input type="text" id="address" name="address" required>
                    <br><br>

                    <label for="contact_number">Contact Number:</label>
                    <input type="text" id="contact_number" name="contact_number" required>
                </fieldset>
                <br>

                <input type="submit" value="Submit">
                <input type="reset" value="Reset">

            </form>
        </section>
    </main>

<?php include 'footer.inc.php'; ?>