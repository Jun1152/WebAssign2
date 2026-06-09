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
                <h3>Enhancement 1: Global Product Search Bar</h3>
                <p>
                    Integrated directly into the global header navigation, this real-time search utility allows customers to quickly look up items across the entire catalog from any page on the website. To provide an optimal user experience, the search bar intelligently preserves and redisplays the user's active query string after the results page loads.
                    <br>
                    Technical Implementation: Employs a persistent HTML form utilizing the <strong>GET</strong> method, security scrubbing via <strong>htmlspecialchars()</strong>, conditional checking using <strong>isset()</strong>, and custom Flexbox styling for the search action button configuration.
                    <br>
                    See it here: <a href="search.php">Product Search Results</a>
                </p>
            </div>

            <video autoplay muted loop playsinline poster="image.jpg">
                <source src="images/productsearchbar.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <br>
        </section>

        <section class="enhancement-row">
            <div class="enhancement-content">
                <h3>Enhancement 2: Multi-Layered Anti-Spam Suite</h3>
                <p>
                    A comprehensive, defensive security script deployed within user registration to protect the system's database against automated bots and rapid submission floods. It applies a hidden "honeypot" field invisible to human eyes, alongside an active tracking layer that calculates request intervals and logs malicious patterns.
                    <br>
                    Technical Implementation: Uses a trap element masked by CSS via <strong>display: none !important</strong> and <strong>tab-index: -1</strong>. The backend monitors <strong>$_SESSION</strong> timestamps with <strong>time()</strong> to penalize rapid-click spammers, managing state thresholds and returning structured HTTP headers like <strong>429 Too Many Requests</strong> and <strong>400 Bad Request</strong>.
                    <br>
                    See it here: <a href="register.php">Customer Registration Page</a>
                </p>
            </div>

            <video autoplay muted loop playsinline poster="image.jpg">
                <source src="images/antispam.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <br>
        </section>

        <section class="enhancement-row">
            <div class="enhancement-content">
                <h3>Enhancement 3: Product Management Module</h3>
                <p>
                    A dedicated administration dashboard component allowing store owners to review and adjust live store data seamlessly. This control layer features structured array posting, enabling administrators to overwrite pricing configurations and active stock counts across the whole botanical directory inside a singular form action.
                    <br>
                    Technical Implementation: Implements role-based access control checking against <strong>$_SESSION['role']</strong> variables. It constructs custom tabular input fields utilizing HTML array nomenclature (<strong>product_id[]</strong>, <strong>price[]</strong>, and <strong>stock[]</strong>), passing them directly into a backend batch-processing <strong>foreach loop</strong> linked to dynamic SQL <strong>UPDATE</strong> queries.
                    <br>
                    See it here: <a href="inventory.php">Inventory Management Page</a>
                </p>
            </div>

            <video autoplay muted loop playsinline poster="image.jpg">
                <source src="images/productmanagementmodule.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <br>
        </section>

        <section class="enhancement-row">
            <div class="enhancement-content">
                <h3>Enhancement 4: Transaction & Invoice Generator</h3>
                <p>
                    A dynamic order settlement module that acts as the financial record layer for the botanical store. Once a transaction lifecycle is recorded, this subsystem automates database query responses to extract localized customer details and mapped inventory variables, converting raw active logs into an optimized, printer-friendly tax document.
                    <br>
                    Technical Implementation: Utilizes <strong>$_GET['order_id']</strong> sanitation mappings and strict relational database checking via <strong>mysqli_query()</strong> to pull distinct purchase records. The extracted data string splits compound identifiers into separate records using <strong>explode()</strong>, while computing running balances inside a custom <strong>foreach loop</strong> before feeding data to print media optimization styles.
                    <br>
                    See it here: <a href="generate_invoice.php">Tax Invoice Page</a>
                </p>
            </div>

            <video autoplay muted loop playsinline poster="image.jpg">
                <source src="images/inv.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <br>
        </section>

        <section class="enhancement-row">       
    <div class="enhancement-content">
        <h3>Enhancement 5: Web UI Testing Tool using TestCase Studio</h3>

        <p>
            This enhancement uses <strong>TestCase Studio</strong>, a browser-based Web UI testing tool,
            to record and test important user actions on the Cacti-Succulent Kuching website.
            The tool was used to record interface testing steps such as admin login,
            dashboard navigation, product search, order management, and enquiry management.
            <br><br>

            This enhancement goes beyond the specified requirements because the website is tested
            using a Web UI testing tool instead of only relying on manual testing.
            TestCase Studio records browser actions and exports them into Playwright JavaScript test scripts.
            <br><br>

            Supporting scripts:
            <br>
            <a href="images/01_AdminLogin_TestScript.js" target="_blank">Admin Login Test Script</a>
            <br>
            <a href="images/02_OrderManagement_TestScript.js" target="_blank">Order Management Test Script</a>
        </p>
    </div>

    <video autoplay muted loop playsinline>
        <source src="images/Web_UI_Testing_Demo.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

       

    </main>


<?php include 'footer.inc.php'; ?>