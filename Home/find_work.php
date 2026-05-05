<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <title>Find Work - TaskHunt | Modern Job Cards</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --c1: #00A8FF;
            --c2: #0090E0;
            --c3: #0077B8;
            --c4: #051923;
            --c5: #ffffff;
            --light: #e6f7ff;
            --bg-page: #f7f9fc;
            --text-dark: #1e293b;
            --text-muted: #5a6874;
            --border-light: #eef2f8;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.02);
            --shadow-md: 0 8px 20px rgba(0, 0, 0, 0.06);
        }

        body {
            font-family: 'Poppins', 'Inter', sans-serif;
            background: var(--bg-page);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* ----- NAVBAR STYLES (matches reference) ----- */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
            height: 70px;
            background: #ffffff;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.03);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo img {
            height: 42px;
            margin-top: 8px;
            object-fit: contain;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 32px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .nav-links li a {
            text-decoration: none;
            color: var(--c4);
            font-weight: 500;
            font-size: 16px;
            transition: 0.2s;
        }

        .nav-links li a:hover {
            color: var(--c3);
        }

        .user-menu-container {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .notifications {
            position: relative;
            font-size: 22px;
            color: var(--c4);
            cursor: pointer;
        }

        .animated-bell:hover .bell-icon {
            animation: bell-wobble 0.6s ease-in-out infinite;
        }

        .bell-dot {
            position: absolute;
            bottom: -3px;
            right: -2px;
            font-size: 8px;
            color: #ff4d4f;
        }

        @keyframes bell-wobble {
            0% {
                transform: rotate(0deg);
            }

            15% {
                transform: rotate(12deg);
            }

            30% {
                transform: rotate(-10deg);
            }

            45% {
                transform: rotate(6deg);
            }

            60% {
                transform: rotate(-4deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        .nav-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: 2px solid var(--c3);
            cursor: pointer;
            transition: 0.2s;
            object-fit: cover;
        }

        .profile-wrapper {
            position: relative;
        }

        .nav-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 50px;
            background: white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            min-width: 150px;
            z-index: 200;
        }

        .profile-wrapper:hover .nav-dropdown {
            display: block;
        }

        .nav-dropdown a {
            display: block;
            padding: 10px 18px;
            color: var(--c4);
            text-decoration: none;
            font-size: 14px;
            border-bottom: 1px solid #eee;
        }

        .nav-dropdown a:last-child {
            border: none;
        }

        .nav-dropdown a:hover {
            background: #f8f9fa;
            color: var(--c3);
        }

        /* ----- HERO SECTION (compact clean) ----- */
        .hero-mini {
            background: linear-gradient(135deg, #ffffff 0%, #f4f9ff 100%);
            padding: 32px 24px 24px;
            text-align: center;
            border-bottom: 1px solid var(--border-light);
        }

        .hero-mini h1 {
            font-size: 2.3rem;
            font-weight: 700;
            color: var(--c4);
        }

        .hero-mini h1 span {
            color: var(--c3);
        }

        .hero-mini p {
            color: var(--text-muted);
            margin-top: 8px;
            font-size: 1rem;
        }

        /* FILTER BAR (neumorphic-like) */
        .filter-bar {
            padding: 20px 24px 10px;
            display: flex;
            justify-content: center;
        }

        .filter-container {
            background: #fff;
            padding: 12px 24px;
            border-radius: 60px;
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
            justify-content: center;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
        }

        .filter-container select {
            padding: 10px 18px;
            border-radius: 40px;
            border: 1px solid #d9e2ef;
            background: white;
            font-weight: 500;
            font-size: 13px;
            cursor: pointer;
            outline: none;
            font-family: 'Poppins', sans-serif;
        }

        .search-row {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin: 12px auto 0;
            max-width: 500px;
        }

        .search-row input {
            flex: 1;
            padding: 12px 18px;
            border-radius: 50px;
            border: 1px solid #e2e8f0;
            font-size: 14px;
            outline: none;
        }

        .search-btn {
            background: var(--c3);
            color: white;
            border: none;
            padding: 0 28px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
        }

        /* LAYOUT: sidebar + cards */
        .page-layout {
            display: flex;
            gap: 32px;
            max-width: 1400px;
            margin: 30px auto 60px;
            padding: 0 24px;
        }

        .sidebar {
            width: 280px;
            background: #fff;
            padding: 24px 16px;
            border-radius: 28px;
            border: 1px solid var(--border-light);
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .category {
            margin-bottom: 8px;
            border-bottom: 1px solid #f0f2f5;
        }

        .category-btn {
            width: 100%;
            background: none;
            border: none;
            padding: 12px 8px;
            font-size: 15px;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            color: #1e293b;
        }

        .sub-categories {
            list-style: none;
            padding-left: 20px;
            margin: 6px 0 12px;
            display: none;
        }

        .category.active .sub-categories {
            display: block;
        }

        .sub-categories li a {
            text-decoration: none;
            color: #5b6e8c;
            font-size: 13px;
            display: block;
            padding: 6px 0;
        }

        .sub-categories li a:hover {
            color: var(--c3);
            padding-left: 5px;
        }

        .arrow {
            font-size: 18px;
            transition: 0.2s;
        }

        .category.active .arrow {
            transform: rotate(90deg);
        }

        /* ----- MAIN CARDS (exactly as requested style - modern community feed style cards) ----- */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        /* THE NEW CARD STYLE: inspired by the second code (post-card) but tailored for jobs */
        .job-card-modern {
            background: var(--c5);
            padding: 24px;
            border-radius: 20px;
            box-shadow: var(--shadow-sm);
            transition: all 0.25s ease;
            border-top: 5px solid var(--c2);
            border-left: 1px solid var(--border-light);
            border-right: 1px solid var(--border-light);
            border-bottom: 1px solid var(--border-light);
        }

        .job-card-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.1);
            border-top-color: var(--c3);
        }

        .card-header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar-sm {
            width: 44px;
            height: 44px;
            background: var(--light);
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: var(--c2);
            font-size: 20px;
        }

        .client-details strong {
            font-size: 15px;
            color: var(--c4);
        }

        .time-badge {
            font-size: 11px;
            color: #8a99b0;
        }

        .job-badge {
            background: var(--c3);
            color: white;
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .job-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--c3);
            margin: 12px 0 8px;
            cursor: pointer;
        }

        .job-desc {
            color: #4a5a6e;
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 16px;
        }

        .skills-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 18px;
        }

        .skills-tags span {
            background: #f0f4f9;
            padding: 4px 12px;
            border-radius: 40px;
            font-size: 12px;
            font-weight: 500;
            color: #2c3e66;
        }

        .budget-chip {
            display: inline-block;
            background: var(--light);
            color: var(--c2);
            padding: 6px 16px;
            border-radius: 40px;
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 12px;
        }

        .action-bar {
            display: flex;
            gap: 28px;
            margin-top: 18px;
            padding-top: 16px;
            border-top: 1px solid #edf2f7;
        }

        .action-btn-card {
            background: none;
            border: none;
            font-weight: 600;
            color: var(--c3);
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
        }

        .action-btn-card i {
            font-size: 16px;
        }

        .action-btn-card:hover {
            color: #005f97;
            transform: scale(1.02);
        }

        .view-more-btn {
            display: block;
            margin: 20px auto;
            background: var(--c3);
            color: white;
            padding: 12px 28px;
            border-radius: 40px;
            border: none;
            font-weight: 700;
            cursor: pointer;
            width: fit-content;
            transition: 0.2s;
        }

        /* CTA FIXED */
        .cta-fixed {
            position: fixed;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%);
            background: #ffffff;
            padding: 12px 28px;
            border-radius: 80px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            gap: 20px;
            z-index: 1000;
            border: 1px solid var(--c3);
        }

        /* FOOTER matching reference */
        .footer {
            background: #051923;
            padding: 48px 32px 24px;
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
        }

        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 40px;
        }

        .footer-col {
            flex: 1;
            min-width: 180px;
        }

        .footer-col h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .footer-col ul {
            list-style: none;
            padding: 0;
        }

        .footer-col ul li {
            margin-bottom: 12px;
        }

        .footer-col ul li a {
            text-decoration: none;
            color: #adb5bd;
            transition: 0.2s;
        }

        .footer-col ul li a:hover {
            color: white;
            padding-left: 4px;
        }

        .footer-input {
            width: 100%;
            padding: 12px 14px;
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 14px;
            color: #fff;
            margin-bottom: 14px;
            outline: none;
        }

        .footer-btn {
            width: 100%;
            padding: 12px;
            background: #00a8e8;
            border: none;
            border-radius: 14px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .social-icons {
            display: flex;
            gap: 18px;
            margin-top: 20px;
        }

        .social-icon {
            width: 28px;
            height: 28px;
            filter: brightness(0) invert(1);
            opacity: 0.7;
            transition: 0.2s;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .page-layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                position: static;
            }

            .nav-links {
                display: none;
            }

            .user-menu-container {
                margin-left: auto;
            }
        }

        @media (max-width: 700px) {
            .filter-container {
                border-radius: 32px;
                flex-direction: column;
                width: 100%;
                align-items: stretch;
            }

            .action-bar {
                flex-wrap: wrap;
                gap: 16px;
            }
        }
    </style>
