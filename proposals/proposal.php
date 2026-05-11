<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Send Proposal - TaskHunt</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            --success: #10b981;
            --warning: #f59e0b;
        }

        body {
            font-family: 'Poppins', 'Inter', sans-serif;
            background: var(--bg-page);
            color: var(--text-dark);
            overflow-x: hidden;
        }

 /* NAVBAR */
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0px 30px;
  height: 50px;
  background: #ffffff;
}
/* NAVBAR FIX */

.logo img {
  height: 180px;
  align-items: center;
  padding-bottom: 25px;
}
nav ul {
  list-style: none;
  display: flex;
  gap: 30px;
}
nav ul li a {
  color: var(--c4);
  text-decoration: none;
  font-size: 18px;
  transition: 0.3s;
}
nav ul li a:hover {
  color: var(--c3);
}
.nav-links {
  display: flex;
  list-style: none;
  gap: 30px;
  position: absolute;
  left: 50%;
  transform: translateX(-50%); 
}
.nav-links li a {
  text-decoration: none;
  color: #333;
  font-weight: 500;
}
/* BUTTONS */

.auth-buttons .btn {
    width: 90px; 
    height: 35px;
    padding: 8px 0; 
    text-align: center;
    display: inline-block;
    border-radius: 8px; 
    font-size: 17px;
    font-weight: 500;
    cursor: pointer;
}
.login-blue {
    background-color: #f0f6ff;
    color: white;
    border: none;
}
/* LOGIN BUTTON */

.login-btn {
    background-color: transparent;
    color: var(--c3);
    
}
.auth-buttons .btn:hover {
    opacity: 0.8;
    transform: translateY(-0.5px);
}
.signup-blue {
  background-color: var(--c3);
  color: white;
}

/* BUTTONS */
.btn {
  padding: 10px 18px;
  border-radius: 6px;
  border: none;
  cursor: pointer;
}


.nav-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    border: 2px solid var(--c3);
    transition: 0.3s ease;
}

.nav-avatar:hover {
    transform: translateY(-3px);
}

.profile-wrapper {
    position: relative;
    display: inline-block;
}

/* القائمة اللي بتفتح لما اقرب   من البروفايل */
.nav-dropdown {
    display: none;
    position: absolute;
    right: 0;
    top: 45px;
    background: white;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    border-radius: 8px;
    min-width: 140px;
    z-index: 1000;
}

.profile-wrapper:hover .nav-dropdown {
    display: block;
}

.nav-dropdown a {
    display: block;
    padding: 10px 15px;
    color: var(--c4);
    text-decoration: none;
    font-size: 14px;
    border-bottom: 1px solid #eee;
}

.nav-dropdown a:last-child { border: none; }

.nav-dropdown a:hover {
    background: #f8f9fa;
    color: var(--c3);
}

/* ستايل الجرس والتنبيهات */
.notifications {
    position: relative;
    font-size: 20px;
    color: var(--c4);
    cursor: pointer;
}

/* ت(Bell Wobble Animation) */
.animated-bell:hover .bell-icon {
    animation: bell-wobble 0.6s ease-in-out infinite; /* سرعة ونوع الحركة */
}

.bell-dot {
    position: absolute;
    bottom: -3px;
    right: 50%; 
    transform: translateX(50%);
    font-size: 6px; /* حجم النقطة */
    color: var(--c4); 
}

