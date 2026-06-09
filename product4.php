<?php include 'header.inc.php'; ?>
	<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Yeo Zi Yi'>
    <title>Succulents | Cacti-Succulent Kuching</title>
    <link rel='stylesheet' href='styles/style.css'>
	</head>
	
	<body>
    <main>
        <section>
            <h2>Gardening Pots</h2>
            <p>High-quality pots specially chosen for cacti and succulents. Gentle on roots, strong enough for thorns.</p>
        </section>


            <section class="product-list4">
                
                <?php 
                $search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
                ?>

                <!-- Eco Bola Pot -->
                <?php if ($search == '' || strpos('eco bola', $search) !== false || strpos('bola pot', $search) !== false || strpos('marble', $search) !== false): ?>
                <div class="product-card4">
                    <figure class="image-box">
                        <img src="images/EcoBolaPot.jpg" alt="Eco Bola Pot">
                        <div class="overlay">
                            <h3>Description</h3>
                            <p>With a marble stone design, this eco-friendly pot is durable, lightweight and break resistant.</p>
                        </div>
                        <figcaption>
                            <a href="https://www.bloomspace.co/products/eco-bola-pot?_pos=2&_sid=13ada3cae&_ss=r" target="_blank">Eco Bola Pot</a>
                        </figcaption>
                    </figure>
                    <h3>Eco Bola Pot</h3>
                    <p>RM74</p>
                    <p class="desc">33cm diameter x 29cm height</p>
                </div>
                <?php endif; ?>

                <!-- Argos Planter -->
                <?php if ($search == '' || strpos('argos', $search) !== false || strpos('bamboo', $search) !== false): ?>
                <div class="product-card4">
                    <figure class="image-box">
                        <img src="images/ArgosPlanter.jpg" alt="Argos Planter">
                        <div class="overlay">
                            <h3>Description</h3>
                            <p>High quality ceramic planter with bamboo basket appearance. Comes with drainage holes and matching saucer.</p>
                        </div>
                        <figcaption>
                            <a href="https://www.bloomspace.co/products/argos-planter?_pos=10&_sid=13ada3cae&_ss=r" target="_blank">Argos Planter</a>
                        </figcaption>
                    </figure>
                    <h3>Argos Planter</h3>
                    <p>RM69</p>
                    <p class="desc">18cm diameter x 16.5cm height</p>
                </div>
                <?php endif; ?>

                <!-- Eco Bell Pot -->
                <?php if ($search == '' || strpos('eco bell', $search) !== false || strpos('bell pot', $search) !== false): ?>
                <div class="product-card4">
                    <figure class="image-box">
                        <img src="images/EcoBellPot.jpg" alt="Eco Bell Pot">
                        <div class="overlay">
                            <h3>Description</h3>
                            <p>Minimalistic design made from plant fiber composite. Lightweight, break resistant, with drainage hole and matching saucer.</p>
                        </div>
                        <figcaption>
                            <a href="https://www.bloomspace.co/products/eco-bell-pot-l?_pos=1&_sid=13ada3cae&_ss=r" target="_blank">Eco Bell Pot</a>
                        </figcaption>
                    </figure>
                    <h3>Eco Bell Pot</h3>
                    <p>RM34</p>
                    <p class="desc">16cm diameter x 14.5cm height</p>
                </div>
                <?php endif; ?>

                <!-- Planet Planter -->
                <?php if ($search == '' || strpos('planet', $search) !== false || strpos('saturn', $search) !== false): ?>
                <div class="product-card4">
                    <figure class="image-box">
                        <img src="images/PlanetPlanter.jpg" alt="Planet Planter">
                        <div class="overlay">
                            <h3>Description</h3>
                            <p>Saturn-shaped ceramic planter, perfect for table-top plants. Adds a cosmic touch to your home decor.</p>
                        </div>
                        <figcaption>
                            <a href="https://www.bloomspace.co/products/planet-planter?_pos=14&_sid=13ada3cae&_ss=r" target="_blank">Planet Planter</a>
                        </figcaption>
                    </figure>
                    <h3>Planet Planter</h3>
                    <p>RM65</p>
                    <p class="desc">16.2cm diameter x 10.5cm height</p>
                </div>
                <?php endif; ?>

                <!-- Eco Tubular Pot -->
                <?php if ($search == '' || strpos('eco tubular', $search) !== false || strpos('tubular pot', $search) !== false): ?>
                <div class="product-card4">
                    <figure class="image-box">
                        <img src="images/EcoTubularPot.jpg" alt="Eco Tubular Pot">
                        <div class="overlay">
                            <h3>Description</h3>
                            <p>With a minimalistic design, these pots fit elegantly in various modern home and office settings. Specially fabricated from plant fiber composite material, this eco-friendly pot is lightweight and break resistant, while allowing optimum breathability to the plant.</p>
                        </div>
                        <figcaption>
                            <a href="https://www.bloomspace.co/products/eco-tubular-pot-m?_pos=6&_sid=9fca6d83a&_ss=r" target="_blank">Eco Tubular Pot</a>
                        </figcaption>
                    </figure>
                    <h3>Eco Tubular Pot</h3>
                    <p>RM29</p>
                    <p class="desc">15cm diameter x 15cm height</p>
                </div>
                <?php endif; ?>

                <!-- Olympia Planter -->
                <?php if ($search == '' || strpos('olympia', $search) !== false || strpos('bowl', $search) !== false): ?>
                <div class="product-card4">
                    <figure class="image-box">
                        <img src="images/OlympiaBowl.jpg" alt="Olympia Planter">
                        <div class="overlay">
                            <h3>Description</h3>
                            <p>Durable and lasting planter in classic white.</p>
                        </div>
                        <figcaption>
                            <a href="https://www.bloomspace.co/products/olympia-planter?_pos=9&_sid=9fca6d83a&_ss=r" target="_blank">Olympia Planter</a>
                        </figcaption>
                    </figure>
                    <h3>Olympia Planter</h3>
                    <p>RM120</p>
                    <p class="desc">32cm diameter x 36cm height</p>
                </div>
                <?php endif; ?>

            </section>

            <aside>
                <h3>Pot Selection &amp; Care Guide</h3>
                <p>Choosing the right vessel is as important as the plant itself, especially in Sarawak’s humid climate:</p>
                <ol>
                    <li>Always prioritize pots with drainage holes to prevent root rot.</li>
                    <li>Terra cotta is ideal for beginners as it allows soil to "breathe" and dry faster.</li>
                    <li>Match the pot size to the root ball; a pot that is too large holds excess moisture.</li>
                    <li>Clean new or used pots thoroughly before transplanting to remove salts or pathogens.</li>
                </ol>
            </aside>

            <section>
                <h3>Pottery Terms to Know</h3>
                <dl>
                    <dt>Porosity</dt>
                    <dd>How much air and water can pass through the material; high porosity helps soil dry out quickly.</dd>

                    <dt>Terracotta</dt>
                    <dd>A brownish-red clay that is unglazed and porous, widely considered the best for cacti.</dd>

                    <dt>Glazing</dt>
                    <dd>A glass-like coating fused to the ceramic surface which makes the pot non-porous and decorative.</dd>

                    <dt>Kiln</dt>
                    <dd>A specialized, thermally insulated oven used to reach the high temperatures necessary for firing clay and maturing glazes.</dd>

                    <dt>Bisque (or Bisqueware)</dt>
                    <dd>Pottery that has been fired once but has not yet been glazed. It is still porous, making it an excellent base for planters if you want to maintain breathability.</dd>

                    <dt>Vitrification</dt>
                    <dd>The stage in firing where clay particles melt and fuse together, turning into a glass-like state. Fully vitrified clay (like porcelain) is completely waterproof, even without a glaze.</dd>

                    <dt>Slip</dt>
                    <dd>A liquid mixture of clay and water. It is used as a glue to join pieces of unfired clay together or as a decorative coating applied before the first firing.</dd>

                    <dt>Drainage Hole</dt>
                    <dd>While not a technical ceramic term, this is the most critical feature for plant health; it prevents water from pooling at the bottom of the pot, which prevents root rot and regulates soil moisture levels.</dd>
                </dl>
            </section>
			
			<div class="policy-container">
				<h3>Return & Exchange Policy</h3>
				<p>To ensure the best experience for our community, please refer to the guidelines below regarding our products:</p>
				<table class="policy-table">
					<thead>
						<tr>
							<th>Category</th>
							<th>Return Window</th>
							<th>Eligibility & Conditions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><strong>Live Plants</strong><br>(Cactus/Succulents)</td>
							<td>24 Hours</td>
							<td>Final sale. Replacements only issued for transit damage with unboxing video/photo proof.</td>
						</tr>
						<tr>
							<td><strong>Non-Perishables</strong><br>(Tools/Pots)</td>
							<td>7 Days</td>
							<td>Must be unused, in original packaging, and in resalable condition.</td>
						</tr>
						<tr>
							<td><strong>Sale Items</strong></td>
							<td>N/A</td>
							<td>All sale or promotional items are final sale and not eligible for exchange.</td>
						</tr>
					</tbody>
				</table>
			</div>
			
        </section>
    </main>

<?php include 'footer.inc.php'; ?>