</head>

<body>

    <nav>
        <div class="logo">
            <a href="#"><img src="logo.png" alt="TaskHunt Logo"
                    onerror="this.src='https://placehold.co/120x40?text=TaskHunt'"></a>
        </div>
        <ul class="nav-links">
            <li><a href="#">Find Work</a></li>
            <li><a href="#">Hire Talent</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="user-menu-container">
            <div class="notifications animated-bell">
                <i class="fa-regular fa-bell bell-icon"></i>
                <i class="fa-solid fa-circle bell-dot"></i>
            </div>
            <div class="profile-wrapper">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile" class="nav-avatar">
                <div class="nav-dropdown">
                    <a href="#">Dashboard</a>
                    <a href="#">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="hero-mini">
        <h1>Find The <span>Perfect Job</span> For Your Skills</h1>
        <p>Browse projects, connect with clients, and start earning on your terms.</p>
    </section>

    <div class="search-row" style="margin-top: 20px;">
        <input type="text" id="searchKeyword" placeholder="Search by title, skill, or company...">
        <button class="search-btn" id="searchBtn"><i class="fas fa-search"></i> Find</button>
    </div>
    <div class="filter-bar">
        <div class="filter-container">
            <select id="typeFilter">
                <option value="all">All Categories</option>
                <option value="Data & AI">Data & AI</option>
                <option value="Development & IT">Development & IT</option>
                <option value="Design & Creative">Design & Creative</option>
                <option value="Sales & Marketing">Sales & Marketing</option>
                <option value="Writing & Translation">Writing & Translation</option>
                <option value="Admin & Support">Admin & Support</option>
                <option value="Finance & Accounting">Finance & Accounting</option>
                <option value="Legal">Legal</option>
                <option value="HR & Training">HR & Training</option>
            </select>
            <select id="priceFilter">
                <option value="all">All Prices</option>
                <option value="0-500">Under $500</option>
                <option value="500-1000">$500 - $1000</option>
                <option value="1000-9999">$1000+</option>
            </select>
            <select id="expFilter">
                <option value="all">All Experience</option>
                <option value="0-3">Junior (0-3 yrs)</option>
                <option value="4-7">Mid (4-7 yrs)</option>
                <option value="8-100">Expert (8+ yrs)</option>
            </select>
        </div>
    </div>

    <div class="page-layout">
        <aside class="sidebar">
            <div class="category"><button class="category-btn">Data & AI <span class="arrow">›</span></button>
                <ul class="sub-categories">
                    <li><a href="#" data-subtype="Data Analysis & Visualization">Data Analysis</a></li>
                    <li><a href="#" data-subtype="Machine Learning">Machine Learning</a></li>
                </ul>
            </div>
            <div class="category"><button class="category-btn">Development & IT <span class="arrow">›</span></button>
                <ul class="sub-categories">
                    <li><a href="#" data-subtype="Full Stack">Full Stack</a></li>
                    <li><a href="#" data-subtype="Backend">Backend</a></li>
                </ul>
            </div>
            <div class="category"><button class="category-btn">Design & Creative <span class="arrow">›</span></button>
                <ul class="sub-categories">
                    <li><a href="#" data-subtype="UI/UX">UI/UX</a></li>
                    <li><a href="#" data-subtype="Graphic Design">Graphic Design</a></li>
                </ul>
            </div>
            <div class="category"><button class="category-btn">Sales & Marketing <span class="arrow">›</span></button>
                <ul class="sub-categories">
                    <li><a href="#" data-subtype="Digital Marketing">Digital Marketing</a></li>
                </ul>
            </div>
            <div class="category"><button class="category-btn">Writing & Translation <span
                        class="arrow">›</span></button>
                <ul class="sub-categories">
                    <li><a href="#" data-subtype="Copywriting">Copywriting</a></li>
                </ul>
            </div>
            <div class="category"><button class="category-btn">Admin & Support <span class="arrow">›</span></button>
                <ul class="sub-categories">
                    <li><a href="#" data-subtype="Virtual Assistant">Virtual Assistant</a></li>
                </ul>
            </div>
            <div class="category"><button class="category-btn">Finance & Accounting <span
                        class="arrow">›</span></button>
                <ul class="sub-categories">
                    <li><a href="#" data-subtype="Financial Analysis">Financial Analysis</a></li>
                </ul>
            </div>
            <div class="category"><button class="category-btn">Legal <span class="arrow">›</span></button>
                <ul class="sub-categories">
                    <li><a href="#" data-subtype="Legal Advisory">Legal Advisory</a></li>
                </ul>
            </div>
            <div class="category"><button class="category-btn">HR & Training <span class="arrow">›</span></button>
                <ul class="sub-categories">
                    <li><a href="#" data-subtype="Recruitment">Recruitment</a></li>
                </ul>
            </div>
        </aside>

        <main class="main-content" id="mainContent">
           <?php
