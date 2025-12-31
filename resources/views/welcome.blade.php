<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التصويت - الاتحاد vs الهلال</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
                <div class="team-votes">{{ $alHilalVotes->count() }}</div>


                <div class="team-label">مُصَوِّتٌ</div>
            </div>

            <!-- Progress Bar -->
            <div class="progress-bar-container">
                <div class="progress-bar-hilal" style="width: {{ $alHilalPercentage }}%;">
                    <div class="percentage-text">
                        {{ number_format($alHilalPercentage, 2) }}%
                    </div>
                </div>

                <div class="progress-bar-ittihad" style="width: {{ $alIttihadPercentage }}%;">
                    <div class="percentage-text">
                        {{ number_format($alIttihadPercentage, 2) }}%
                    </div>
                </div>

            </div>

            <!-- Ittihad Info (Left Side) -->
            <div class="team-info">
                <div class="team-votes">{{ $alIttihadVotes->count() }}</div>
                <div class="team-label">مُصَوِّتٌ</div>
            </div>
        </div>
        <!-- Team Labels -->
        <div class="team-labels">
            <div class="team-name-label right">الهلال</div>
            <div class="total-votes">المجموع: {{ $totalVotes }}</div>
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
            <button id="voteIttihad" type="button" class="vote-btn vote-btn-hilal" data-bs-toggle="modal"
                data-bs-target="#voteModal">
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
            <button id="voteHilal" type="button" class="vote-btn vote-btn-ittihad" data-bs-toggle="modal"
                data-bs-target="#voteModal">
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

                        <button id="submitBtn" class="submit-btn" type="submit">تسجيل الآن</button>

                    </form>

                    <p class="privacy-text">
                        بالتسجيل، أنت توافق على مشاركة معلوماتك مع GOLEO
                    </p>

                </div>

            </div>
        </div>
    </div>


    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="overflow-hidden modal-content success-modal rounded-4">

                <!-- Header -->
                <div class="text-center success-header position-relative">
                    <button type="button" class="top-0 m-3 btn-close btn-close-white position-absolute start-0"
                        data-bs-dismiss="modal"></button>

                    <div class="mx-auto check-circle">
                        ✓
                    </div>

                    <h5 class="mt-3 text-white fw-bold">شكراً يا نمور!</h5>
                </div>

                <!-- Body -->
                <div class="px-4 text-center modal-body">
                    <p class="mb-4 text-muted small">
                        يا نمور، بمناسبة ذكرى التأسيس الـ 98، أرسل عدسة تخصها للعيد هي العدسة. الملايين قربين.
                        انسخ الرابط وشاركه في الواتساب فوراً!
                    </p>

                    <button class="mb-2 btn whatsapp-btn w-100" id="whatsappShareBtn">
                        <i class="bi bi-whatsapp me-2"></i> شارك عبر الواتساب
                    </button>

                    <button class="mb-3 btn copy-btn w-100">
                        <i class="bi bi-clipboard me-2"></i> نسخ الرابط
                    </button>

                    <input type="text" class="mb-3 text-center form-control" readonly id="currentUrl">

                    <button class="btn follow-btn w-100" data-bs-dismiss="modal">
                        متابعة التصفح
                    </button>
                </div>

            </div>
        </div>
    </div>
    <script>
        const submitBtn = document.getElementById('submitBtn');
        const hilalBtn = document.getElementById('voteHilal');
        const ittihadBtn = document.getElementById('voteIttihad');

        hilalBtn.addEventListener('click', () => {
            submitBtn.className = 'submit-btn'; // class for Hilal
        });

        ittihadBtn.addEventListener('click', () => {
            submitBtn.className = 'submit-btn2'; // class for Ittihad
        });
    </script>

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
        document.addEventListener('DOMContentLoaded', function() {
            // Check if session has success flag
            @if (session('success'))
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            @endif
        });
        const voteForm = document.getElementById('voteForm');
        voteForm.addEventListener('submit', function(e) {
            const phoneValue = phoneInput.value.trim();
            const emailValue = emailInput.value.trim();

            if (!phoneValue && !emailValue) {
                e.preventDefault(); // Prevent submission
                alert("يرجى إدخال رقم الجوال أو البريد الإلكتروني"); // Or you can use a custom error modal
            }
        });
        // Get the current page URL
        const currentUrl = window.location.href;

        // Set it as the value of the input
        document.getElementById('currentUrl').value = currentUrl;
        document.getElementById('whatsappShareBtn').addEventListener('click', function() {
            // Get current page URL dynamically
            const currentUrl = window.location.href;

            // Arabic message
            const message =
                `سجل صوتك للاتحاد! المدرج الرقمي لا يكذب.. من الاكثر شعبية في المملكة؟\n\n${currentUrl}`;

            // Encode message for URL
            const encodedMessage = encodeURIComponent(message);

            // WhatsApp link
            const whatsappUrl = `https://api.whatsapp.com/send?text=${encodedMessage}`;

            // Open WhatsApp
            window.open(whatsappUrl, '_blank');
        });
    </script>


</body>

</html>
