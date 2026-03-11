<?php
// index.php – Landing hosting 1C + hosting/VPS/domenii, cu trimitere email prin SMTP
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// IMPORTANT: asigură-te că ai urcat aceste fișiere în httpdocs/phpmailer/src/
require __DIR__ . '/phpmailer/src/Exception.php';
require __DIR__ . '/phpmailer/src/PHPMailer.php';
require __DIR__ . '/phpmailer/src/SMTP.php';
$contact_success = '';
$contact_error   = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nume   = isset($_POST['nume'])   ? trim($_POST['nume'])   : '';
    $email  = isset($_POST['email'])  ? trim($_POST['email'])  : '';
    $mesaj  = isset($_POST['mesaj'])  ? trim($_POST['mesaj'])  : '';
    if ($nume === '' || $email === '' || $mesaj === '') {
        $contact_error = 'Te rugăm să completezi numele, emailul și mesajul.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $contact_error = 'Adresa de email nu este validă.';
    } else {
        $mail = new PHPMailer(true);
        try {
            // Setări SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.ondsolutions.md';   // sau smtp.ondsolutions.md, după caz
            $mail->SMTPAuth   = true;
            $mail->Username   = 'contact@ondsolutions.md';
            $mail->Password   = 'AAD1sup@$$';         // parola reală a căsuței
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // TLS pe port 465
            $mail->Port       = 465;
            $mail->CharSet    = 'UTF-8';
            // Expeditor / destinatar
            $mail->setFrom('contact@ondsolutions.md', 'Smart Solutions');
            $mail->addAddress('cojocari.v88@gmail.com');
            $mail->addReplyTo($email, $nume);
            // Conținut
            $mail->Subject = 'Mesaj nou de pe formularul Smart Solutions';
            $body  = "Ai primit un mesaj nou de pe site.\r\n\r\n";
            $body .= "Nume: {$nume}\r\n";
            $body .= "Email: {$email}\r\n\r\n";
            $body .= "Mesaj:\r\n{$mesaj}\r\n";
            $mail->Body = $body;
            $mail->send();
            $contact_success = 'Mesajul a fost trimis cu succes. Îți vom răspunde în cel mai scurt timp.';
            $nume = $email = $mesaj = '';
          } catch (Exception $e) {
            // pentru moment afișăm și mesajul real de la PHPMailer
            $contact_error = 'A apărut o eroare la trimiterea mesajului: ' .
                htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Hosting 1C & VPS modern | Smart Solutions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ihcBlue: '#2563EB',   // albastru principal
                        ihcBlueDark: '#1D4ED8',
                        ihcOrange: '#F97316', // portocaliu accent
                        ihcGray: '#111827'
                    }
                }
            }
        }
    </script>

    <style>
        .card-anim {
            transition:
                transform 0.2s ease-out,
                box-shadow 0.2s ease-out,
                border-color 0.2s ease-out,
                background-color 0.2s ease-out;
            transform: translateY(0) scale(1);
            background-color: rgba(255, 255, 255, 0.9);
        }
        .card-anim:hover {
            transform: translateY(-4px) scale(1.01);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.18);
            border-color: rgba(37, 99, 235, 0.55);          /* ihcBlue */
            background-color: rgba(239, 246, 255, 0.98);    /* albastru foarte deschis compatibil */
        }
        .no-select {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        body {
    background:
        radial-gradient(circle at top left, rgba(59,130,246,0.12), transparent 55%),
        radial-gradient(circle at top right, rgba(249,115,22,0.10), transparent 55%),
        #f3f4f6;
    /* NU permite selectarea / inserarea de text în conținut */
    -webkit-user-select: none; /* Safari */
    -moz-user-select: none;    /* Firefox */
    -ms-user-select: none;     /* IE/Edge */
    user-select: none;         /* Standard */
}
/* Corectează poziția la scroll pentru secțiunile cu id (sub meniul sticky) */
section[id] {
    scroll-margin-top: 90px; /* ajustează dacă header-ul e mai mare/mic */
}
/* Permite selectarea și introducerea de text doar în input-uri și textarea */
input,
textarea {
    -webkit-user-select: text;
    -moz-user-select: text;
    -ms-user-select: text;
    user-select: text;
}
        .glass {
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(18px);
        }
        .glass-soft {
            background: rgba(255,255,255,0.86);
            backdrop-filter: blur(14px);
        }
        .logo-glow {
            background: conic-gradient(from 160deg, #2563EB, #F97316, #2563EB);
        }
        .shadow-strong {
            box-shadow: 0 20px 55px rgba(15,23,42,0.18);
        }
        .pill-dot {
            box-shadow: 0 0 0 5px rgba(34,197,94,0.18);
        }
        .btn-anim {
            transition:
                transform 0.18s ease-out,
                box-shadow 0.18s ease-out,
                filter 0.18s ease-out,
                background-color 0.18s ease-out,
                border-color 0.18s ease-out,
                color 0.18s ease-out;
            transform: translateY(0) scale(1);
        }
        .btn-anim:hover {
            transform: translateY(-1px) scale(1.02);
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.18);
            filter: brightness(1.03);
        }
        .btn-anim:active {
            transform: translateY(0) scale(0.97);
            box-shadow: 0 3px 10px rgba(15, 23, 42, 0.25);
            filter: brightness(0.97);
        }
    </style>
</head>
<body class="text-slate-900 antialiased">

<!-- HEADER -->
<header class="sticky top-0 z-40 border-b border-slate-200 bg-white/95 backdrop-blur-xl">
    <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-3 lg:px-6">
        <a href="#top" class="group flex items-center gap-2">
            <div class="logo-glow flex h-9 w-9 items-center justify-center rounded-full text-xs font-semibold text-white shadow-strong">
                S
            </div>
            <div class="flex flex-col leading-tight">
                <span class="text-[11px] font-semibold uppercase tracking-[0.28em] text-slate-800">
                    Smart Solutions
                </span>
                <span class="text-[10px] text-slate-500">Hosting 1C • VPS • Domenii</span>
            </div>
        </a>

        <nav class="hidden items-center gap-7 text-xs font-medium text-slate-600 md:flex">
            <a href="#1c" class="hover:text-ihcBlue">Hosting 1C</a>
            <a href="#tarife" class="hover:text-ihcBlue">Găzduire web</a>
            <a href="#vps" class="hover:text-ihcBlue">VPS / VDS</a>
            <a href="#domenii" class="hover:text-ihcBlue">Domenii</a>
            <a href="#contact" class="hover:text-ihcBlue">Contact</a>
        </nav>

        <div class="hidden items-center gap-3 md:flex">
            <button
                onclick="scrollToSection('1c')"
                class="btn-anim inline-flex items-center rounded-full border border-slate-300 px-3 py-1.5 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-700 hover:border-ihcBlue hover:text-ihcBlue"
            >
                Hosting 1C
            </button>
            <a
                href="#contact"
                class="btn-anim inline-flex items-center rounded-full bg-gradient-to-r from-ihcOrange to-ihcBlue px-3.5 py-1.5 text-[11px] font-semibold uppercase tracking-[0.22em] text-white shadow-lg shadow-ihcBlue/40 hover:brightness-110"
            >
                Cere ofertă
            </a>
        </div>
    </div>
</header>

<main id="top" class="pb-16">

    <!-- HERO – accent pe 1C -->
    <section class="border-b border-slate-200 bg-gradient-to-b from-white/95 to-slate-100/70">
        <div class="mx-auto grid max-w-6xl gap-10 px-4 py-10 lg:grid-cols-[1.15fr,0.9fr] lg:px-6 lg:py-14">
            <!-- Left -->
            <div>
                <p class="mb-3 text-[11px] font-semibold uppercase tracking-[0.32em] text-ihcBlue">
                    Hosting 1C în cloud & infrastructură completă
                </p>
                <h1 class="mb-4 text-3xl font-semibold leading-tight tracking-tight text-slate-900 sm:text-[2.35rem] lg:text-[2.6rem]">
                    1C în cloud<span class="text-ihcBlue">,</span> accesibil
                    <span class="bg-gradient-to-r from-ihcOrange to-ihcBlue bg-clip-text text-transparent">
                        de oriunde
                    </span>
                    și oricând.
                </h1>
                <p class="mb-5 max-w-xl text-sm text-slate-600">
                    Mutăm 1C în cloud, cu backup automat și acces securizat pentru echipa ta,
                    astfel încât contabilitatea și procesele interne să funcționeze fără întreruperi.
                </p>

                <div class="mb-4 flex flex-wrap gap-2 text-[11px] text-slate-700">
                    <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1">
                        <span class="h-2 w-2 rounded-full bg-emerald-500 pill-dot"></span>
                        Datacenter certificat, uptime 99,9%+
                    </span>
                    <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-1">
                        <span class="h-2 w-2 rounded-full bg-ihcBlue"></span>
                        Migrare 1C și baze de date inclusă
                    </span>
                    <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-1">
                        <span class="h-2 w-2 rounded-full bg-ihcOrange"></span>
                        Acces de pe PC, laptop, RDP
                    </span>
                </div>

                <div class="mb-6 flex flex-wrap gap-3">
                    <button
                        onclick="scrollToSection('1c')"
                        class="btn-anim inline-flex items-center rounded-full bg-ihcBlue px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-white shadow-md shadow-ihcBlue/40 hover:bg-ihcBlueDark"
                    >
                        Detalii hosting 1C
                    </button>
                    <button
                        onclick="scrollToSection('contact')"
                        class="btn-anim inline-flex items-center rounded-full border border-slate-300 bg-white px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-700 hover:border-ihcBlue hover:text-ihcBlue"
                    >
                        Cere o ofertă personalizată
                    </button>
                </div>

                <dl class="grid gap-3 text-[11px] text-slate-500 sm:grid-cols-3 sm:text-[12px]">
                    <div>
                        <dt class="text-slate-500">Experiență 1C</dt>
                        <dd class="font-semibold text-slate-900">Migrare & găzduire 1C</dd>
                    </div>
                    <div>
                        <dt class="text-slate-500">Suport</dt>
                        <dd class="font-semibold text-slate-900">24/7 ticket & telefon</dd>
                    </div>
                    <div>
                        <dt class="text-slate-500">Securitate</dt>
                        <dd class="font-semibold text-slate-900">Backup, DDoS, acces criptat</dd>
                    </div>
                </dl>
            </div>

            <!-- Right: pricing card pentru 1C -->
            <aside class="glass shadow-strong rounded-2xl border border-slate-200 p-4 sm:p-5">
                <div class="mb-4 flex items-start justify-between gap-3">
                    <div>
                        <h2 class="text-sm font-semibold text-slate-900">
                            Configurează un pachet 1C în cloud
                        </h2>
                        <p class="text-[11px] text-slate-500">
                            Alege numărul de utilizatori și spațiul pentru bazele de date.
                        </p>
                    </div>
                    <span class="inline-flex items-center rounded-full border border-ihcOrange/40 bg-ihcOrange/10 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-[0.18em] text-ihcOrange">
                        Test 7 zile
                    </span>
                </div>

                <div class="space-y-3">
                    <div class="space-y-1">
                        <div class="flex items-center justify-between text-[11px] text-slate-600">
                            <span>Utilizatori 1C</span>
                            <span id="fg-users-val" class="font-medium text-slate-900">3</span>
                        </div>
                        <input
                            id="fg-users"
                            type="range"
                            min="1"
                            max="30"
                            value="1"
                            class="w-full accent-ihcBlue"
                        >
                    </div>

                    <div class="space-y-1">
                        <div class="flex items-center justify-between text-[11px] text-slate-600">
                            <span>Spațiu pentru baze de date (GB)</span>
                            <span id="fg-space-val" class="font-medium text-slate-900">20 GB</span>
                        </div>
                        <input
                            id="fg-space"
                            type="range"
                            min="10"
                            max="200"
                            step="10"
                            value="10"
                            class="w-full accent-ihcBlue"
                        >
                    </div>

                    <div class="space-y-1">
                        <div class="flex items-center justify-between text-[11px] text-slate-600">
                            <span>Baze 1C conectate</span>
                            <span id="fg-inst-val" class="font-medium text-slate-900">1</span>
                        </div>
                        <input
                            id="fg-inst"
                            type="range"
                            min="1"
                            max="20"
                            step="1"
                            value="1"
                            class="w-full accent-ihcBlue"
                        >
                    </div>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.24em] text-ihcBlue">
                            Estimare lunară 1C
                        </p>
                        <p id="fg-price" class="text-2xl font-semibold text-slate-900">
                            190 lei <span class="text-xs font-normal text-slate-500">/ lună</span>
                        </p>
                    </div>
                    <p class="max-w-[10rem] text-[11px] text-slate-500 text-right">
                        Preț orientativ, include infrastructură, backup și monitorizare.
                    </p>
                </div>

                <button
                    onclick="scrollToSection('contact')"
                    class="btn-anim mt-4 inline-flex w-full items-center justify-center rounded-full bg-gradient-to-r from-ihcOrange to-ihcBlue px-4 py-2.5 text-[11px] font-semibold uppercase tracking-[0.22em] text-white shadow-lg shadow-ihcBlue/40 hover:brightness-110"
                >
                    Cere ofertă detaliată
                </button>

                <p class="mt-3 text-[11px] text-slate-500">
                    Migrare 1C, configurare acces utilizatori, VPN sau RDP, plus consultanță pentru optimizare.
                </p>
            </aside>
        </div>
    </section>

    <!-- SECȚIUNE DEDICATĂ 1C -->
    <section id="1c" class="border-b border-slate-200 bg-white">
        <div class="mx-auto max-w-6xl px-4 py-10 lg:px-6 lg:py-14">
            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-ihcBlue">
                Servicii 1C în cloud
            </p>
            <div class="mt-1 grid gap-8 lg:grid-cols-[1.1fr,1.1fr]">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-900">
                        Toate datele 1C într‑un cloud securizat, gata de lucru în câteva ore
                    </h2>
                    <p class="mt-3 text-sm text-slate-600">
                        Nu mai depinzi de un singur calculator sau de un server din birou. Mutăm
                        bazele de date 1C într‑un datacenter sigur, cu backup și acces criptat,
                        astfel încât echipa ta să se conecteze în siguranță, de oriunde.
                    </p>
                    <div class="mt-5 grid gap-3 text-xs text-slate-700 sm:grid-cols-2">
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <p class="text-[12px] font-semibold text-slate-900">Migrare 1C inclusă</p>
                            <p class="text-[11px] text-slate-600">
                                Preluăm bazele existente, le verificăm și le mutăm în cloud cu timp minim de oprire.
                            </p>
                        </div>
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <p class="text-[12px] font-semibold text-slate-900">Acces securizat</p>
                            <p class="text-[11px] text-slate-600">
                                Conectare prin VPN sau RDP, parole complexe și politici de acces pe utilizator.
                            </p>
                        </div>
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <p class="text-[12px] font-semibold text-slate-900">Backup automat</p>
                            <p class="text-[11px] text-slate-600">
                                Copii de siguranță zilnice ale bazelor 1C, cu posibilitate de restaurare rapidă.
                            </p>
                        </div>
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <p class="text-[12px] font-semibold text-slate-900">Scalare când ai nevoie</p>
                            <p class="text-[11px] text-slate-600">
                                Mai mulți utilizatori, mai mult spațiu sau resurse suplimentare – fără investiții hardware.
                            </p>
                        </div>
                    </div>

                    <!-- Lista extinsă de servicii -->
                    <div class="mt-6">
                        <p class="mb-2 text-[12px] font-semibold text-slate-900">Servicii incluse:</p>
                        <ul class="list-disc space-y-1 pl-5 text-[11px] text-slate-700">
                            <li>Configurare și conectare domeniu, inclusiv integrare domeniu în Cloudflare.</li>
                            <li>Instalarea și configurarea platformei 1C pe server.</li>
                            <li>Instalare și configurare baze de date SQL.</li>
                            <li>Conectare soft pe stațiile de lucru și suport în procesul implementării.</li>
                            <li>Management utilizatori și accese în baza de date.</li>
                            <li>Suport tehnic și consultanță pe parcursul implementării și ulterior.</li>
                            <li>Transferul de date din baze de date vechi aferente clienților și mărfurilor.</li>
                        </ul>
                    </div>
                </div>

                <div class="glass-soft border border-slate-200 rounded-2xl p-5 shadow-strong">
                    <h3 class="text-sm font-semibold text-slate-900">
                        Exemple de scenarii pentru hosting 1C
                    </h3>
                    <ul class="mt-4 space-y-3 text-xs text-slate-700">
                        <li class="flex gap-3">
                            <span class="mt-[6px] h-1.5 w-1.5 rounded-full bg-ihcBlue"></span>
                            <div>
                                <p class="font-semibold text-slate-900">Contabilitate pentru firmă mică</p>
                                <p class="text-[11px] text-slate-600">
                                    3–5 utilizatori, o bază 1C, acces de la birou și de acasă, backup automat și suport.
                                </p>
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-[6px] h-1.5 w-1.5 rounded-full bg-ihcOrange"></span>
                            <div>
                                <p class="font-semibold text-slate-900">Grup de companii</p>
                                <p class="text-[11px] text-slate-600">
                                    Mai multe baze 1C, departamente în orașe diferite, conectate la același server.
                                </p>
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-[6px] h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            <div>
                                <p class="font-semibold text-slate-900">Integrare cu alte sisteme</p>
                                <p class="text-[11px] text-slate-600">
                                    Conectare 1C cu CRM, sisteme de facturare online și servicii bancare.
                                </p>
                            </div>
                        </li>
                    </ul>
                    <button
                        onclick="scrollToSection('contact')"
                        class="btn-anim mt-5 inline-flex w-full items-center justify-center rounded-full border border-ihcBlue bg-white px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-ihcBlue hover:bg-ihcBlue hover:text-white"
                    >
                        Discută cu un consultant 1C
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- HOSTING PLANS -->
    <section id="tarife" class="border-b border-slate-200 bg-slate-100/60">
        <div class="mx-auto max-w-6xl px-4 py-10 lg:px-6 lg:py-14">
            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-ihcBlue">
                Servicii
            </p>
            <div class="mt-1 flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
                <h2 class="text-2xl font-semibold text-slate-900">
                    Găzduire web pentru orice tip de proiect
                </h2>
                <p class="max-w-md text-xs text-slate-600">
                    De la site‑uri mici de prezentare până la magazine online și aplicații interne.
                    Pachete scalabile, optimizate pentru WordPress și aplicații PHP.
                </p>
            </div>

            <div class="mt-8 grid gap-5 md:grid-cols-3">
                <!-- Plan 1 -->
                <article id="plan1-card" class="no-select card-anim glass-soft border border-slate-200 rounded-2xl p-4 pb-5">
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-2.5 py-1">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                        <span class="text-[11px] font-medium text-slate-800">Începători & bloguri</span>
                    </div>
                    <div class="mb-3 inline-flex h-8 w-8 items-center justify-center rounded-xl bg-slate-100 text-xs font-semibold text-ihcBlue">
                        H
                    </div>
                    <h3 class="text-sm font-semibold text-slate-900">Hosting esențial</h3>
                    <p class="mt-1 text-xs text-slate-600">
                        Ideal pentru bloguri personale, site‑uri de prezentare și portofolii.
                    </p>
                    <ul class="mt-3 space-y-1.5 text-xs text-slate-700">
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> 1 site inclus
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> 10 GB SSD NVMe
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Trafic nelimitat
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> SSL & backup automat
                        </li>
                    </ul>
                    <div class="mt-4">
                        <p class="text-xs text-slate-500">De la</p>
                        <p class="text-xl font-semibold text-slate-900">
                            9 lei <span class="text-xs font-normal text-slate-500">/ lună</span>
                        </p>
                        <p class="text-[11px] text-slate-500">
                            la plata anuală
                            <span class="ml-2 text-[10px] text-slate-500">
                                (15 lei / lună la plata lunară)
                            </span>
                        </p>
                    </div>
                </article>

                <!-- Plan 2 -->
                <article class="no-select card-anim glass-soft border border-slate-200 rounded-2xl p-4 pb-5">
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full bg-ihcBlue/10 px-2.5 py-1">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                        <span class="text-[11px] font-medium text-ihcBlueDark">Recomandat pentru magazine online</span>
                    </div>
                    <div class="mb-3 inline-flex h-8 w-8 items-center justify-center rounded-xl bg-ihcBlue/10 text-xs font-semibold text-ihcBlueDark">
                        P
                    </div>
                    <h3 class="text-sm font-semibold text-slate-900">Hosting pentru magazin online</h3>
                    <p class="mt-1 text-xs text-slate-600">
                        Optimizat pentru WooCommerce, PrestaShop și aplicații cu trafic mediu.
                    </p>
                    <ul class="mt-3 space-y-1.5 text-xs text-slate-700">
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> până la 5 site‑uri
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> 30 GB SSD NVMe
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Backup zilnic & cache
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Protecție DDoS inclusă
                        </li>
                    </ul>
                    <div class="mt-4">
                        <p class="text-xs text-slate-500">De la</p>
                        <p class="text-xl font-semibold text-slate-900">
                            24 lei <span class="text-xs font-normal text-slate-500">/ lună</span>
                        </p>
                        <p class="text-[11px] text-slate-500">migrare gratuită inclusă</p>
                    </div>
                </article>

                <!-- Plan 3 -->
                <article class="no-select card-anim glass-soft border border-slate-200 rounded-2xl p-4 pb-5">
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-2.5 py-1">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                        <span class="text-[11px] font-medium text-slate-800">Companii & aplicații</span>
                    </div>
                    <div class="mb-3 inline-flex h-8 w-8 items-center justify-center rounded-xl bg-slate-100 text-xs font-semibold text-ihcBlue">
                        B
                    </div>
                    <h3 class="text-sm font-semibold text-slate-900">Hosting business</h3>
                    <p class="mt-1 text-xs text-slate-600">
                        Pentru aplicații interne, CRM, ERP sau proiecte cu SLA ridicat.
                    </p>
                    <ul class="mt-3 space-y-1.5 text-xs text-slate-700">
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> site‑uri nelimitate
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> 100 GB SSD NVMe
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Prioritate în suport
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> IP dedicat opțional
                        </li>
                    </ul>
                    <div class="mt-4">
                        <p class="text-xs text-slate-500">De la</p>
                        <p class="text-xl font-semibold text-slate-900">
                            69 lei <span class="text-xs font-normal text-slate-500">/ lună</span>
                        </p>
                        <p class="text-[11px] text-slate-500">contract & facturare pentru firme</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- VPS -->
    <section id="vps" class="border-b border-slate-200 bg-white">
        <div class="mx-auto max-w-6xl px-4 py-10 lg:px-6 lg:py-14">
            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-ihcBlue">
                Servere virtuale
            </p>
            <h2 class="mt-1 text-2xl font-semibold text-slate-900">
                VPS / VDS pe SSD NVMe în Europa
            </h2>

            <div class="mt-6 grid gap-6 lg:grid-cols-[1.1fr,1.1fr]">
                <div>
                    <p class="text-sm text-slate-600">
                        Servere virtuale cu acces root complet, resurse dedicate și stocare NVMe,
                        ideale pentru aplicații cu cerințe ridicate de performanță și disponibilitate.
                    </p>
                    <div class="mt-5 grid gap-3 text-xs text-slate-700 sm:grid-cols-2">
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <h3 class="mb-1 text-[12px] font-semibold text-slate-900">KVM & virtualizare completă</h3>
                            <p class="text-[11px] text-slate-600">
                                Rulezi distribuția de Linux sau Windows preferată, cu acces complet la configurare.
                            </p>
                        </div>
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <h3 class="mb-1 text-[12px] font-semibold text-slate-900">Resurse garantate</h3>
                            <p class="text-[11px] text-slate-600">
                                RAM și CPU rezervate, fără vecini zgomotoși. Scalare rapidă la nevoie.
                            </p>
                        </div>
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <h3 class="mb-1 text-[12px] font-semibold text-slate-900">Datacentere în UE</h3>
                            <p class="text-[11px] text-slate-600">
                                Latență mică pentru clienți din România și Europa, conexiuni redundante.
                            </p>
                        </div>
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <h3 class="mb-1 text-[12px] font-semibold text-slate-900">Management opțional</h3>
                            <p class="text-[11px] text-slate-600">
                                Putem administra noi serverul: update‑uri, securitate, monitorizare 24/7.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="glass-soft border border-slate-200 rounded-2xl p-4 sm:p-5 shadow-strong">
                    <div class="mb-3 flex items-center justify-between gap-3">
                        <h3 class="text-sm font-semibold text-slate-900">
                            Configurații populare VPS
                        </h3>
                        <span class="inline-flex items-center rounded-full border border-slate-300 bg-slate-50 px-2 py-0.5 text-[10px] font-medium uppercase tracking-[0.18em] text-slate-600">
                            scalabile la cerere
                        </span>
                    </div>

                    <ul class="space-y-2 text-xs text-slate-700">
                        <li class="flex items-start gap-2 rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <span class="mt-[6px] h-1.5 w-1.5 rounded-full bg-ihcBlue"></span>
                            <div>
                                <p class="font-semibold text-slate-900">VDS‑Start</p>
                                <p class="text-[11px] text-slate-600">
                                    2 vCPU, 4 GB RAM, 40 GB NVMe – de la <span class="font-semibold text-slate-900">49 lei / lună</span>
                                </p>
                            </div>
                        </li>
                        <li class="flex items-start gap-2 rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <span class="mt-[6px] h-1.5 w-1.5 rounded-full bg-ihcOrange"></span>
                            <div>
                                <p class="font-semibold text-slate-900">VDS‑Pro</p>
                                <p class="text-[11px] text-slate-600">
                                    4 vCPU, 8 GB RAM, 80 GB NVMe – de la <span class="font-semibold text-slate-900">99 lei / lună</span>
                                </p>
                            </div>
                        </li>
                        <li class="flex items-start gap-2 rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <span class="mt-[6px] h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            <div>
                                <p class="font-semibold text-slate-900">VDS‑Max</p>
                                <p class="text-[11px] text-slate-600">
                                    8 vCPU, 16 GB RAM, 160 GB NVMe – de la <span class="font-semibold text-slate-900">199 lei / lună</span>
                                </p>
                            </div>
                        </li>
                    </ul>

                    <p class="mt-3 text-[11px] text-slate-600">
                        Fiecare VPS include IP dedicat, firewall la nivel de rețea și suport pentru panouri precum
                        <span class="text-slate-800 font-medium">ispmanager, cPanel, Plesk</span>.
                    </p>

                    <button
                        onclick="scrollToSection('contact')"
                        class="btn-anim mt-4 inline-flex w-full items-center justify-center rounded-full border border-ihcBlue bg-white px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-ihcBlue hover:bg-ihcBlue hover:text-white"
                    >
                        Cere o ofertă personalizată
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- DOMENII -->
    <section id="domenii" class="border-b border-slate-200 bg-slate-100/70">
        <div class="mx-auto max-w-6xl px-4 py-10 lg:px-6 lg:py-14">
            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-ihcBlue">
                Domenii
            </p>
            <h2 class="mt-1 text-2xl font-semibold text-slate-900">
                Verifică disponibilitatea domeniului tău
            </h2>

            <div class="mt-6 glass-soft border border-slate-200 rounded-2xl p-4 sm:p-5 shadow-strong">
                <p class="text-sm text-slate-600">
                    Un brand bun începe cu un nume memorabil. Introdu domeniul dorit, iar noi îți răspund
                    rapid cu disponibilitatea și ofertele de înregistrare.
                </p>

                <form class="mt-4 flex flex-col gap-3 sm:flex-row" onsubmit="handleDomainCheck(event)">
                    <input
                        id="domain-input"
                        type="text"
                        placeholder="exemplu.ro"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-900 placeholder:text-slate-400 focus:border-ihcBlue focus:outline-none focus:ring-1 focus:ring-ihcBlue"
                    >
                    <button
                        type="submit"
                        class="btn-anim inline-flex items-center justify-center rounded-full bg-ihcBlue px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-white shadow-md shadow-ihcBlue/40 hover:bg-ihcBlueDark"
                    >
                        Verifică domeniu
                    </button>
                </form>

                <p id="domain-result" class="mt-3 text-xs text-slate-600"></p>

                <div class="mt-4 grid gap-2 text-xs text-slate-700 sm:grid-cols-4">
                    <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-white px-3 py-2">
                        <span class="font-semibold text-slate-900">.ro</span>
                        <span class="text-slate-600">de la 45 lei / an</span>
                    </div>
                    <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-white px-3 py-2">
                        <span class="font-semibold text-slate-900">.com</span>
                        <span class="text-slate-600">de la 59 lei / an</span>
                    </div>
                    <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-white px-3 py-2">
                        <span class="font-semibold text-slate-900">.eu</span>
                        <span class="text-slate-600">de la 49 lei / an</span>
                    </div>
                    <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-white px-3 py-2">
                        <span class="font-semibold text-slate-900">.shop</span>
                        <span class="text-slate-600">de la 79 lei / an</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="bg-white">
        <div class="mx-auto max-w-6xl px-4 py-10 lg:px-6 lg:py-14">
            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-ihcBlue">
                Contact
            </p>
            <h2 class="mt-1 text-2xl font-semibold text-slate-900">
                Hai să mutăm 1C și site‑urile tale pe un hosting mai bun
            </h2>

            <div class="mt-6 grid gap-6 lg:grid-cols-[1.05fr,1.1fr]">
                <div class="space-y-4 text-sm text-slate-700">
                    <p class="text-slate-600">
                        Spune‑ne câte instanțe 1C ai, câți utilizatori și ce site‑uri rulează acum.
                        Îți răspundem cu o ofertă personalizată și un plan clar de migrare gratuită.
                    </p>
                    <div class="grid gap-3 text-xs text-slate-700 sm:grid-cols-2">
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <p class="text-[11px] font-semibold text-slate-900">Email vânzări</p>
                            <p class="text-slate-600">sales@ondsolutions.md</p>
                        </div>
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <p class="text-[11px] font-semibold text-slate-900">Suport tehnic</p>
                            <p class="text-slate-600">support@ondsolutions.md</p>
                        </div>
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <p class="text-[11px] font-semibold text-slate-900">Telefon</p>
                            <p class="text-slate-600">+40 (0) 312 345 678</p>
                        </div>
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3">
                            <p class="text-[11px] font-semibold text-slate-900">Program</p>
                            <p class="text-slate-600">Suport 24/7 prin ticket, telefon L‑V 9:00–18:00</p>
                        </div>
                    </div>
                </div>

                <form method="post" action="#contact" class="glass-soft border border-slate-200 rounded-2xl p-4 sm:p-5 shadow-strong space-y-3">
                    <?php if (!empty($contact_success)) : ?>
    <div class="mb-2 rounded-xl border border-emerald-200 bg-emerald-50 px-3 py-2 text-[11px] text-emerald-700">
        <?php echo htmlspecialchars($contact_success, ENT_QUOTES, 'UTF-8'); ?>
    </div>