include '../config.php';

$result = $conn->query("SELECT posts.*, users.first_name 
FROM posts 
JOIN users ON posts.client_id = users.id 
ORDER BY posts.id DESC");

while($job = $result->fetch_assoc()):
?>

<div class="job-card-modern">

    <div class="card-header-row">
        <div class="user-info">
            <div class="avatar-sm"><i class="fas fa-user-tie"></i></div>
            <div class="client-details">
                <strong><?= $job['first_name'] ?></strong>
                <div class="time-badge">⏳ New</div>
            </div>
        </div>
        <span class="job-badge"><?= $job['type'] ?></span>
    </div>

    <h3 class="job-title"><?= $job['title'] ?></h3>

    <p class="job-desc"><?= $job['description'] ?></p>

    <div class="skills-tags">
        <?php 
        $tags = explode(",", $job['tags']);
        foreach($tags as $tag){
            echo "<span>#$tag</span>";
        }
        ?>
    </div>

    <div class="budget-chip">
        💰 $<?= $job['budget'] ?>
    </div>

    <div class="action-bar">
        <button class="action-btn-card"><i class="far fa-thumbs-up"></i> Interested</button>
<a href="../proposals/proposal.php?id=<?= $job['id'] ?>">
    <button class="action-btn-card">
        <i class="far fa-paper-plane"></i> Apply Now
    </button>
</a>    </div>

</div>

<?php endwhile; ?>

<button class="view-more-btn">Load More Jobs</button>
        </main>
    </div>

    <div class="cta-fixed" id="ctaFixed">
        <p>🚀 Don't see the right job?</p>
        <button id="ctaCreateProfileBtn">Create Profile</button>
    </div>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-col">
                <h3>Task Hunt</h3>
                <ul>
                    <li><a href="#">About Task Hunt</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
                <div class="social-section">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" class="social-icon" alt="FB">
                        <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" class="social-icon" alt="IG">
                        <img src="https://cdn-icons-png.flaticon.com/512/3046/3046125.png" class="social-icon" alt="TT">
                        <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" class="social-icon" alt="TW">
                    </div>
                </div>
            </div>
            <div class="footer-col">
                <h3>Community</h3>
                <ul>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Discussions</a></li>
                </ul>
            </div>
            <div id="contact-section" class="footer-col contact-col">
                <form id="contactForm">
                    <h3>Drop us a message</h3>
                    <input type="text" class="footer-input" placeholder="Name" required>
                    <input type="email" class="footer-input" placeholder="Email" required>
                    <textarea class="footer-input" rows="2" placeholder="Your Message" required></textarea>
                    <button type="submit" class="footer-btn">Send Message</button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 Task Hunt — All rights reserved</p>
        </div>
    </footer>

 
</body>

</html>