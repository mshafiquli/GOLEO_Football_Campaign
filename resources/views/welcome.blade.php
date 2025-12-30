<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التصويت - الاتحاد vs الهلال</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .voting-container {
            min-height: 100vh;
            display: flex;
            position: relative;
        }

        /* Al-Ittihad Side (Yellow/Gold) */
        .team-side {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            position: relative;
        }

        .ittihad-side {
            position: relative;
            overflow: hidden;
            background:
                repeating-linear-gradient(-45deg,
                    rgba(255, 255, 255, 0.08) 0px,
                    rgba(255, 255, 255, 0.08) 10px,
                    rgba(0, 0, 0, 0.04) 10px,
                    rgba(0, 0, 0, 0.04) 20px),
                linear-gradient(135deg, #f8d44a 0%, #f4b41a 40%, #b07d00 100%);
            clip-path: polygon(0 0, 100% 0, 85% 100%, 0 100%);
        }

        .ittihad-side::before {
            content: "";
            position: absolute;
            right: -80px;
            bottom: -80px;
            width: 380px;
            height: 380px;
            background: radial-gradient(circle,
                    rgba(0, 0, 0, 0.85) 0%,
                    rgba(0, 0, 0, 0.6) 25%,
                    rgba(0, 0, 0, 0.35) 45%,
                    rgba(0, 0, 0, 0.12) 65%,
                    transparent 75%);
            border-radius: 50%;
            z-index: 1;
        }

        .hilal-side {
            position: relative;
            overflow: hidden;
            background:
                repeating-linear-gradient(-45deg,
                    rgba(255, 255, 255, 0.08) 0px,
                    rgba(255, 255, 255, 0.08) 10px,
                    rgba(0, 0, 0, 0.04) 10px,
                    rgba(0, 0, 0, 0.04) 20px),
                linear-gradient(135deg, #4c7cff 0%, #2e5cdf 45%, #142a72 100%);
            clip-path: polygon(15% 0, 100% 0, 100% 100%, 0 100%);
        }

        .hilal-side::before {
            content: "";
            position: absolute;
            left: -80px;
            bottom: -80px;
            width: 380px;
            height: 380px;
            background: radial-gradient(circle,
                    rgba(0, 0, 0, 0.75) 0%,
                    rgba(0, 0, 0, 0.5) 25%,
                    rgba(0, 0, 0, 0.25) 45%,
                    rgba(0, 0, 0, 0.08) 65%,
                    transparent 75%);
            border-radius: 50%;
            z-index: 1;
        }

        .vs-badge {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            background: #000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 5px solid #fff;
            z-index: 10;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .vs-badge span {
            color: #fff;
            font-size: 32px;
            font-weight: bold;
        }

        /* Team Logo */


        .team-logo img {
            max-width: 140px;
            max-height: 200px;
        }

        .team-logo-number {
            position: absolute;
            top: -15px;
            left: -15px;
            width: 60px;
            height: 60px;
            background: #000;
            color: #fff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        /* Team Name */
        .team-name {
            font-size: 52px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 10px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        }

        .team-subtitle {
            font-size: 20px;
            color: #fff;
            margin-bottom: 40px;
            opacity: 0.95;
        }

        /* Vote Button */
        .vote-btn {
            padding: 18px 50px;
            font-size: 22px;
            font-weight: bold;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .vote-btn-ittihad {
            background: #000;
            color: #f4b41a;
        }

        .vote-btn-ittihad:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            background: #1a1a1a;
        }

        .vote-btn-hilal {
            background: #fff;
            color: #2e5cdf;
        }

        .vote-btn-hilal:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            background: #f0f0f0;
        }

        .vote-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 3px solid currentColor;
        }

        .vote-btn-ittihad .vote-icon {
            background: #f4b41a;
        }

        .vote-btn-hilal .vote-icon {
            background: #2e5cdf;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .ittihad-side {
                clip-path: polygon(0 0, 100% 0, 100% 48%, 0 52%);
            }

            .hilal-side {
                clip-path: polygon(0 48%, 100% 52%, 100% 100%, 0 100%);
            }

            .voting-container {
                flex-direction: column;
            }

            .vs-badge {
                width: 80px;
                height: 80px;
            }

            .vs-badge span {
                font-size: 24px;
            }

            .team-logo {
                width: 150px;
                height: 150px;
            }

            .team-logo img {
                max-width: 110px;
                max-height: 110px;
            }

            .team-name {
                font-size: 42px;
            }

            .team-subtitle {
                font-size: 18px;
            }
        }

        @media (max-width: 576px) {
            .team-logo {
                width: 120px;
                height: 120px;
                margin-bottom: 20px;
            }

            .team-logo img {
                max-width: 90px;
                max-height: 90px;
            }

            .team-logo-number {
                width: 50px;
                height: 50px;
                font-size: 28px;
            }

            .team-name {
                font-size: 36px;
            }

            .team-subtitle {
                font-size: 16px;
                margin-bottom: 30px;
            }

            .vote-btn {
                padding: 15px 40px;
                font-size: 18px;
            }

            .vs-badge {
                width: 70px;
                height: 70px;
            }

            .vs-badge span {
                font-size: 20px;
            }
        }
    </style>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #000;
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 0;
        }

        /* Header Section */
        .header-section {
            background: #000;
            padding: 40px 20px 30px;
            text-align: center;
        }

        .main-title {
            font-size: 42px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .sub-title {
            font-size: 22px;
            color: #fff;
            opacity: 0.9;
            margin-bottom: 0;
        }

        /* Stats Section */
        .stats-section {
            background: #0a1628;
            padding: 30px 20px;
        }

        .stats-header {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }

        .stats-icon {
            width: 20px;
            height: 20px;
        }

        .stats-label {
            color: #8b96a5;
            font-size: 16px;
        }

        .live-badge {
            color: #ff0000;
            font-size: 16px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .live-dot {
            width: 10px;
            height: 10px;
            background: #ff0000;
            border-radius: 50%;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        /* Results Container */
        .results-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 15px;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
            padding: 0 20px;
        }

        .team-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            min-width: 120px;
        }

        .team-votes {
            font-size: 36px;
            font-weight: bold;
            color: #fff;
        }

        .team-label {
            font-size: 16px;
            color: #8b96a5;
        }

        /* Progress Bar Container */
        .progress-bar-container {
            flex: 1;
            height: 50px;
            background: transparent;
            border-radius: 0;
            overflow: hidden;
            position: relative;
            display: flex;
        }

        .progress-bar-hilal {
            background: #2563eb;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 20px;
            transition: width 0.5s ease;
        }

        .progress-bar-ittihad {
            background: #f59e0b;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding-left: 20px;
            transition: width 0.5s ease;
        }

        .percentage-text {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .trend-icon {
            width: 20px;
            height: 20px;
        }

        /* Team Labels Below */
        .team-labels {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .team-name-label {
            font-size: 18px;
            color: #8b96a5;
            min-width: 120px;
            text-align: center;
        }

        .team-name-label.right {
            text-align: right;
        }

        .team-name-label.left {
            text-align: left;
        }

        .total-votes {
            flex: 1;
            text-align: center;
            color: #8b96a5;
            font-size: 16px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-title {
                font-size: 28px;
            }

            .sub-title {
                font-size: 16px;
            }

            .team-votes {
                font-size: 28px;
            }

            .team-label {
                font-size: 14px;
            }

            .percentage-text {
                font-size: 18px;
            }

            .progress-bar-container {
                height: 40px;
            }

            .team-info {
                min-width: 80px;
            }

            .team-name-label {
                font-size: 14px;
                min-width: 80px;
            }
        }

        @media (max-width: 576px) {
            .main-title {
                font-size: 22px;
            }

            .sub-title {
                font-size: 14px;
            }

            .team-votes {
                font-size: 22px;
            }

            .percentage-text {
                font-size: 16px;
            }

            .progress-bar-container {
                height: 35px;
            }

            .results-container {
                gap: 10px;
            }

            .team-info {
                min-width: 60px;
            }

            .team-name-label {
                font-size: 12px;
                min-width: 60px;
            }
        }

        /* Footer Section */
        .footer-section {
            background: #000;
            padding: 30px 20px;
            text-align: center;
            margin-top: auto;
        }

        .footer-powered {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
            font-weight: 300;
        }

        .footer-logo {
            font-size: 42px;
            font-weight: bold;
            color: #fff;
            letter-spacing: 2px;
        }

        .vote-modal {
            border-radius: 18px;
            overflow: hidden;
            border: none;
        }

        /* header */
        .vote-modal-header {
            background: linear-gradient(135deg, #ffcc00, #d79600);
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
            font-size: 20px;
            font-weight: 700;
        }

        .vote-modal-header h5 {
            margin: 0;
        }

        .vote-modal-header .btn-close {
            filter: invert(1);
        }

        .header-icons {
            display: flex;
            gap: 8px;
        }

        .circle {
            width: 22px;
            height: 22px;
            border-radius: 50%;
        }

        .circle.black {
            background: #111;
        }

        .circle.yellow {
            background: #ffe600;
        }

        /* body */
        .vote-modal-body {
            padding: 25px 22px;
            text-align: center;
        }

        /* tabs */
        .switch-tabs {
            display: flex;
            background: #f3f3f3;
            border-radius: 14px;
            padding: 4px;
            margin-bottom: 18px;
        }

        .switch-tabs .tab {
            flex: 1;
            border: none;
            background: none;
            padding: 10px 0;
            border-radius: 12px;
            font-weight: 600;
        }

        .switch-tabs .active {
            background: #ffc400;
            color: #fff;
        }

        /* input */
        .phone-input {
            height: 52px;
            border-radius: 14px;
            font-size: 16px;
            margin: 12px 0 18px;
        }

        /* submit */
        .submit-btn {
            width: 100%;
            background: #ffc400;
            border: none;
            border-radius: 16px;
            padding: 14px;
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.25);
        }

        /* privacy text */
        .privacy-text {
            margin-top: 14px;
            font-size: 13px;
            color: #888;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="header-section">
        <h1 class="main-title">الأكثر شعبية في المملكة.. الزعيم أم العميد؟</h1>
        <p class="sub-title">المدرج الرقمي لا يكذب.. سجل صوتك لحسم الجدل!</p>
    </div>

    <!-- Stats Section -->
    <div class="stats-section">
        <!-- Stats Header -->
        <div class="stats-header">
            <svg class="stats-icon" fill="#8b96a5" viewBox="0 0 24 24">
                <path
                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
            </svg>
            <span class="stats-label">إحصائيات التسجيل</span>
            <div class="live-badge">
                <span class="live-dot"></span>
                مباشر
            </div>
        </div>

        <!-- Results Display -->
        <div class="results-container">
            <!-- Hilal Info (Right Side) -->
            <div class="team-info">
                <div class="team-votes">١١,٩٣٣</div>
                <div class="team-label">مُصَوِّتٌ</div>
            </div>

            <!-- Progress Bar -->
            <div class="progress-bar-container">
                <div class="progress-bar-hilal" style="width: 48.1%;">
                    <div class="percentage-text">
                        <svg class="trend-icon" fill="#fff" viewBox="0 0 24 24">
                            <path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z" />
                        </svg>
                        48.1%
                    </div>
                </div>
                <div class="progress-bar-ittihad" style="width: 51.9%;">
                    <div class="percentage-text">
                        51.9%
                        <svg class="trend-icon" fill="#fff" viewBox="0 0 24 24">
                            <path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Ittihad Info (Left Side) -->
            <div class="team-info">
                <div class="team-votes">١٢,٨٦٥</div>
                <div class="team-label">مُصَوِّتٌ</div>
            </div>
        </div>

        <!-- Team Labels -->
        <div class="team-labels">
            <div class="team-name-label right">الهلال</div>
            <div class="total-votes">المجموع: ٢٤,٧٩٧</div>
            <div class="team-name-label left">الاتحاد</div>
        </div>
    </div>

    <div class="voting-container">
        <!-- Al-Hilal Side -->
        <div class="team-side hilal-side">
            <div class="team-logo">
                <img src="{{ asset('images/1.png') }}" alt="Al-Hilal Logo">
            </div>
            <h1 class="team-name">الهلال</h1>
            <p class="team-subtitle">أنا زعيم المدرج</p>
            @csrf
            <button type="button" class="vote-btn vote-btn-hilal" data-bs-toggle="modal" data-bs-target="#voteModal">
                تصويت للهلال
                <span class="vote-icon"></span>
            </button>

        </div>


        <!-- VS Badge -->
        <div class="vs-badge">
            <span>VS</span>
        </div>

        <!-- Al-Ittihad Side -->



        <div class="team-side ittihad-side">
            <div class="team-logo">
                <img src="{{ asset('images/2.png') }}" alt="Al-Ittihad Logo">
            </div>
            <h1 class="team-name">الاتحاد</h1>
            <p class="team-subtitle">أنا عميد المدرج</p>

            @csrf
            <button type="button" class="vote-btn vote-btn-ittihad" data-bs-toggle="modal" data-bs-target="#voteModal">
                تصويت للاتحاد
                <span class="vote-icon"></span>
            </button>
        </div>


        <!-- Footer -->

    </div>

    <div class="footer-section">
        <div class="footer-powered">Powered by</div>
        <div class="footer-logo">GOLEO</div>
    </div>

    <div class="modal fade" id="voteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content vote-modal">

                <div class="vote-modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    <h5>تسجيل صوتك للاتحاد</h5>
                    <div class="header-icons">
                        <span class="circle black"></span>
                        <span class="circle yellow"></span>
                    </div>
                </div>

                <div class="vote-modal-body">

                    <div class="switch-tabs">
                        <button type="button" class="tab inactive" id="emailTab">
                            <i class="bi bi-envelope"></i> البريد الإلكتروني
                        </button>
                        <button type="button" class="tab active" id="phoneTab">
                            <i class="bi bi-telephone"></i> رقم الجوال
                        </button>
                    </div>

                    <form id="voteForm" method="POST" action="{{ route('vote.store') }}">
                        @csrf
                        <input type="hidden" name="team_name" id="teamNameInput">

                        <label id="inputLabel">رقم الجوال</label>
                        <input type="text" name="phone" id="phoneInput" class="form-control phone-input"
                            placeholder="05XXXXXXXX">

                        <input type="email" name="email" id="emailInput" class="form-control phone-input d-none"
                            placeholder="example@email.com">

                        <button type="submit" class="submit-btn">تسجيل الآن</button>

                    </form>

                    <p class="privacy-text">
                        بالتسجيل، أنت توافق على مشاركة معلوماتك مع GOLEO
                    </p>

                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const phoneTab = document.getElementById("phoneTab");
        const emailTab = document.getElementById("emailTab");

        const phoneInput = document.getElementById("phoneInput");
        const emailInput = document.getElementById("emailInput");
        const label = document.getElementById("inputLabel");
        const form = document.getElementById("voteForm");

        phoneTab.onclick = () => {
            phoneTab.classList.add("active");
            phoneTab.classList.remove("inactive");

            emailTab.classList.add("inactive");
            emailTab.classList.remove("active");

            phoneInput.classList.remove("d-none");
            emailInput.classList.add("d-none");

            phoneInput.setAttribute("name", "phone");
            emailInput.removeAttribute("name");

            label.innerText = "رقم الجوال";
            form.action = "/vote";
        };

        emailTab.onclick = () => {
            emailTab.classList.add("active");
            emailTab.classList.remove("inactive");

            phoneTab.classList.add("inactive");
            phoneTab.classList.remove("active");

            emailInput.classList.remove("d-none");
            phoneInput.classList.add("d-none");

            emailInput.setAttribute("name", "email");
            phoneInput.removeAttribute("name");

            label.innerText = "البريد الإلكتروني";
            form.action = "/vote";
        };
        // Get all vote buttons
        const voteButtons = document.querySelectorAll(".vote-btn");

        // Hidden input in the form
        const teamNameInput = document.getElementById("teamNameInput");

        // Add click event to each vote button
        const voteModal = document.getElementById('voteModal');

        voteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const teamSide = button.closest(".team-side");
                const teamName = teamSide.querySelector(".team-name").innerText;
                teamNameInput.value = teamName;

                // Also update modal header dynamically (optional)
                voteModal.querySelector('.vote-modal-header h5').innerText = `تسجيل صوتك لـ ${teamName}`;
            });
        });
    </script>

</body>

</html>
