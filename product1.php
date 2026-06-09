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
        <h2>Cactus Collection</h2>
        <p>Cacti are the ultimate survivors of the plant world, perfectly suited for busy urban gardeners in
            Kuching. These remarkable plants store water in their thick stems, thriving even through dry spells and
            neglect. Our curated collection brings together unique shapes and striking forms that make a bold
            statement in any home or office space.</p>
    </section>


    <!-- Products Section -->
    <section class="product-list">
        <p class="flip-hint">Hover over a card to see more details</p>

        <div class="card-grid">

            <?php 
            $search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
            ?>

            <!-- Barrel Cactus -->
            <?php if ($search == '' || strpos('golden barrel cactus', $search) !== false || strpos('desert water tank', $search) !== false): ?>
            <div class="flip-card">
                <div class="flip-inner">
                    <div class="face front">
                        <div class="product-card">
                            <figure>
                                <img src="images/barrelcactus.jpg" alt="Barrel cactus with distinctive ribs and spines">
                                <figcaption>Echinocactus grusonii<br>
                                    Source: <a href="https://www.succulentsandsunshine.com/types-of-succulents/echinocactus-grusonii-golden-barrel-cactus/" target="_blank">Echinocactus grusonii</a>
                                </figcaption>
                            </figure>
                            <h3>Golden Barrel Cactus</h3>
                            <p>RM35</p>
                            <p class="desc">"The desert's water tank — tough, round, and full of surprises."</p>
                        </div>
                    </div>
                    <div class="face back">
                        <div class="back-content">
                            <h3>Barrel Cactus</h3>
                            <span class="sci-name">Echinocactus grusonii</span>
                            <p>Cylindrical with prominent ribs and spines. Stores water efficiently and produces yellow flowers in summer. Great for beginners.</p>
                            <div class="care-block">
                                <span class="care-label">Care Tips</span>
                                <ol>
                                    <li>Full sun — 6+ hours daily</li>
                                    <li>Water every 3–4 weeks in summer</li>
                                    <li>Fast-draining soil with perlite</li>
                                    <li>Low-nitrogen feed once a month</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Bunny Ear Cactus -->
            <?php if ($search == '' || strpos('bunny ear cactus', $search) !== false || strpos('soft looks', $search) !== false): ?>
            <div class="flip-card">
                <div class="flip-inner">
                    <div class="face front">
                        <div class="product-card">
                            <figure>
                                <img src="images/bunnyearcactus.jpg" alt="Bunny Ear cactus with distinctive rounded pads">
                                <figcaption>Opuntia microdasys<br>
                                    Source: <a href="https://www.pinterest.com/pin/1113726182854198295/" target="_blank">Opuntia microdasys</a>
                                </figcaption>
                            </figure>
                            <h3>Bunny Ear Cactus</h3>
                            <p>RM28</p>
                            <p class="desc">"Soft looks, sharp surprise — handle with care!"</p>
                        </div>
                    </div>
                    <div class="face back">
                        <div class="back-content">
                            <h3>Bunny Ear Cactus</h3>
                            <span class="sci-name">Opuntia microdasys</span>
                            <p>Flat, ear-shaped pads with tiny glochid bristles. Easy to grow and produces cream-yellow blooms in warm months.</p>
                            <div class="care-block">
                                <span class="care-label">Care Tips</span>
                                <ol>
                                    <li>Full sun — 6+ hours daily</li>
                                    <li>Water every 2–3 weeks in summer</li>
                                    <li>Fast-draining soil, never waterlogged</li>
                                    <li>Low-nitrogen feed monthly</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Old Man Cactus -->
            <?php if ($search == '' || strpos('old man cactus', $search) !== false || strpos('wise woolly', $search) !== false): ?>
            <div class="flip-card">
                <div class="flip-inner">
                    <div class="face front">
                        <div class="product-card">
                            <figure>
                                <img src="images/oldmancactus.jpg" alt="Old Man Cactus with distinctive white hair-like spines">
                                <figcaption>Cephalocereus senilis<br>
                                    Source: <a href="https://www.succulentsandsunshine.com/types-of-succulents/cephalocereus-senilis-old-man-cactus/" target="_blank">Cephalocereus senilis</a>
                                </figcaption>
                            </figure>
                            <h3>Old Man Cactus</h3>
                            <p>RM42</p>
                            <p class="desc">"Wise, woolly, and wonderfully weird."</p>
                        </div>
                    </div>
                    <div class="face back">
                        <div class="back-content">
                            <h3>Old Man Cactus</h3>
                            <span class="sci-name">Cephalocereus senilis</span>
                            <p>Covered in soft white hair-like spines. Slow-growing and long-lived — a real showpiece. Native to the highlands of Mexico.</p>
                            <div class="care-block">
                                <span class="care-label">Care Tips</span>
                                <ol>
                                    <li>Bright to full sun daily</li>
                                    <li>Water every 2–3 weeks in summer</li>
                                    <li>Keep hair dry — water soil only</li>
                                    <li>Low-nitrogen feed monthly</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Peanut Cactus -->
            <?php if ($search == '' || strpos('peanut cactus', $search) !== false || strpos('small but mighty', $search) !== false): ?>
            <div class="flip-card">
                <div class="flip-inner">
                    <div class="face front">
                        <div class="product-card">
                            <figure>
                                <img src="images/peanutcactus.jpg" alt="Peanut cactus with peanut-shaped segments">
                                <figcaption>Echinopsis chamaecereus<br>
                                    Source: <a href="https://www.succulentsandsunshine.com/types-of-succulents/echinopsis-chamaecereus/" target="_blank">Echinopsis chamaecereus</a>
                                </figcaption>
                            </figure>
                            <h3>Peanut Cactus</h3>
                            <p>RM22</p>
                            <p class="desc">"Small but mighty — big blooms in a tiny package."</p>
                        </div>
                    </div>
                    <div class="face back">
                        <div class="back-content">
                            <h3>Peanut Cactus</h3>
                            <span class="sci-name">Echinopsis chamaecereus</span>
                            <p>Small clustering segments that resemble peanuts. Produces vivid orange-red flowers. Perfect for pots and windowsills.</p>
                            <div class="care-block">
                                <span class="care-label">Care Tips</span>
                                <ol>
                                    <li>Full sun — poor light distorts growth</li>
                                    <li>Water every 2–3 weeks in summer</li>
                                    <li>Pot must have large drainage holes</li>
                                    <li>Water at soil only, not the body</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Fairy Castle Cactus -->
            <?php if ($search == '' || strpos('fairy castle cactus', $search) !== false): ?>
            <div class="flip-card">
                <div class="flip-inner">
                    <div class="face front">
                        <div class="product-card">
                            <figure>
                                <img src="images/fairycastlecactus.jpg" alt="Fairy castle cactus">
                                <figcaption>Ariocarpus fissuratus<br>
                                    Source: <a href="#" target="_blank">Ariocarpus fissuratus</a>
                                </figcaption>
                            </figure>
                            <h3>Fairy Castle Cactus</h3>
                            <p>RM45</p>
                            <p class="desc">"A miniature castle in your garden."</p>
                        </div>
                    </div>
                    <div class="face back">
                        <div class="back-content">
                            <h3>Fairy Castle Cactus</h3>
                            <span class="sci-name">Ariocarpus fissuratus</span>
                            <p>Multiple branching column stems resembling a miniature castle. Very slow growing and highly prized by collectors.</p>
                            <div class="care-block">
                                <span class="care-label">Care Tips</span>
                                <ol>
                                    <li>Full sun</li>
                                    <li>Water sparingly</li>
                                    <li>Well-draining soil</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Ming Thing Cactus (example of remaining item) -->
            <?php if ($search == '' || strpos('ming thing cactus', $search) !== false): ?>
            <div class="flip-card">
                <div class="flip-inner">
                    <div class="face front">
                        <div class="product-card">
                            <figure>
                                <img src="images/mingthingcactus.jpg" alt="Ming Thing Cactus">
                                <figcaption>Cereus peruvianus 'Ming Thing'<br>
                                    Source: <a href="#" target="_blank">Ming Thing</a>
                                </figcaption>
                            </figure>
                            <h3>Ming Thing Cactus</h3>
                            <p>RM38</p>
                            <p class="desc">"A unique twisted form that looks like a piece of art."</p>
                        </div>
                    </div>
                    <div class="face back">
                        <div class="back-content">
                            <h3>Ming Thing Cactus</h3>
                            <span class="sci-name">Cereus peruvianus 'Ming Thing'</span>
                            <p>Highly mutated form with twisted, sculptural stems. Very popular among cactus collectors.</p>
                            <div class="care-block">
                                <span class="care-label">Care Tips</span>
                                <ol>
                                    <li>Full sun</li>
                                    <li>Water every 2-3 weeks</li>
                                    <li>Well draining soil</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </section>

    <!-- Quick Care Guide -->
    <section>
        <h3>Quick Care Guide for Cacti in East Malaysia</h3>
        <!-- Your original Quick Care Guide content goes here -->
    </section>

    <!-- Botanical Terms to Know (from your original file) -->
    <section>
        <h3>Botanical Terms to Know</h3>
        <dl>
            <dt>Areole</dt>
            <dd>The small, cushion-like area on a cactus from which spines, flowers, and new growth emerge.</dd>
            <dt>Glochid</dt>
            <dd>Tiny, barbed bristles found on some cacti, especially Opuntia species.</dd>
            <dt>Substrate</dt>
            <dd>The surface or material on or from which an organism lives, grows, or obtains its nourishment.</dd>
            <dt>Xerophyte</dt>
            <dd>A plant adapted to survive in an environment with little water.</dd>
            <dt>Spine</dt>
            <dd>Modified leaves or stipules that serve as a defense mechanism.</dd>
            <dt>Succulent</dt>
            <dd>A plant that stores water in its leaves, stems, or roots.</dd>
            <dt>Dormancy</dt>
            <dd>A period when the plant's growth slows down or stops, usually in winter.</dd>
        </dl>
    </section>

    <!-- Return & Exchange Policy (from your original file) -->
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