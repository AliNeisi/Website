<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>وب سایت شخصی علی نیسی</title>
    <link rel="icon" href="img/logo.png"/>
    <link rel="stylesheet" href="/My Personal Website/css/style.css"/>
</head>
<body>
<script src="jquery.js"></script>
<script>

</script>
<div class="socials">
    <ul class="list">
        <li>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </li>
        <li>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </li>
        <li>
            <a href="#"><i class="fab fa-telegram"></i></a>
        </li>
    </ul>
</div>
<header>
    <div class="nav-bar">
        <div class="nav-list">
            <ul>
                <li><a href="#home">صفحه اصلی</a></li>
                <li><a href="#about">درباره</a></li>
                <li><a href="#skills">مهارت ها</a></li>
                <li><a href="#projects">پروژه ها</a></li>
                <li><a href="#contact">تماس با من</a></li>
            </ul>
        </div>
    </div>
    <div id="home" class="home">
        <div class="profile">
            <img src="img/profile.png"/>
        </div>
        <div class="info">
            <h1 class="title">
                سلام <br/>
                <span class="name">علی</span>
                هستم <br/>
                یک طراح سایت
            </h1>
            <a href="#" class="button">تماس با من</a>
        </div>
    </div>
</header>
<main>
    <section id="about">
        <h2 class="section-title">درباره من</h2>
        <div class="about-container">
            <div class="about-body">
                <h2 class="about-subtitle">طراح و برنامه نویس سایت</h2>
                <p>
                    متولد پانزدهمین روز از دومین ماهِ بهار، همیشه به دنبال یادگیری
                    مسائل جدید و هم اکنون در حوزه طراحی و توسعه وب سایت فعالیت میکنم.
                    رویاپردازی و میل به پیشرفت مهمترین خصوصیات من بود که باعث شد وارد
                    دنیای وب بشوم چرا که فضای وب انتهایی ندارد و همیشه فضا برای پیشرفت
                    و خلق ایده های جدید دارد.
                </p>
            </div>
            <div class="about-img">
                <img src="img/about.jpg"/>
            </div>
        </div>
    </section>
    <section id="skills">
        <h2 class="section-title">مهارت های من</h2>
        <div class="skills-container">
            <div class="skills-img">
                <img src="img/skills.jpg" class="skills-image"/>
            </div>
            <div class="skills-body">
                <h2 class="skills-subtitle">مهارت ها</h2>
                <p>
                    هر چند این دریا بی کران است، ولی به صورت میانگین، سطح مهارت های من
                    به این صورت است:
                </p>
                <?php
                $json = file_get_contents("json.json");
                $values = json_decode($json, true);
                foreach ($values as $value) {
                    ?>
                    <div class="skill-info">
                        <div class="skill-name-logo">
                            <i class="fab <?= $value['icon'] ?> skill-logo"></i>
                            <span class="skill-name"><?= $value['title'] ?></span>
                        </div>
                        <span class="skill-percent"><?= $value['percent'] ?></span>
                        <div class="skill-bar <?= $value['className'] ?>"></div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <section id="projects">
        <h2 class="section-title">پروژه های من</h2>
        <div class="projects-container">
            <div class="images-container">
                <div class="image-wrapper">
                    <img src="img/project-1.jfif" class="projects-img"/>
                </div>
                <div class="image-wrapper">
                    <img src="img/project-2.jfif" class="projects-img"/>
                </div>
                <div class="image-wrapper">
                    <img src="img/project-3.jfif" class="projects-img"/>
                </div>
                <div class="image-wrapper">
                    <img src="img/project-4.jfif" class="projects-img"/>
                </div>
                <div class="image-wrapper">
                    <img src="img/project-5.jfif" class="projects-img"/>
                </div>
                <div class="image-wrapper">
                    <img src="img/project-6.jfif" class="projects-img"/>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <h2 class="section-title">تماس با من</h2>
        <div class="contact-container">
            <form action="" class="contact-form">
                <input id="name" type="text" placeholder="نام"/>
                <input id="email" type="email" placeholder="ایمیل"/>
                <textarea id="msg" cols="0" rows="10"></textarea>
                <p
                        id="button-send"
                        class="button contact-button"
                        onclick="toast()"
                >
                    ارسال
                </p>
            </form>
        </div>
    </section>
    <div id="toast" class="toast">
        <div class="box">
            <p id="notif" class="notif">پیام ارسال شد</p>
            <p id="button-ok" class="button">باشه</p>
        </div>
    </div>
</main>
<script
        src="https://kit.fontawesome.com/a5ff63da3b.js"
        crossorigin="anonymous"
></script>
<script>
    function toast() {
        $(document).ready(function () {
                let name = $("#name").val();
                let email = $("#email").val();
                let msg = $("#msg").val();
                $.ajax({
                    url: "Controller/storeComment",
                    type: "post",
                    data: {storeComment: "TRUE", name: name, email: email, msg: msg},
                    success: function () {
                        deleteValue();
                        const toast = document.getElementById("toast")
                        toast.style.visibility = "visible";
                        document
                            .getElementById("button-ok")
                            .addEventListener("click", () => {
                                toast.style.visibility = "collapse";
                            });
                    }
                })
            }
        )
    }
    function deleteValue() {
        document.getElementById('msg').value = "";
    }
</script>
</body>
</html>
