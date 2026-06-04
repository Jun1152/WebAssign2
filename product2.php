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
            <h2>Succulent Collection</h2>
            <p>Succulents are the perfect companion for urban gardeners in Kuching. These resilient plants store water in their fleshy leaves, allowing them to thrive even with minimal intervention. Our curated collection focuses on unique textures and vibrant colors that bring a touch of nature into your home or office space.</p>
            
            
            <form method="get" class="search-form">
                <input type="text" name="search" placeholder="Search succulents..." 
                       value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit">Search</button>
                <a href="product2.php" class="clear-btn">Clear</a>
            </form>
            

            <section class="product-list">
                
                <?php 
                $search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
                ?>

                <!-- Chocolate Drop -->
                <?php if ($search == '' || strpos('chocolate drop', $search) !== false || strpos('adromischus', $search) !== false || strpos('spots', $search) !== false): ?>
                <div class="product-card">

					<div class="card-overlay">
						<p class="overlay-text">This slow-growing South African native features spade-shaped, grey-green leaves with purple-brown blotches. In Sarawak’s humidity, it requires well-draining soil and bright, indirect light to keep its vivid "chocolate" colors.</p>
					</div>
					
					<figure>
                        <img src="images/adro.jpg" alt="Adromischus maculatus">
						<figcaption>
								<a href="https://www.succulentsandsunshine.com/types-of-succulents/adromischus-maculatus-calico-hearts/" target="_blank">Adromischus maculatus</a>
						</figcaption>
                    </figure>

                    <h3>Chocolate Drop</h3>
                    <p>RM18</p>
					<p class="desc">"Look at my spots! They get darker and cooler when the sun shines on them."</p>
                </div>
                <?php endif; ?>

                <!-- Ruby Glow -->
                <?php if ($search == '' || strpos('ruby glow', $search) !== false || strpos('peperomia', $search) !== false || strpos('red', $search) !== false): ?>
                <div class="product-card">
				
					<div class="card-overlay">
						<p class="overlay-text">This compact ornamental plant is known for its translucent green leaf "windows" and deep burgundy undersides. Its unique V-shaped structure allows light to penetrate inner tissues, making it perfect for decorative windowsill pots.</p>
					</div>
					
                    <figure>
                        <img src="images/peper.jpg" alt="Peperomia graveolens">
                        <figcaption>
							<a href="https://www.succulentsandsunshine.com/types-of-succulents/peperomia-graveolens-ruby-glow/" target="_blank">Peperomia graveolens</a>
						</figcaption>
                    </figure>
					
                    <h3>Ruby Glow</h3>
                    <p>RM22</p>
					<p class="desc">"Green on top, but bright red underneath. I’m full of surprises!"</p>
                </div>
                <?php endif; ?>
                
                
                <!-- Sunrise -->
                <?php if ($search == '' || strpos('sunrise', $search) !== false || strpos('anacampseros', $search) !== false || strpos('gradient', $search) !== false): ?>
                <div class="product-card">
				
					<div class="card-overlay">
						<p class="overlay-text">A visual masterpiece, this variety displays a vibrant gradient of emerald, pink, and yellow that intensifies with sunlight. It naturally grows delicate white filaments between leaves to help trap moisture in tropical environments.</p>
					</div>
					
                    <figure>
                        <img src="images/anac.jpg" alt="Anacampseros telephiastrum variegata">
                        <figcaption>
							<a href="https://www.succulentsandsunshine.com/types-of-succulents/anacampseros-telephiastrum-variegata-sunrise/" target="_blank">Anacampseros telephiastrum variegata</a>
						</figcaption>
                    </figure>
					
                    <h3>Sunrise</h3>
                    <p>RM30</p>
					<p class="desc">"I change colors like a morning sky. The more sun I get, the pinker I turn!"</p>
                </div>
                <?php endif; ?>


                <!-- Living Stones -->
                <?php if ($search == '' || strpos('living stones', $search) !== false || strpos('lithops', $search) !== false): ?>
                <div class="product-card">
				
					<div class="card-overlay">
						<p class="overlay-text">Evolved to mimic pebbles, Lithops use camouflage to avoid being eaten in the wild. These fascinating "stones" consist of two thick leaves that produce a single, beautiful daisy-like flower once a year.</p>
					</div>
					
                    <figure>
                        <img src="images/lithops.jpg" alt="Lithops">
                        <figcaption>
							<a href="https://www.succulentsandsunshine.com/types-of-succulents/lithops/" target="_blank">Lithops</a>
						</figcaption>
                    </figure>
					
                    <h3>Living Stones</h3>
                    <p>RM28</p>
					<p class="desc">"I’m a master of hide-and-seek. I look just like a rock so nobody eats me!"</p>
                </div>
                <?php endif; ?>

				<!-- Crinkle Leaf Plant -->
				<?php if ($search == '' || strpos('crinkle leaf', $search) !== false || strpos('adromischus cristatus', $search) !== false): ?>
				<div class="product-card">
				
					<div class="card-overlay">
						<p class="overlay-text">Known for its distinctive 'crinkled' leaf tips and fuzzy stems, this slow-grower thrives in the warmth. It’s a resilient survivor that stores water in its plump, triangular leaves, perfect for those who occasionally forget to water!</p>
					</div>
					
					<figure>
                        <img src="images/crist.jpg" alt="Adromischus cristatus">
						<figcaption>
							<a href="https://www.succulentsandsunshine.com/types-of-succulents/adromischus-cristatus-crinkle-leaf-plant/" target="_blank">Adromischus cristatus</a>
						</figcaption>
					</figure>
					
					<h3>Crinkle Leaf Plant</h3>
                    <p>RM18</p>
					<p class="desc">"I’ve got tiny hairs and crinkled edges—I'm basically the key lime pie of the succulent world!"</p>
				</div>
				<?php endif; ?>

				<!-- Ice Plant -->
				<?php if ($search == '' || strpos('ice plant', $search) !== false || strpos('corpuscularia', $search) !== false): ?>
				<div class="product-card">
				
					<div class="card-overlay">
						<p class="overlay-text">With its cool, angular geometry and glaucous sheen, the Ice Plant is a structural standout. Native to South Africa, it loves a bit more hydration than its cousins and will reward you with a carpet of yellow flowers when it's happy.</p>
					</div>
					
                    <figure>
                        <img src="images/corpu.jpg" alt="Corpuscularia lehmannii">
                        <figcaption>
							<a href="https://www.succulentsandsunshine.com/types-of-succulents/corpuscularia-lehmannii-ice-plant/" target="_blank">Corpuscularia lehmannii</a>
						</figcaption>
                    </figure>
					
                    <h3>Ice Plant</h3>
                    <p>RM15</p>
					<p class="desc">"Don't let my name fool you; I'm not a fan of the cold! My thick, angular leaves love to stack up and reach for the sun."</p>
				</div>
				<?php endif; ?>
			
            </section>
        </section>



        <aside>
            <h3>Quick Care Guide</h3>
            <p>While succulents are hardy, they do have specific needs to stay healthy in East Malaysia:</p>
            <ol>
                <li>Water only when the soil is completely dry.</li>
                <li>Ensure the pot has drainage holes.</li>
                <li>Provide at least 4-6 hours of bright light.</li>
                <li>Avoid misting the leaves directly to prevent rot.</li>
            </ol>
        </aside>

        <section>
            <h3>Botanical Terms to Know</h3>
            <dl>
                <dt>Variegation</dt>
                <dd>The appearance of differently colored zones in the leaves due to lack of chlorophyll.</dd>
                <dt>Dormancy</dt>
                <dd>A period in a plant's life cycle when growth and development are temporarily stopped.</dd>
                <dt>Substrate</dt>
                <dd>The surface or material on or from which an organism lives, grows, or obtains its nourishment.</dd>
				<dt>Inflorescence</dt>
				<dd>The complete flower head of a plant, including stems, stalks, bracts, and flowers arranged in a specific pattern.</dd>
				<dt>Xylem</dt>
				<dd>The vascular tissue in plants that conducts water and dissolved nutrients upward from the root and also helps to form the woody element in the stem.</dd>
				<dt>Phototropism</dt>
				<dd>The orientation of a plant or other organism in response to light, either toward the source of light (positive) or away from it (negative).</dd>
				<dt>Stomata</dt>
				<dd>Tiny openings or pores, typically found on the undersides of leaves, that allow for gas exchange (intake of carbon dioxide and release of oxygen and water vapor).</dd>
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
    </main>

<?php include 'footer.inc.php'; ?>