<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <a href='index.php' class='logo-link'>
        <img src='images/logo.png' alt='Cacti-Succulent Kuching Logo' class='header-logo'>
    </a>
    <h1>Cacti-Succulent Kuching</h1>
    <p>Your local home-based botanical heaven</p>
</header>

<nav class="navbar">
    <ul class="nav-links">
        <li class='has-dropdown'>
            <a href='#'>Products ▾</a>
            <ul class='dropdown'>
                <li><a href='product1.php'>Cactus</a></li>
                <li><a href='product2.php'>Succulents</a></li>
                <li><a href='product3.php'>Tools</a></li>
                <li><a href='product4.php'>Pots</a></li>
            </ul>
        </li>
        <li><a href='register.php'>Register</a></li>
        <li><a href='order.php'>Order</a></li>
        <li><a href='enquiry.php'>Enquiry</a></li>
        <li><a href='login.php'>Login</a></li>
    </ul>


</nav>
<form action="search.php" method="get" class="global-search-form">
    <input type="text" name="search" placeholder="Search by Product Name"
        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">

    <div class="search-button-row">
        <button type="submit">Search</button>
    </div>
</form>