<?php elseif (!empty($contact_error)) : ?>
    <div class="mb-2 rounded-xl border border-red-200 bg-red-50 px-3 py-2 text-[11px] text-red-700">
        <?php echo htmlspecialchars($contact_error, ENT_QUOTES, 'UTF-8'); ?>
    </div>
<?php endif; ?>
                    <div>
                        <label class="mb-1 block text-[11px] font-medium text-slate-800">Nume complet</label>
                        <input
                            type="text"
                            name="nume"
                            placeholder="Numele tău"
                             value="<?php echo isset($nume) ? htmlspecialchars($nume, ENT_QUOTES, 'UTF-8') : ''; ?>"
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-900 placeholder:text-slate-400 focus:border-ihcBlue focus:outline-none focus:ring-1 focus:ring-ihcBlue"
                        >
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] font-medium text-slate-800">Email</label>
                        <input
                            type="email"
                            name="email"
                            placeholder="email@firma.ro"
                            value="<?php echo isset($email) ? htmlspecialchars($email, ENT_QUOTES, 'UTF-8') : ''; ?>"
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-900 placeholder:text-slate-400 focus:border-ihcBlue focus:outline-none focus:ring-1 focus:ring-ihcBlue"
                        >
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] font-medium text-slate-800">Mesaj</label>
                        <textarea
                            name="mesaj"
                            placeholder="Spune‑ne câte ceva despre 1C și site‑urile tale, și ce ai nevoie."
                            class="min-h-[90px] w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-900 placeholder:text-slate-400 focus:border-ihcBlue focus:outline-none focus:ring-1 focus:ring-ihcBlue"
                        ><?php echo isset($mesaj) ? htmlspecialchars($mesaj, ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                    </div>
                    <button
                        type="submit"
                        class="btn-anim inline-flex w-full items-center justify-center rounded-full bg-gradient-to-r from-ihcOrange to-ihcBlue px-4 py-2.5 text-[11px] font-semibold uppercase tracking-[0.22em] text-white shadow-lg shadow-ihcBlue/40 hover:brightness-110"
                    >
                        Trimite cererea
                    </button>
                    <p class="text-[10px] text-slate-500">
                        Prin trimiterea formularului ești de acord cu prelucrarea datelor personale conform politicii noastre de confidențialitate.
                    </p>
                </form>
            </div>
        </div>
    </section>
</main>

<!-- FOOTER -->
<footer class="border-t border-slate-200 bg-slate-100">
    <div class="mx-auto max-w-6xl px-4 py-6 text-[11px] text-slate-600 lg:px-6">
        <div class="grid gap-4 md:grid-cols-[2fr,1.1fr,1.1fr]">
            <div>
                <div class="mb-1 flex items-center gap-2">
                    <div class="logo-glow flex h-7 w-7 items-center justify-center rounded-full text-[10px] font-semibold text-white">
                        S
                    </div>
                    <span class="text-[11px] font-semibold uppercase tracking-[0.26em] text-slate-800">
                        Smart Solutions
                    </span>
                </div>
                <p class="max-w-xs text-[11px] text-slate-600">
                    Servicii de găzduire web, VPS/VDS, hosting 1C și înregistrare domenii pentru companii,
                    magazine online și proiecte digitale din România și Europa.
                </p>
            </div>
            <div>
                <p class="mb-1 text-[11px] font-semibold text-slate-800">Servicii</p>
                <div class="space-y-1">
                    <a href="#1c" class="block hover:text-ihcBlue">Hosting 1C</a>
                    <a href="#tarife" class="block hover:text-ihcBlue">Găzduire</a>
                    <a href="#vps" class="block hover:text-ihcBlue">VPS / VDS</a>
                    <a href="#domenii" class="block hover:text-ihcBlue">Domenii</a>
                </div>
            </div>
            <div>
                <p class="mb-1 text-[11px] font-semibold text-slate-800">Companie</p>
                <div class="space-y-1">
                    <a href="#" class="block hover:text-ihcBlue">Despre noi</a>
                    <a href="#" class="block hover:text-ihcBlue">Politica de confidențialitate</a>
                    <a href="#" class="block hover:text-ihcBlue">Termeni și condiții</a>
                </div>
            </div>
        </div>

        <div class="mt-4 flex flex-col gap-2 text-[11px] text-slate-600 sm:flex-row sm:items-center sm:justify-between">
            <span>© <?php echo date('Y'); ?> OND SOLUTIONS SRL. Toate drepturile rezervate.</span>
            <span>Metode de plată: card, transfer bancar, facturare.</span>
        </div>
    </div>
</footer>

<script>
    function scrollToSection(id) {
        const el = document.getElementById(id);
        if (!el) return;
        const offset = 80;
        const rect = el.getBoundingClientRect();
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        window.scrollTo({
            top: rect.top + scrollTop - offset,
            behavior: 'smooth'
        });
    }

    function calcPrice1C() {
        const users = parseInt(document.getElementById('fg-users').value, 10);
        const space = parseInt(document.getElementById('fg-space').value, 10);
        const inst = parseInt(document.getElementById('fg-inst').value, 10);

        document.getElementById('fg-users-val').textContent = users;
        document.getElementById('fg-space-val').textContent = space + ' GB';
        document.getElementById('fg-inst-val').textContent = inst;

        let base = 330;
        base += (users - 1) * 30;
        base += (space - 10) / 70 * 8;
        base += (inst - 1) * 30;

        const price = Math.max(150, Math.round(base));
        document.getElementById('fg-price').innerHTML =
            price + ' lei <span class="text-xs font-normal text-slate-500">/ lună</span>';
    }

    ['fg-users', 'fg-space', 'fg-inst'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', calcPrice1C);
    });
    calcPrice1C();

    function handleDomainCheck(e) {
        e.preventDefault();
        const input = document.getElementById('domain-input');
        const result = document.getElementById('domain-result');
        const value = (input.value || '').trim();

        if (!value) {
            result.textContent = 'Te rugăm să introduci un nume de domeniu.';
            return;
        }

        result.textContent =
            'Am trimis domeniul „' + value +
            '” către host.md pentru verificare. Vezi rezultatul în noul tab deschis.';

        const url = 'https://www.host.md/?pag=domains&domain=' + encodeURIComponent(value);
        window.open(url, '_blank');
    }
</script>

</body>
</html>