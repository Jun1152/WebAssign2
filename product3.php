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
            <h2>Gardening Tools</h2>
            <p>High-quality tools specially chosen for cacti and succulents. Gentle on roots, strong enough for thorns.</p>
		</section>

           
            <form method="get" class="search-form">
                <input type="text" name="search" placeholder="Search tools..." 
                       value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit">Search</button>
                <a href="product3.php" class="clear-btn">Clear</a>
            </form>
            

            <!-- Products Section -->
            <section class="product-list">
                
                <?php 
                $search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
                ?>

                <!-- Mini Hand Trowel Set -->
                <?php if ($search == '' || strpos('mini trowel', $search) !== false || strpos('trowel set', $search) !== false || strpos('hand trowel', $search) !== false): ?>
                <div class="product-card-tools tools-hover">
                    <figure>
                        <img src="images/handtrowelset.jpg" alt="Mini Gardening Tool Set">
                        <figcaption><a href="https://www.tradeindia.com/products/trowel-set-hand-trowel-big-and-small-hand-cultivator-hand-weeder-and-hand-form-6306270.html" target="_blank">Mini Tool Set</a></figcaption>
                    </figure>
                    <h3>Mini Hand Trowel Set</h3>
                    <p>RM25</p>
                    <p class="desc">5-piece set perfect for transplanting small cacti and succulents without damaging roots.</p>
                </div>
                <?php endif; ?>

                <!-- Succulent Pruning Shears -->
                <?php if ($search == '' || strpos('pruning shears', $search) !== false || strpos('shears', $search) !== false): ?>
                <div class="product-card-tools tools-hover">
                    <figure>
                        <img src="images/succulentpruningshears.jpg" alt="Succulent Pruning Shears">
                        <figcaption><a href="https://www.walmart.ca/en/ip/Succulent-Gardening-Shears-Garden-Shears-Garden-Flower-Shop-Flower-Pruning-Shears/1Z35EOZ3I7VC" target="_blank">Pruning Shears</a></figcaption>
                    </figure>
                    <h3>Succulent Pruning Shears</h3>
                    <p>RM22</p>
                    <p class="desc">Sharp stainless-steel blades for clean cuts during propagation and shaping your plants.</p>
                </div>
                <?php endif; ?>

                <!-- Protective Gardening Gloves -->
                <?php if ($search == '' || strpos('gardening gloves', $search) !== false || strpos('gloves', $search) !== false): ?>
                <div class="product-card-tools tools-hover">
                    <figure>
                        <img src="images/gloves.jpg" alt="Gardening Gloves">
                        <figcaption><a href="https://shopee.com.my/1-Pair-Gardening-Gloves-Garden-Planting-Flower-Waterproof-Anti-skid-i.325416877.9548926231" target="_blank">Gardening Gloves</a></figcaption>
                    </figure>
                    <h3>Protective Gardening Gloves</h3>
                    <p>RM15</p>
                    <p class="desc">Thick yet flexible gloves designed to protect your hands from cactus spines.</p>
                </div>
                <?php endif; ?>

                <!-- Soil Scoop -->
                <?php if ($search == '' || strpos('soil scoop', $search) !== false || strpos('scoop', $search) !== false): ?>
                <div class="product-card-tools tools-hover">
                    <figure>
                        <img src="images/scoop.jpg" alt="Soil Scoop">
                        <figcaption><a href="https://growers-inc.com/soil-scoop-85-oz/" target="_blank">Soil Scoop</a></figcaption>
                    </figure>
                    <h3>Soil Scoop</h3>
                    <p>RM12</p>
                    <p class="desc">Ergonomic scoop for easy soil transfer into pots without spillage.</p>
                </div>
                <?php endif; ?>

                <!-- Propagation Tweezers -->
                <?php if ($search == '' || strpos('propagation tweezers', $search) !== false || strpos('tweezers', $search) !== false): ?>
                <div class="product-card-tools tools-hover">
                    <figure>
                        <img src="images/tweezers.jpg" alt="Propagation Tweezers">
                        <figcaption><a href="https://www.scienceequip.com.au/collections/tweezers-forceps?srsltid=AfmBOor0gxOMUBoHQRzFL5XiLqcioUCy7sDovrogpM3ixgwr0b5szxGk" target="_blank">Propagation Tweezers</a></figcaption>
                    </figure>
                    <h3>Propagation Tweezers</h3>
                    <p>RM10</p>
                    <p class="desc">Precision tweezers for gently removing baby plants and offsets.</p>
                </div>
                <?php endif; ?>

                <!-- Bulb Syringe Watering Tool -->
                <?php if ($search == '' || strpos('bulb syringe', $search) !== false || strpos('syringe', $search) !== false || strpos('watering tool', $search) !== false): ?>
                <div class="product-card-tools tools-hover">
                    <figure>
                        <img src="images/bulb.jpg" alt="Bulb Syringe">
                        <figcaption><a href="https://schaanhealthcare.ca/amsure-irrigation-bulb-syringe-AS011P" target="_blank">Bulb Syringe</a></figcaption>
                    </figure>
                    <h3>Bulb Syringe Watering Tool</h3>
                    <p>RM18</p>
                    <p class="desc">Gentle watering for delicate succulents — perfect control, no over-watering.</p>
                </div>
                <?php endif; ?>
            </section>

			<aside>
				<h3>Quick Care Guide</h3>
				<p>Helpful tips for using gardening tools effectively with your cacti and succulents in East Malaysia:</p>
				<ol>
					<li>Use the mini trowel and scoop gently to avoid damaging delicate roots.</li>
					<li>Always clean pruning shears and tweezers with alcohol after each use to prevent spreading diseases.</li>
					<li>Wear protective gloves when handling cacti to avoid spines and sap irritation.</li>
					<li>Use the bulb syringe for precise watering directly at the soil level, not on the leaves.</li>
				</ol>
			</aside>

			<section>
				<h3>Tools & Identification Terms</h3>
				<dl>
					<dt>Dichotomous Key</dt>
					<dd>A tool used for identification that gives two choices at each step</dd>
					<dt>Herbarium</dt>
					<dd>A collection of preserved, pressed plant specimens for study</dd>
					<dt>Taxonomy</dt>
					<dd>The science of naming, describing, and classifying plants</dd>
					<dt>Binomial Nomenclature</dt>
					<dd>The two-part scientific naming system (Genus species), e.g., Hibiscus rosa-sinensis</dd>
					<dt>Cultivar</dt>
					<dd>A plant variety produced by cultivation (often abbreviated “cv.”)</dd>
					<dt>Taxon</dt>
					<dd>A group of organisms at any rank (species, genus, family, etc.)</dd>
					<dt>Type Specimen</dt>
					<dd>The original specimen used to describe and name a species</dd>
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