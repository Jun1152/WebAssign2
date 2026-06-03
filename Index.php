<?php include 'header.inc.php'; ?>

	<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Yeo Zi Yi'>
    <title>Succulents | Cacti-Succulent Kuching</title>
    <link rel='stylesheet' href='styles/style.css'>
	</head>
	
	<body>
    <section class="hero-video">
        <video autoplay muted loop playsinline class="hero-bg-video">
            <source src="images/plantvideo.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="hero-overlay"></div>

        <div class="hero-text">
            <h2>Bring Nature Into Your Home</h2>
            <p>
                Explore elegant cacti, beautiful succulents, premium tools,
                and stylish pots for every plant lover in Kuching.
            </p>
            <a href="product1.html" class="hero-button">Explore Collection</a>
        </div>
    </section>

    <main>
        <section class="home-product-grid">
            <a href="product1.html" class="home-product-card">
                <img src="images/cactus-home.jpg" alt="Cactus Collection">
                <div class="home-product-overlay">
                    <h2>Cactus</h2>
                    <p>Explore our cactus collection</p>
                </div>
            </a>

            <a href="product2.html" class="home-product-card">
                <img src="images/succulent-home.jpg" alt="Succulents Collection">
                <div class="home-product-overlay">
                    <h2>Succulents</h2>
                    <p>Discover beautiful succulents</p>
                </div>
            </a>

            <a href="product3.html" class="home-product-card">
                <img src="images/tools-home.jpg" alt="Plant Tools">
                <div class="home-product-overlay">
                    <h2>Tools</h2>
                    <p>Find useful gardening tools</p>
                </div>
            </a>

            <a href="product4.html" class="home-product-card">
                <img src="images/pots-home.jpg" alt="Plant Pots">
                <div class="home-product-overlay">
                    <h2>Pots</h2>
                    <p>Shop elegant pots and planters</p>
                </div>
            </a>
        </section>

		<section class="reviews-section">
		<link rel="stylesheet" href="style.css">
			<h2>What Our Customers Say</h2>

			<div class="review-summary">
				<span class="customers-text">Customers</span>
				<span class="review-text">Review</span>
				<div class="summary-line">
					<span class="score">5.0</span>
					<span class="stars">★★★★★</span>
					<span class="review-count">2,192 reviews</span>
				</div>
			</div>

			<div class="reviews-container">	
				<div class="review-card">
					<div class="review-avatar photo-avatar">
						<img src="images/customer1.jpg" alt="buyer1">
					</div>
					<h3>Deshon Loh</h3>
					<div class="card-stars">★★★★★</div>
					<p class="review-date">3 days ago</p>
					<p class="review-text">
						Great service, swift delivery and personalised plant recommendations.
					</p>
				</div>

				<div class="review-card">
					<div class="review-avatar photo-avatar">
						<img src="images/customer1.jpg" alt="buyer2">
					</div>
					<h3>Mia Oon</h3>
					<div class="card-stars">★★★★★</div>
					<p class="review-date">4 days ago</p>
					<p class="review-text">
						The pots are very stylish and match my room perfectly. Highly recommended.
					</p>
				</div>
				
				<div class="review-card">
					<div class="review-avatar photo-avatar">
						<img src="images/customer1.jpg" alt="buyer3">
					</div>
					<h3>Devi Laksana</h3>
					<div class="card-stars">★★★★★</div>
					<p class="review-date">7 days ago</p>
					<p class="review-text">
						Received their plants as a gift and the after-sales service was excellent.
					</p>
				</div>
				
			</div>

		</section>
    </main>

<?php include 'footer.inc.php'; ?>