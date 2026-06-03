<?php include 'header.inc.php'; ?>
	<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Yeo Zi Yi'>
    <title>Succulents | Cacti-Succulent Kuching</title>
    <link rel='stylesheet' href='styles/style.css'>
	</head>
	
	<body>
    <main id="enhancement-container">
        <h2>Website Enhancements</h2>

        <section class="enhancement-row">
            <div class="enhancement-content">
                <h3>Enhancement 1: Image Flip on Hover</h3>
                <p>
                    When a user hovers over a product image on the cactus page,
                    the image flips horizontally.
                    This creates a fun and interactive experience for customers browsing the products.
                    <br>
                    CSS properties used: <strong>transform: rotateY(180deg)</strong>, <strong>perspective</strong>,
                    and <strong>backface-visibility</strong> — these are beyond basic lab requirements.
                    <br>
                    See it here: <a href="product1.html">Cactus Product Page</a>
                </p>
            </div>

            <video autoplay muted loop playsinline poster="image.jpg">
                <source src="images/enhancement1.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <br>
        </section>

        <section class="enhancement-row">
            <div class="enhancement-content">
                <h3>Enhancement 2: Hover-to-Reveal Info Overlay</h3>
                <p>
                    On the Succulents page, hovering over the image of the product card triggers a fast CSS transition that 
                    hides the original card and reveals a brief description underneath for each plant.
                    This allows the UI to remain clean and image-focused while providing an interactive action.
					<br>
					The <strong>pointer-events: none</strong> property is the secret to making it work smoothly; it tells the browser to "ignore" the overlay until it’s active, 
					ensuring the mouse can still trigger the hover effect without being blocked by invisible layers.
                    <br>
                    CSS properties used: position: <strong>absolute/relative</strong> for layering, <strong>display: flex</strong> for centering content,  
					 <strong>:has()</strong> pseudo-class to detect interaction on the <strong>img</strong> and toggle the overlay.
                    <br>
                    See it here: <a href="product2.html">Succulents Product Page</a>
                </p>
            </div>

            <video autoplay muted loop playsinline poster="image.jpg">
                <source src="images/enhancement2.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <br>
        </section>

        <section class="enhancement-row">
            <div class="enhancement-content">
                <h3>Enhancement 3: Floating Image Effect</h3>
                <p>
                    The hover effect makes the product image gently float upward when the user’s mouse stops over it.
                    This creates a light, airy, and interactive feel as the image lifts slightly off the page,
                    drawing attention to the cactus product without flipping or rotating.
                    <br>
                    CSS properties used: <strong>translateY (-8px)</strong>,
                    <strong>transition</strong>, and <strong>box-shadow</strong> — these are beyond basic lab
                    requirements.
                    <br>
                    See it here: <a href="product3.html">Tools Product Page</a>
                </p>
            </div>

            <video autoplay muted loop playsinline poster="image.jpg">
                <source src="images/enhancement3.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <br>
        </section>

        <section class="enhancement-row">
            <div class="enhancement-content">
                <h3>Enhancement 4: Hover-to-Reveal Product Overlay</h3>
                <p>
                    On the Pots page, hovering over a product image triggers a smooth CSS transition that
                    reveals an overlay containing additional product descriptions.
                    This allows the interface to remain neat and image-focused while still presenting
                    useful information only when needed.
                    <br>Technical Implementation: Utilizes relative positioning on the image container,
                    absolute positioning on the overlay, opacity transitions, and the <strong>:hover</strong>
                    pseudo-class. Flexbox is used to center the overlay content clearly within the image area.
                    <br>
                    CSS properties used: <strong>position: absolute</strong>, <strong>opacity</strong>,
                    <strong>transition</strong>, <strong>display: flex</strong>, and
                    <strong>background-color with rgba transparency</strong> — these are beyond basic lab requirements.
                    <br>
                    See it here: <a href="product4.html">Pots Product Page</a>
                </p>
            </div>

            <video autoplay muted loop playsinline poster="image.jpg">
                <source src="images/enhancement4.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <br>
        </section>

    </main>


<?php include 'footer.inc.php'; ?>