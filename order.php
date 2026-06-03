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
                            <tr>
                                <td><input type="checkbox" name="selected[0]" value="Golden Barrel Cactus"></td>
                                <td>Golden Barrel Cactus</td>
                                <td>RM35</td>
                                <td><input type="number" name="qty[0]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[1]" value="Bunny Ear Cactus"></td>
                                <td>Bunny Ear Cactus</td>
                                <td>RM28</td>
                                <td><input type="number" name="qty[1]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[2]" value="Old Man Cactus"></td>
                                <td>Old Man Cactus</td>
                                <td>RM42</td>
                                <td><input type="number" name="qty[2]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[3]" value="Peanut Cactus"></td>
                                <td>Peanut Cactus</td>
                                <td>RM22</td>
                                <td><input type="number" name="qty[3]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[4]" value="Fairy Castle Cactus"></td>
                                <td>Fairy Castle Cactus</td>
                                <td>RM25</td>
                                <td><input type="number" name="qty[4]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[5]" value="Ming Thing Cactus"></td>
                                <td>Ming Thing Cactus</td>
                                <td>RM38</td>
                                <td><input type="number" name="qty[5]" min="0" value="0" class="qty-input"></td>
                            </tr>
							
                            <tr>
                                <td><input type="checkbox" name="selected[6]" value="Chocolate Drop"></td>
                                <td>Chocolate Drop</td>
                                <td>RM18</td>
                                <td><input type="number" name="qty[6]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[7]" value="Ruby Glow"></td>
                                <td>Ruby Glow</td>
                                <td>RM22</td>
                                <td><input type="number" name="qty[7]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[8]" value="Sunrise"></td>
                                <td>Sunrise</td>
                                <td>RM30</td>
                                <td><input type="number" name="qty[8]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[9]" value="Living Stones"></td>
                                <td>Living Stones</td>
                                <td>RM28</td>
                                <td><input type="number" name="qty[9]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[10]" value="Crinkle Leaf Plant"></td>
                                <td>Crinkle Leaf Plant</td>
                                <td>RM18</td>
                                <td><input type="number" name="qty[10]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[11]" value="Ice Plant"></td>
                                <td>Ice Plant</td>
                                <td>RM15</td>
                                <td><input type="number" name="qty[11]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            
                            <tr>
                                <td><input type="checkbox" name="selected[12]" value="Mini Hand Trowel Set"></td>
                                <td>Mini Hand Trowel Set</td>
                                <td>RM25</td>
                                <td><input type="number" name="qty[12]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[13]" value="Succulent Pruning Shears"></td>
                                <td>Succulent Pruning Shears</td>
                                <td>RM22</td>
                                <td><input type="number" name="qty[13]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[14]" value="Protective Gardening Gloves"></td>
                                <td>Protective Gardening Gloves</td>
                                <td>RM15</td>
                                <td><input type="number" name="qty[14]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[15]" value="Soil Scoop"></td>
                                <td>Soil Scoop</td>
                                <td>RM12</td>
                                <td><input type="number" name="qty[15]" min="0" value="0" class="qty-input"></td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" name="selected[16]" value="Propagation Tweezers"></td>
                                <td>Propagation Tweezers</td>
                                <td>RM10</td>
                                <td><input type="number" name="qty[16]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[17]" value="Bulb Syringe Watering Tool"></td>
                                <td>Bulb Syringe Watering Tool</td>
                                <td>RM18</td>
                                <td><input type="number" name="qty[17]" min="0" value="0" class="qty-input"></td>
                            </tr>
							
							<tr>
                                <td><input type="checkbox" name="selected[18]" value="Eco Bola Pot"></td>
                                <td>Eco Bola Pot</td>
                                <td>RM74</td>
                                <td><input type="number" name="qty[18]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[19]" value="Agros Planter"></td>
                                <td>Agros Planter</td>
                                <td>RM69</td>
                                <td><input type="number" name="qty[19]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[20]" value="Eco Bell Pot"></td>
                                <td>Eco Bell Pot</td>
                                <td>RM34</td>
                                <td><input type="number" name="qty[20]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[21]" value="Planet Planter"></td>
                                <td>Planet Planter</td>
                                <td>RM65</td>
                                <td><input type="number" name="qty[21]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[22]" value="Eco Tubular Pot"></td>
                                <td>Eco Tubular Pot</td>
                                <td>RM29</td>
                                <td><input type="number" name="qty[22]" min="0" value="0" class="qty-input"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="selected[23]" value="Olympia Planter"></td>
                                <td>Olympia Planter</td>
                                <td>RM120</td>
                                <td><input type="number" name="qty[23]" min="0" value="0" class="qty-input"></td>
                            </tr>
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