/* الاهتزاز */
@keyframes bell-wobble {
    0% { transform: rotate(0deg); }
    15% { transform: rotate(10deg); }
    30% { transform: rotate(-10deg); }
    45% { transform: rotate(5deg); }
    60% { transform: rotate(-5deg); }
    75% { transform: rotate(2deg); }
    100% { transform: rotate(0deg); }
}

        /* MAIN PROPOSAL SECTION */
        .proposal-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 24px;
        }

        /* Job Summary Card */
        .job-summary-card {
            background: var(--c5);
            border-radius: 24px;
            padding: 28px;
            margin-bottom: 28px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.04);
            border: 1px solid var(--border-light);
            border-top: 5px solid var(--c3);
        }
        .job-summary-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 16px;
        }
        .job-summary-header h2 {
            font-size: 1.6rem;
            color: var(--c3);
            font-weight: 700;
        }
        .budget-badge {
            background: var(--light);
            color: var(--c2);
            padding: 8px 18px;
            border-radius: 40px;
            font-weight: 700;
            font-size: 1.1rem;
        }
        .client-info-summary {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border-light);
        }
        .client-avatar {
            width: 48px;
            height: 48px;
            background: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--c3);
        }
        .client-details h4 {
            font-size: 1rem;
            margin-bottom: 4px;
        }
        .job-description-summary {
            color: var(--text-muted);
            line-height: 1.6;
            margin-top: 12px;
        }
        .tags-summary {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 16px;
        }
        .tags-summary span {
            background: #f0f4f9;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        /* Proposal Form */
        .proposal-form-card {
            background: var(--c5);
            border-radius: 28px;
            padding: 32px;
            box-shadow: 0 8px 28px rgba(0,0,0,0.06);
            border: 1px solid var(--border-light);
        }
        .form-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--c4);
        }
        .form-subtitle {
            color: var(--text-muted);
            margin-bottom: 28px;
            font-size: 0.9rem;
        }
        .form-group {
            margin-bottom: 24px;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--c4);
        }
        .form-group label i {
            color: var(--c3);
            margin-right: 8px;
        }
        .required-star {
            color: #e74c3c;
            margin-left: 4px;
        }
        input, textarea, select {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border-light);
            border-radius: 16px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.2s;
            background: #fdfdfe;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--c1);
            box-shadow: 0 0 0 3px rgba(0,168,255,0.1);
        }
        textarea {
            resize: vertical;
            min-height: 120px;
        }
        .row-2cols {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .bid-amount-wrapper {
            position: relative;
        }
        .bid-amount-wrapper input {
            padding-left: 30px;
        }
        .currency-symbol {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-weight: 600;
        }
        .attach-box {
            border: 2px dashed var(--border-light);
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            cursor: pointer;
            transition: 0.2s;
            background: #fafcff;
        }
        .attach-box:hover {
            border-color: var(--c3);
            background: #f0f8ff;
        }
        .attach-box i {
            font-size: 32px;
            color: var(--c3);
            margin-bottom: 8px;
        }
        .attach-box p {
            font-size: 13px;
            color: var(--text-muted);
        }
        #fileNames {
            margin-top: 10px;
            font-size: 12px;
            color: var(--c2);
        }
        .action-buttons {
            display: flex;
            gap: 16px;
            margin-top: 32px;
            flex-wrap: wrap;
        }
        .btn-submit {
            flex: 1;
            background: linear-gradient(135deg, var(--c3), var(--c1));
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,119,184,0.2);
        }
        .btn-cancel {
            flex: 0.5;
            background: #f1f3f5;
            color: var(--text-muted);
            border: none;
            padding: 14px 28px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-cancel:hover {
            background: #e9ecef;
        }
        .success-message {
            background: #d1fae5;
            color: #065f46;
            padding: 16px;
            border-radius: 16px;
            margin-bottom: 24px;
            display: none;
            align-items: center;
            gap: 12px;
        }
        .error-message {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 20px;
            display: none;
            font-size: 14px;
        }
        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid var(--border-light);
        }
        @media (max-width: 700px) {
            .row-2cols { grid-template-columns: 1fr; gap: 16px; }
            .proposal-form-card { padding: 24px; }
            .job-summary-card { padding: 20px; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
  <nav class="nav">
  <div class="logo">
    <a href="../Home/home.html">
      <img src="../Home/images/logo.png" alt="Logo">
    </a>
  </div>


  <ul class="nav-links">
    <li><a href="../work.html">Find Work</a></li>
    <li><a href="../Home/Hie Talent.html">Hire Talent</a></li>
    <li><a href="#about-section">About</a></li>
    <li><a href="#contact-section">Contact</a></li>
  </ul>
<div class="user-menu-container">
    <div class="notifications animated-bell">
        <i class="fa-solid fa-bell bell-icon"></i>
        <i class="fa-solid fa-circle bell-dot"></i>
    </div>
    
    <div class="profile-wrapper">
        <img src="client-avatar.png" alt="Profile" class="nav-avatar">
        <div class="nav-dropdown">
            <a href="../Dashboard/dash.client.html">Dashboard</a>
            <a href="../Home/home.html">Logout</a>
        </div>
    </div>
</div>
</nav>

<div class="proposal-container">
    <!-- Job Details Section (from URL params or stored) -->
    <div class="job-summary-card" id="jobSummaryCard">
        <div class="job-summary-header">
            <h2 id="jobTitle">Loading job details...</h2>
            <div class="budget-badge" id="jobBudget">--</div>
        </div>
        <div class="client-info-summary">
            <div class="client-avatar"><i class="fas fa-building"></i></div>
            <div class="client-details">
                <h4 id="clientName">Client Name</h4>
                <small><i class="fas fa-map-marker-alt"></i> Verified Client</small>
            </div>
        </div>
        <div class="job-description-summary" id="jobDescription">
            Loading description...
        </div>
        <div class="tags-summary" id="jobTags"></div>
    </div>

    <!-- Proposal Form -->
    <div class="proposal-form-card">
        <div class="success-message" id="successMsg">
            <i class="fas fa-check-circle" style="font-size: 24px;"></i>
            <span>✨ Proposal sent successfully! The client will review your offer.</span>
        </div>
        <div class="error-message" id="errorMsg"></div>
        
        <h2 class="form-title"><i class="fas fa-paper-plane"></i> Send Your Proposal</h2>
        <p class="form-subtitle">Stand out by crafting a personalized proposal that highlights your skills.</p>
        
      <form method="POST" action="../proposals/create_proposal.php">

    <!-- مهم جدًا -->
    <input type="hidden" name="post_id" value="<?= $_GET['id'] ?>">

    <div class="form-group">
        <label><i class="fas fa-dollar-sign"></i> Your Bid Amount <span class="required-star">*</span></label>
        <div class="bid-amount-wrapper">
            <span class="currency-symbol">$</span>
            <input type="number" id="bidAmount" name="price" placeholder="e.g., 450" step="1" min="1" required>
        </div>
        <small style="color: #6c757d;">Suggested range based on job budget</small>
    </div>

    <div class="row-2cols">
        <div class="form-group">
            <label><i class="fas fa-clock"></i> Estimated Duration <span class="required-star">*</span></label>
            <select id="duration" name="duration" required>
                <option value="">Select duration</option>
                <option value="Less than 1 week">Less than 1 week</option>
                <option value="1-2 weeks">1-2 weeks</option>
                <option value="2-4 weeks">2-4 weeks</option>
                <option value="1-3 months">1-3 months</option>
                <option value="3+ months">3+ months</option>
            </select>
        </div>

        <div class="form-group">
            <label><i class="fas fa-chart-line"></i> Experience Level</label>
            <select id="experienceLevel" name="experience">
                <option value="Entry Level">Entry Level (1-2 yrs)</option>
                <option value="Intermediate" selected>Intermediate (3-5 yrs)</option>
                <option value="Expert">Expert (6+ yrs)</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label><i class="fas fa-comment-dots"></i> Cover Letter / Proposal Message <span class="required-star">*</span></label>
        <textarea id="coverLetter" name="message" placeholder="Hi, I'm very interested in this project..." required></textarea>
        <small>Be specific and show you understand the project requirements.</small>
    </div>

    <div class="form-group">
        <label><i class="fas fa-question-circle"></i> Relevant Questions (Optional)</label>
        <textarea id="questions" name="questions" placeholder="Ask clarifying questions..."></textarea>
    </div>

    <div class="form-group">
        <label><i class="fas fa-paperclip"></i> Attachments (Portfolio / Resume)</label>
        <div class="attach-box">
            <i class="fas fa-cloud-upload-alt"></i>
            <p>File upload (disabled for now)</p>
        </div>
    </div>

    <div class="action-buttons">
        <button type="submit" class="btn-submit" onclick="this.disabled=true;">
            <i class="fas fa-paper-plane"></i> Send Proposal
        </button>

        <button type="button" class="btn-cancel" onclick="window.history.back();">
            <i class="fas fa-times"></i> Cancel
        </button>
    </div>

</form>
        <hr>
        <p style="font-size: 12px; color: #8a99b0; text-align: center; margin-top: 16px;">
            <i class="fas fa-shield-alt"></i> Your proposal is private and will be sent directly to the client.
        </p>
    </div>
</div>

<footer style="background: #051923; padding: 40px 32px 24px; margin-top: 60px; color: white;">
    <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
        <p>© 2025 Task Hunt — All rights reserved</p>
    </div>
</footer>

</body>
</html>