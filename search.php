<?php 
include 'header.inc.php'; 

// 1. Grab and clean the search query
$search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
?>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Search Results | Cacti-Succulent Kuching</title>
    <link rel='stylesheet' href='styles/style.css'>
</head>

<body>
<main>
    <section>
        <h2>Search Results</h2>
        <?php if ($search !== ''): ?>
            <p>Showing results for: <strong>"<?php echo htmlspecialchars($search); ?>"</strong></p>
        <?php else: ?>
            <p>Showing all catalog items.</p>
        <?php endif; ?>
    </section>

    <section class="product-list">
        <div class="card-grid">
            <?php
            // 2. Define the pages we want to search through
            $product_files = ['product1.php', 'product2.php', 'product3.php', 'product4.php'];
            $total_results = 0;

            foreach ($product_files as $file) {
                if (file_exists($file)) {
                    // 3. Force the file to use our current $search query string
                    $_GET['search'] = $search; 

                    // 4. Use Output Buffering to capture the page's HTML output safely
                    ob_start();
                    include $file;
                    $file_html = ob_get_clean();

                    // 5. Use DOMDocument to parse out ONLY the product cards that matched
                    $dom = new DOMDocument();
                    // Suppress HTML5 warnings caused by custom structure tags
                    @$dom->loadHTML('<?xml encoding="UTF-8">' . $file_html);
                    $xpath = new DOMXPath($dom);

                    // Grab elements that match your card classes
                    $query = "//*[contains(@class, 'flip-card') or contains(@class, 'product-card') or contains(@class, 'product-card-tools') or contains(@class, 'product-card4')]";
                    $cards = $xpath->query($query);

                    // Track uniqueness using element structural paths
                    $rendered_paths = [];

                    foreach ($cards as $card) {
                        // Get the unique node path of this specific element (e.g., /html/body/main/section/div/div[1])
                        $node_path = $card->getNodePath();
                        
                        // Check if we have already rendered a parent of this card to avoid inner-nest duplication
                        $is_duplicate = false;
                        foreach ($rendered_paths as $rendered_path) {
                            // If the current node path starts with an already rendered path, it's a child element
                            if (strpos($node_path, $rendered_path) === 0) {
                                $is_duplicate = true;
                                break;
                            }
                        }

                        if (!$is_duplicate) {
                            echo $dom->saveHTML($card);
                            $total_results++;
                            // Remember this element path to block its child elements from rendering again
                            $rendered_paths[] = $node_path;
                        }
                    }
                }
            }

            // 7. Handle the scenario where nothing matches the query
            if ($total_results === 0) {
                echo "<p class='no-results'>No products found matching your search. Try checking your spelling or looking for alternative terms!</p>";
            }
            ?>
        </div>
    </section>
</main>

<?php include 'footer.inc.php'; ?>