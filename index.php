<!DOCTYPE html>
<html lang="mn">
<head>
  <meta charset="UTF-8" />
  <title>Егий - CV</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
</head>
<body>
  <div class="top-bar">
    <div id="google_translate_element"></div>
    <button onclick="downloadPDF()">⬇️ PDF татах</button>
    <button class="dark-mode-btn" onclick="toggleDarkMode()">🌗 Горим солих</button>
  </div>

<div class="container" id="cv-content">
    <div class="left">
        <img src="images/profile.jpg" class="profile" alt="Profile" />
        <h1>Эрдэнэсайхан</h1>
        <p>Програмист</p>

    <div class="section bg1">
        <h4>Хэлний мэдлэг</h4>
        <div class="lang-bar"><span style="width: 80%">Япон хэл - 60%</span></div>
        <div class="lang-bar"><span style="width: 60%">Англи хэл - 70%</span></div>
    </div>

    <div class="section bg2">
            <h4>Ур чадвар</h4>
            <canvas id="skillChart"></canvas>
        </div>
    </div>

    <div class="right">
        <div class="section bg3">
            <h4>Хувийн мэдээлэл</h4>
                <ul>
                    <li>Нэр: Эрдэнэсайхан</li>
                    <li>Нас: 21</li>
                    <li>Төрсөн өдөр: 2004.10.13</li>
                    <li>Мэргэжил: Компьютер програм хангамж</li>
                    <li>Төгссөн сургууль: Их Засаг ОУИС</li>
                    <li>Имэйл: enjieegii913@gmail.com</li>
                    <li>Утас: 88536127</li>
                    <li>Хаяг: Улаанбаатар, Хан-Уул</li>
                </ul>
        </div>

        <div class="section b4">
            <h4>Боловсрол</h4>
                <ul>
                    <li>2022 – 2026: ИЗОУИС - Мэдээллийн Технологи</li>
                </ul>
        </div>

        <div class="section bg5">
            <h4 onclick="toggleMaterials()" style="cursor: pointer;">📁 Нэмэлт материал</h4>
                <ul id="extraMaterials" style="display: none;">
                    <li><a href="docs/Surguuli.pdf" target="_blank">📄 Сургуулийн тодорхойлолт</a></li>
                    <li><a href="docs/DungiinHuudas.pdf" target="_blank">📑 Дүнгийн хуудас</a></li>
                    <li><a href="docs/project-certificate.jpg" target="_blank">🖼️ Төслийн гэрчилгээ</a></li>
                </ul>
        </div>

        <div class="section bg6">
            <h4>Амжилтууд</h4>
                <ul>
                    <li>2023 – Веб хөгжүүлэлтийн уралдаанд оролцсон</li>
                    <li>2024 – Сүлжээний олимпад оролцсон</li>
                </ul>
        </div>
    </div>
</div>

  <footer>
    <p>Холбоо барих</p>
    <div class="socials">
      <a href="https://www.facebook.com/profile.php?id=100086472557137" target="_blank"><i class="fab fa-facebook"></i></a>
      <a href="https://www.instagram.com/eegii_________/" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://github.com/Erdenesaihan218" target="_blank"><i class="fab fa-github"></i></a>
    </div>
    <p>&copy; 2025он</p>
  </footer>

  <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'mn',
        includedLanguages: 'en,ja,ru',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
      }, 'google_translate_element');
    }

    function downloadPDF() {
      const element = document.getElementById('cv-content');
      html2pdf().from(element).save('Egii-CV.pdf');
    }

    function toggleDarkMode() {
      document.body.classList.toggle('dark');
    }

    function toggleMaterials() {
      const el = document.getElementById('extraMaterials');
      el.style.display = (el.style.display === 'none') ? 'block' : 'none';
    }
/* diagram*/ 
  const ctx = document.getElementById('skillChart').getContext('2d');
  const skillChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['HTML', 'CSS', 'PHP', 'JS', 'Flutter'],
      datasets: [{
        label: 'Ур чадвар',
        data: [90, 85, 70, 60, 80],
        backgroundColor: [
          '#f94144', // HTML
          '#f3722c', // CSS
          '#f9844a', // PHP
          '#90be6d', // JS
          '#577590'  // Flutter
        ],
        borderColor: '#fff',
        borderWidth: 2
      }]
    },
    options: {
      responsive: false,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            color: getComputedStyle(document.body).getPropertyValue('--text-color') || '#000'
          }
        }
      }
    }
  });

  // Dark mode үед update хийх
  function updateChartTheme(isDark) {
    skillChart.options.plugins.legend.labels.color = isDark ? '#fff' : '#000';
    skillChart.update();
  }

  // Горим солих функц дээр update нэмэх
  function toggleDarkMode() {
    document.body.classList.toggle('dark');
    updateChartTheme(document.body.classList.contains('dark'));
  }


  </script>
</body>
</html>
