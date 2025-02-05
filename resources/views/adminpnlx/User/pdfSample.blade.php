<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A sleek, modern landing page">
    <title>Modern Landing Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>

    /* Reset & General Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Helvetica', sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
}

a {
    text-decoration: none;
    color: inherit;
}

/* Header Section */
.header {
    background: linear-gradient(45deg, #6a11cb, #2575fc);
    color: white;
    padding: 50px 0;
    text-align: center;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
}

nav .logo h1 {
    font-size: 2.5em;
    font-weight: 700;
    letter-spacing: 1px;
}

nav .nav-links {
    list-style-type: none;
    display: flex;
}

nav .nav-links li {
    margin: 0 15px;
}

nav .nav-links li a {
    color: white;
    font-size: 1.2em;
    transition: color 0.3s ease;
}

nav .nav-links li a:hover {
    color: #FF9800;
}

.hero {
    margin-top: 30px;
}

.hero h2 {
    font-size: 3.5em;
    margin-bottom: 15px;
    letter-spacing: 1px;
}

.hero p {
    font-size: 1.5em;
    margin-bottom: 20px;
}

.cta-button {
    background-color: #FF9800;
    color: white;
    padding: 12px 30px;
    font-size: 1.2em;
    border-radius: 30px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.cta-button:hover {
    background-color: #e68900;
    transform: translateY(-5px);
}

/* Features Section */
.features {
    display: flex;
    justify-content: space-around;
    margin: 50px 0;
    text-align: center;
}

.feature-box {
    background-color: white;
    padding: 30px;
    width: 30%;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.feature-box:hover {
    transform: translateY(-5px);
}

.feature-box h3 {
    font-size: 2em;
    margin-bottom: 15px;
    color: #2575fc;
}

.feature-box p {
    font-size: 1.2em;
}

/* Pricing Section */
.pricing {
    display: flex;
    justify-content: space-around;
    margin: 50px 0;
}

.pricing-box {
    background-color: white;
    padding: 30px;
    width: 30%;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease;
}

.pricing-box:hover {
    transform: translateY(-5px);
}

.pricing-box h3 {
    font-size: 2.5em;
    color: #6a11cb;
}

.pricing-box p {
    font-size: 1.5em;
    margin-bottom: 20px;
}

/* Contact Section */
.contact {
    text-align: center;
    margin: 50px 0;
    padding: 30px;
    background-color: white;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.contact h3 {
    font-size: 2.5em;
    margin-bottom: 20px;
}

.contact input,
.contact textarea {
    width: 70%;
    padding: 15px;
    font-size: 1.2em;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.contact button {
    padding: 15px 30px;
    font-size: 1.2em;
    background-color: #FF9800;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.contact button:hover {
    background-color: #e68900;
    transform: translateY(-5px);
}

/* Footer Section */
.footer {
    background-color: #333;
    color: white;
    padding: 20px;
    text-align: center;
    font-size: 1em;
}

.footer p {
    margin: 0;
}


</style>
<body>
    <!-- Header Section -->
    <header class="header">
        <nav>
            <div class="logo">
                <h1>BrandName</h1>
            </div>
            <ul class="nav-links">
                <li><a href="#features">Features</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <div class="hero">
            <h2>Discover Your New Favorite Tool</h2>
            <p>Streamline your workflow with our powerful features.</p>
            <a href="#features" class="cta-button">Get Started</a>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="feature-box">
            <h3>Feature One</h3>
            <p>Our first feature is super useful for any task.</p>
        </div>
        <div class="feature-box">
            <h3>Feature Two</h3>
            <p>Enhance your productivity with this powerful feature.</p>
        </div>
        <div class="feature-box">
            <h3>Feature Three</h3>
            <p>Never miss a deadline with our intelligent reminders.</p>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="pricing">
        <div class="pricing-box">
            <h3>Basic Plan</h3>
            <p>$29/month</p>
            <a href="#contact" class="cta-button">Sign Up</a>
        </div>
        <div class="pricing-box">
            <h3>Pro Plan</h3>
            <p>$49/month</p>
            <a href="#contact" class="cta-button">Sign Up</a>
        </div>
        <div class="pricing-box">
            <h3>Enterprise Plan</h3>
            <p>$99/month</p>
            <a href="#contact" class="cta-button">Sign Up</a>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <h3>Contact Us</h3>
        <form action="#">
            <input type="email" placeholder="Enter your email" required>
            <textarea placeholder="Your Message" required></textarea>
            <button type="submit" class="cta-button">Send Message</button>
        </form>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 BrandName. All rights reserved.</p>
    </footer>

</body>
</html>
