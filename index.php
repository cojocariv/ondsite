<?php
// index.php – landing page with Tailwind + a few custom utilities, in Romanian.
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Hosting fiabil & VDS modern | Secret Hosting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CDN (for this standalone site) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Small custom layer over Tailwind */
        body {
            background: radial-gradient(circle at top, #020617 0, #020617 45%, #000 100%);
        }
        .glass {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(18px);
        }
        .glass-soft {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(14px);
        }
        .logo-glow {
            background: conic-gradient(from 160deg, #22c55e, #60a5fa, #22c55e);
        }
        .shadow-strong {
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.8);
        }
        .pill-dot {
            box-shadow: 0 0 0 6px rgba(34, 197, 94, 0.18);
        }
    </style>
</head>
<body class="text-slate-50 antialiased">

<!-- HEADER -->
<header class="sticky top-0 z-40 border-b border-slate-800/70 bg-slate-950/80 backdrop-blur-xl">
    <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-3 lg:px-6">
        <a href="#top" class="group flex items-center gap-2">
            <div class="logo-glow flex h-8 w-8 items-center justify-center rounded-full text-xs font-semibold text-slate-950 shadow-strong">
                S
            </div>
            <div class="flex flex-col leading-tight">
                <span class="text-xs font-semibold uppercase tracking-[0.28em] text-slate-300">
                    Secret Hosting
                </span>
                <span class="text-[10px] text-slate-500">Hosting • VPS • Domenii</span>
            </div>
        </a>

        <nav class="hidden items-center gap-8 text-xs font-medium text-slate-300/80 md:flex">
            <a href="#tarife" class="hover:text-slate-50">Tarife</a>
            <a href="#vps" class="hover:text-slate-50">VPS / VDS</a>
            <a href="#domenii" class="hover:text-slate-50">Domenii</a>
            <a href="#contact" class="hover:text-slate-50">Contact</a>
        </nav>

        <div class="hidden items-center gap-3 md:flex">
            <button
                onclick="scrollToSection('contact')"
                class="inline-flex items-center rounded-full border border-slate-700 px-3 py-1.5 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-200 transition hover:border-slate-400 hover:bg-slate-900/80"
            >
                Vreau ofertă
            </button>
            <a
                href="#"
                class="inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-blue-600 px-3.5 py-1.5 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-50 shadow-lg shadow-sky-500/40 transition hover:brightness-110"
            >
                Panou client
            </a>
        </div>
    </div>
</header>

<main id="top" class="pb-16">

    <!-- HERO -->
    <section class="border-b border-slate-800/70 bg-gradient-to-b from-slate-950 via-slate-950/95 to-black">
        <div class="mx-auto grid max-w-6xl gap-10 px-4 py-10 lg:grid-cols-[1.15fr,0.9fr] lg:px-6 lg:py-14">
            <!-- Left -->
            <div>
                <p class="mb-3 text-[11px] font-semibold uppercase tracking-[0.32em] text-slate-400">
                    Hosting premium & servere virtuale
                </p>
                <h1 class="mb-4 text-3xl font-semibold leading-tight tracking-tight text-slate-50 sm:text-[2.35rem] lg:text-[2.7rem]">
                    Hosting <span class="bg-gradient-to-r from-sky-400 via-blue-400 to-emerald-400 bg-clip-text text-transparent">fiabil</span>
                    pentru proiecte care nu își permit pauze.
                </h1>
                <p class="mb-5 max-w-xl text-sm text-slate-300/90">
                    Infrastructură modernă pe SSD NVMe, protecție inteligentă DDoS și migrare gratuită.
                    Totul cu suport real 24/7, în română.
                </p>

                <div class="mb-5 flex flex-wrap gap-2 text-xs text-slate-300/80">
                    <span class="inline-flex items-center gap-2 rounded-full border border-slate-700/80 bg-slate-900/70 px-3 py-1">
                        <span class="h-2 w-2 rounded-full bg-emerald-400 pill-dot"></span>
                        Uptime minim 99,9%+
                    </span>
                    <span class="inline-flex items-center gap-2 rounded-full border border-slate-700/80 bg-slate-900/70 px-3 py-1">
                        <span class="h-2 w-2 rounded-full bg-emerald-400 pill-dot"></span>
                        Migrare gratuită
                    </span>
                    <span class="inline-flex items-center gap-2 rounded-full border border-slate-700/80 bg-slate-900/70 px-3 py-1">
                        <span class="h-2 w-2 rounded-full bg-emerald-400 pill-dot"></span>
                        SSL inclus
                    </span>
                </div>

                <div class="mb-6 flex flex-wrap gap-3">
                    <button
                        onclick="scrollToSection('tarife')"
                        class="inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-blue-600 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-50 shadow-lg shadow-sky-500/40 transition hover:brightness-110"
                    >
                        Alege un pachet
                    </button>
                    <button
                        onclick="scrollToSection('domenii')"
                        class="inline-flex items-center rounded-full border border-slate-700 bg-slate-900/70 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-200 transition hover:border-slate-400 hover:bg-slate-900"
                    >
                        Verifică un domeniu
                    </button>
                </div>

                <dl class="grid gap-3 text-[11px] text-slate-400/90 sm:grid-cols-3 sm:text-[12px]">
                    <div>
                        <dt class="text-slate-500">Experiență</dt>
                        <dd class="font-semibold text-slate-100">10+ ani în hosting</dd>
                    </div>
                    <div>
                        <dt class="text-slate-500">Suport</dt>
                        <dd class="font-semibold text-slate-100">24/7, în limba română</dd>
                    </div>
                    <div>
                        <dt class="text-slate-500">Infrastructură</dt>
                        <dd class="font-semibold text-slate-100">Datacentere UE & RO</dd>
                    </div>
                </dl>
            </div>

            <!-- Right: pricing card -->
            <aside class="glass shadow-strong rounded-2xl border border-slate-800/80 p-4 sm:p-5">
                <div class="mb-4 flex items-start justify-between gap-3">
                    <div>
                        <h2 class="text-sm font-semibold text-slate-50">
                            Calculează un pachet de găzduire
                        </h2>
                        <p class="text-[11px] text-slate-400/90">
                            Ajustează resursele pentru site‑ul tău. Fără taxe ascunse.
                        </p>
                    </div>
                    <span class="inline-flex items-center rounded-full border border-emerald-400/40 bg-emerald-500/15 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-[0.18em] text-emerald-200">
                        Test 7 zile
                    </span>
                </div>

                <!-- Sliders -->
                <div class="space-y-3">
                    <div class="space-y-1">
                        <div class="flex items-center justify-between text-[11px] text-slate-400">
                            <span>Număr site‑uri</span>
                            <span id="fg-sites-val" class="font-medium text-slate-100">1</span>
                        </div>
                        <input
                            id="fg-sites"
                            type="range"
                            min="1"
                            max="10"
                            value="1"
                            class="w-full accent-sky-500"
                        >
                    </div>

                    <div class="space-y-1">
                        <div class="flex items-center justify-between text-[11px] text-slate-400">
                            <span>Spațiu SSD (GB)</span>
                            <span id="fg-space-val" class="font-medium text-slate-100">20 GB</span>
                        </div>
                        <input
                            id="fg-space"
                            type="range"
                            min="10"
                            max="100"
                            step="10"
                            value="20"
                            class="w-full accent-sky-500"
                        >
                    </div>

                    <div class="space-y-1">
                        <div class="flex items-center justify-between text-[11px] text-slate-400">
                            <span>Bază de date (GB)</span>
                            <span id="fg-db-val" class="font-medium text-slate-100">1 GB</span>
                        </div>
                        <input
                            id="fg-db"
                            type="range"
                            min="0.5"
                            max="10"
                            step="0.5"
                            value="1"
                            class="w-full accent-sky-500"
                        >
                    </div>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.24em] text-sky-400/80">
                            Estimare lunară
                        </p>
                        <p id="fg-price" class="text-2xl font-semibold text-slate-50">
                            19 lei <span class="text-xs font-normal text-slate-400">/ lună</span>
                        </p>
                    </div>
                    <p class="max-w-[10rem] text-[11px] text-slate-400/90 text-right">
                        Preț valabil la plata anuală. Fără perioadă minimă contractuală.
                    </p>
                </div>

                <button
                    class="mt-4 inline-flex w-full items-center justify-center rounded-full bg-gradient-to-r from-sky-500 to-blue-600 px-4 py-2.5 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-50 shadow-lg shadow-sky-500/40 transition hover:brightness-110"
                >
                    Configurează pachet
                </button>

                <p class="mt-3 text-[11px] text-slate-400/90">
                    <span class="font-semibold text-slate-100">Migrare gratuită</span> de la alt furnizor,
                    inclusiv copiere fișiere, baze de date și actualizare DNS.
                </p>
            </aside>
        </div>
    </section>

    <!-- HOSTING PLANS -->
    <section id="tarife" class="border-b border-slate-800/70 bg-slate-950/95">
        <div class="mx-auto max-w-6xl px-4 py-10 lg:px-6 lg:py-14">
            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-slate-400">
                Servicii
            </p>
            <div class="mt-1 flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
                <h2 class="text-2xl font-semibold text-slate-50">
                    Găzduire pentru orice tip de proiect
                </h2>
                <p class="max-w-md text-xs text-slate-400">
                    De la site‑uri mici de prezentare până la magazine online și aplicații interne.
                    Pachete scalabile, optimizate pentru WordPress și Laravel.
                </p>
            </div>

            <div class="mt-8 grid gap-5 md:grid-cols-3">
                <!-- Plan 1 -->
                <article class="glass-soft border border-slate-800/80 rounded-2xl p-4 pb-5 transition hover:border-sky-500/80 hover:shadow-strong">
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-slate-700/70 bg-slate-900/80 px-2.5 py-1">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                        <span class="text-[11px] font-medium text-slate-200">Începători & bloguri</span>
                    </div>
                    <div class="mb-3 inline-flex h-8 w-8 items-center justify-center rounded-xl bg-slate-900 text-xs font-semibold text-sky-300">
                        H
                    </div>
                    <h3 class="text-sm font-semibold text-slate-50">Hosting esențial</h3>
                    <p class="mt-1 text-xs text-slate-400">
                        Ideal pentru bloguri personale, site‑uri de prezentare și portofolii.
                    </p>
                    <ul class="mt-3 space-y-1.5 text-xs text-slate-300/90">
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> 1 site inclus
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> 10 GB SSD NVMe
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> Trafic nelimitat
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> SSL și backup automat
                        </li>
                    </ul>
                    <div class="mt-4">
                        <p class="text-xs text-slate-400">De la</p>
                        <p class="text-xl font-semibold text-slate-50">
                            9 lei <span class="text-xs font-normal text-slate-400">/ lună</span>
                        </p>
                        <p class="text-[11px] text-slate-500">la plata anuală</p>
                    </div>
                </article>

                <!-- Plan 2 -->
                <article class="glass-soft border border-sky-500/80 ring-1 ring-sky-500/20 rounded-2xl p-4 pb-5 shadow-strong">
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full bg-sky-500/15 px-2.5 py-1">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                        <span class="text-[11px] font-medium text-sky-100">Recomandat pentru magazine online</span>
                    </div>
                    <div class="mb-3 inline-flex h-8 w-8 items-center justify-center rounded-xl bg-sky-500/15 text-xs font-semibold text-sky-300">
                        P
                    </div>
                    <h3 class="text-sm font-semibold text-slate-50">Hosting pentru magazin online</h3>
                    <p class="mt-1 text-xs text-slate-400">
                        Optimizat pentru WooCommerce, PrestaShop și aplicații cu trafic mediu.
                    </p>
                    <ul class="mt-3 space-y-1.5 text-xs text-slate-300/90">
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> până la 5 site‑uri
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> 30 GB SSD NVMe
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> Backup zilnic & cache
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> Protecție DDoS inclusă
                        </li>
                    </ul>
                    <div class="mt-4">
                        <p class="text-xs text-slate-400">De la</p>
                        <p class="text-xl font-semibold text-slate-50">
                            24 lei <span class="text-xs font-normal text-slate-400">/ lună</span>
                        </p>
                        <p class="text-[11px] text-slate-500">migrare gratuită inclusă</p>
                    </div>
                </article>

                <!-- Plan 3 -->
                <article class="glass-soft border border-slate-800/80 rounded-2xl p-4 pb-5 transition hover:border-sky-500/80 hover:shadow-strong">
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-slate-700/70 bg-slate-900/80 px-2.5 py-1">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                        <span class="text-[11px] font-medium text-slate-200">Companii & aplicații</span>
                    </div>
                    <div class="mb-3 inline-flex h-8 w-8 items-center justify-center rounded-xl bg-slate-900 text-xs font-semibold text-sky-300">
                        B
                    </div>
                    <h3 class="text-sm font-semibold text-slate-50">Hosting business</h3>
                    <p class="mt-1 text-xs text-slate-400">
                        Pentru aplicații interne, CRM, ERP sau proiecte cu SLA ridicat.
                    </p>
                    <ul class="mt-3 space-y-1.5 text-xs text-slate-300/90">
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> site‑uri nelimitate
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> 100 GB SSD NVMe
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> Prioritate în suport
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> IP dedicat opțional
                        </li>
                    </ul>
                    <div class="mt-4">
                        <p class="text-xs text-slate-400">De la</p>
                        <p class="text-xl font-semibold text-slate-50">
                            69 lei <span class="text-xs font-normal text-slate-400">/ lună</span>
                        </p>
                        <p class="text-[11px] text-slate-500">contract & facturare pentru firme</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- VPS -->
    <section id="vps" class="border-b border-slate-800/70 bg-slate-950/95">
        <div class="mx-auto max-w-6xl px-4 py-10 lg:px-6 lg:py-14">
            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-slate-400">
                Servere virtuale
            </p>
            <h2 class="mt-1 text-2xl font-semibold text-slate-50">
                VPS / VDS pe SSD NVMe în Europa
            </h2>

            <div class="mt-6 grid gap-6 lg:grid-cols-[1.1fr,1.1fr]">
                <div>
                    <p class="text-sm text-slate-400">
                        Servere virtuale cu acces root complet, resurse dedicate și stocare NVMe,
                        ideale pentru aplicații cu cerințe ridicate de performanță și disponibilitate.
                    </p>
                    <div class="mt-5 grid gap-3 text-xs text-slate-300/90 sm:grid-cols-2">
                        <div class="rounded-xl border border-slate-800 bg-slate-950/80 p-3">
                            <h3 class="mb-1 text-[12px] font-semibold text-slate-100">KVM & virtualizare completă</h3>
                            <p class="text-[11px] text-slate-400">
                                Rulezi distribuția de Linux sau Windows preferată, cu acces complet la configurare.
                            </p>
                        </div>
                        <div class="rounded-xl border border-slate-800 bg-slate-950/80 p-3">
                            <h3 class="mb-1 text-[12px] font-semibold text-slate-100">Resurse garantate</h3>
                            <p class="text-[11px] text-slate-400">
                                RAM și CPU rezervate, fără vecini zgomotoși. Scalare rapidă la nevoie.
                            </p>
                        </div>
                        <div class="rounded-xl border border-slate-800 bg-slate-950/80 p-3">
                            <h3 class="mb-1 text-[12px] font-semibold text-slate-100">Datacentere în UE</h3>
                            <p class="text-[11px] text-slate-400">
                                Latență mică pentru clienți din România și Europa, conexiuni redundante.
                            </p>
                        </div>
                        <div class="rounded-xl border border-slate-800 bg-slate-950/80 p-3">
                            <h3 class="mb-1 text-[12px] font-semibold text-slate-100">Management opțional</h3>
                            <p class="text-[11px] text-slate-400">
                                Putem administra noi serverul: update‑uri, securitate, monitorizare 24/7.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="glass-soft border border-slate-800/80 rounded-2xl p-4 sm:p-5 shadow-strong">
                    <div class="mb-3 flex items-center justify-between gap-3">
                        <h3 class="text-sm font-semibold text-slate-50">
                            Configurații populare VPS
                        </h3>
                        <span class="inline-flex items-center rounded-full border border-slate-700 bg-slate-900/80 px-2 py-0.5 text-[10px] font-medium uppercase tracking-[0.18em] text-slate-300">
                            scalabile la cerere
                        </span>
                    </div>

                    <ul class="space-y-2 text-xs text-slate-300/90">
                        <li class="flex items-start gap-2 rounded-xl border border-slate-800/80 bg-slate-950/80 p-3">
                            <span class="mt-[6px] h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                            <div>
                                <p class="font-semibold text-slate-50">VDS‑Start</p>
                                <p class="text-[11px] text-slate-400">
                                    2 vCPU, 4 GB RAM, 40 GB NVMe – de la <span class="font-semibold text-slate-100">49 lei / lună</span>
                                </p>
                            </div>
                        </li>
                        <li class="flex items-start gap-2 rounded-xl border border-slate-800/80 bg-slate-950/80 p-3">
                            <span class="mt-[6px] h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                            <div>
                                <p class="font-semibold text-slate-50">VDS‑Pro</p>
                                <p class="text-[11px] text-slate-400">
                                    4 vCPU, 8 GB RAM, 80 GB NVMe – de la <span class="font-semibold text-slate-100">99 lei / lună</span>
                                </p>
                            </div>
                        </li>
                        <li class="flex items-start gap-2 rounded-xl border border-slate-800/80 bg-slate-950/80 p-3">
                            <span class="mt-[6px] h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                            <div>
                                <p class="font-semibold text-slate-50">VDS‑Max</p>
                                <p class="text-[11px] text-slate-400">
                                    8 vCPU, 16 GB RAM, 160 GB NVMe – de la <span class="font-semibold text-slate-100">199 lei / lună</span>
                                </p>
                            </div>
                        </li>
                    </ul>

                    <p class="mt-3 text-[11px] text-slate-400">
                        Fiecare VPS include IP dedicat, firewall la nivel de rețea și suport pentru panouri precum
                        <span class="text-slate-200">ispmanager, cPanel, Plesk</span>.
                    </p>

                    <button
                        onclick="scrollToSection('contact')"
                        class="mt-4 inline-flex w-full items-center justify-center rounded-full border border-slate-700 bg-slate-900/80 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-200 transition hover:border-slate-400 hover:bg-slate-900"
                    >
                        Cere o ofertă personalizată
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- DOMAINS -->
    <section id="domenii" class="border-b border-slate-800/70 bg-slate-950">
        <div class="mx-auto max-w-6xl px-4 py-10 lg:px-6 lg:py-14">
            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-slate-400">
                Domenii
            </p>
            <h2 class="mt-1 text-2xl font-semibold text-slate-50">
                Verifică disponibilitatea domeniului tău
            </h2>

            <div class="mt-6 glass-soft border border-slate-800/80 rounded-2xl p-4 sm:p-5 shadow-strong">
                <p class="text-sm text-slate-300/90">
                    Un brand bun începe cu un nume memorabil. Introdu domeniul dorit, iar noi îți răspund
                    rapid cu disponibilitatea și ofertele de înregistrare.
                </p>

                <form class="mt-4 flex flex-col gap-3 sm:flex-row" onsubmit="handleDomainCheck(event)">
                    <input
                        id="domain-input"
                        type="text"
                        placeholder="exemplu.ro"
                        class="w-full rounded-xl border border-slate-800 bg-slate-950/90 px-3 py-2 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                    >
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-sky-500 to-blue-600 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-50 shadow-lg shadow-sky-500/40 transition hover:brightness-110"
                    >
                        Verifică domeniu
                    </button>
                </form>

                <p id="domain-result" class="mt-3 text-xs text-slate-400"></p>

                <div class="mt-4 grid gap-2 text-xs text-slate-300 sm:grid-cols-4">
                    <div class="flex items-center justify-between rounded-xl border border-slate-800 bg-slate-950/90 px-3 py-2">
                        <span class="font-semibold text-slate-50">.ro</span>
                        <span class="text-slate-400">de la 45 lei / an</span>
                    </div>
                    <div class="flex items-center justify-between rounded-xl border border-slate-800 bg-slate-950/90 px-3 py-2">
                        <span class="font-semibold text-slate-50">.com</span>
                        <span class="text-slate-400">de la 59 lei / an</span>
                    </div>
                    <div class="flex items-center justify-between rounded-xl border border-slate-800 bg-slate-950/90 px-3 py-2">
                        <span class="font-semibold text-slate-50">.eu</span>
                        <span class="text-slate-400">de la 49 lei / an</span>
                    </div>
                    <div class="flex items-center justify-between rounded-xl border border-slate-800 bg-slate-950/90 px-3 py-2">
                        <span class="font-semibold text-slate-50">.shop</span>
                        <span class="text-slate-400">de la 79 lei / an</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="bg-slate-950">
        <div class="mx-auto max-w-6xl px-4 py-10 lg:px-6 lg:py-14">
            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-slate-400">
                Contact
            </p>
            <h2 class="mt-1 text-2xl font-semibold text-slate-50">
                Hai să mutăm site‑ul tău pe un hosting mai bun
            </h2>

            <div class="mt-6 grid gap-6 lg:grid-cols-[1.05fr,1.1fr]">
                <div class="space-y-4 text-sm text-slate-300">
                    <p class="text-slate-400">
                        Spune‑ne câte site‑uri ai, ce tip de proiect rulezi și de la ce furnizor vii.
                        Îți răspundem cu o ofertă personalizată și un plan clar de migrare gratuită.
                    </p>
                    <div class="grid gap-3 text-xs text-slate-300 sm:grid-cols-2">
                        <div class="rounded-xl border border-slate-800 bg-slate-950/90 p-3">
                            <p class="text-[11px] font-semibold text-slate-100">Email vânzări</p>
                            <p class="text-slate-400">sales@secrethosting.ro</p>
                        </div>
                        <div class="rounded-xl border border-slate-800 bg-slate-950/90 p-3">
                            <p class="text-[11px] font-semibold text-slate-100">Suport tehnic</p>
                            <p class="text-slate-400">support@secrethosting.ro</p>
                        </div>
                        <div class="rounded-xl border border-slate-800 bg-slate-950/90 p-3">
                            <p class="text-[11px] font-semibold text-slate-100">Telefon</p>
                            <p class="text-slate-400">+40 (0) 312 345 678</p>
                        </div>
                        <div class="rounded-xl border border-slate-800 bg-slate-950/90 p-3">
                            <p class="text-[11px] font-semibold text-slate-100">Program</p>
                            <p class="text-slate-400">Suport 24/7 prin ticket, telefon L‑V 9:00–18:00</p>
                        </div>
                    </div>
                </div>

                <form method="post" action="" class="glass-soft border border-slate-800/80 rounded-2xl p-4 sm:p-5 shadow-strong space-y-3">
                    <div>
                        <label class="mb-1 block text-[11px] font-medium text-slate-300">Nume complet</label>
                        <input
                            type="text"
                            name="nume"
                            placeholder="Numele tău"
                            class="w-full rounded-xl border border-slate-800 bg-slate-950/90 px-3 py-2 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        >
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] font-medium text-slate-300">Email</label>
                        <input
                            type="email"
                            name="email"
                            placeholder="email@firma.ro"
                            class="w-full rounded-xl border border-slate-800 bg-slate-950/90 px-3 py-2 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        >
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] font-medium text-slate-300">Website existent (opțional)</label>
                        <input
                            type="text"
                            name="site"
                            placeholder="https://exemplu.ro"
                            class="w-full rounded-xl border border-slate-800 bg-slate-950/90 px-3 py-2 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        >
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] font-medium text-slate-300">Mesaj</label>
                        <textarea
                            name="mesaj"
                            placeholder="Spune‑ne câte ceva despre proiectul tău și ce ai nevoie."
                            class="min-h-[90px] w-full rounded-xl border border-slate-800 bg-slate-950/90 px-3 py-2 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        ></textarea>
                    </div>
                    <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center rounded-full bg-gradient-to-r from-sky-500 to-blue-600 px-4 py-2.5 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-50 shadow-lg shadow-sky-500/40 transition hover:brightness-110"
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
<footer class="border-t border-slate-800/80 bg-black/95">
    <div class="mx-auto max-w-6xl px-4 py-6 text-[11px] text-slate-500 lg:px-6">
        <div class="grid gap-4 md:grid-cols-[2fr,1.1fr,1.1fr]">
            <div>
                <div class="mb-1 flex items-center gap-2">
                    <div class="logo-glow flex h-7 w-7 items-center justify-center rounded-full text-[10px] font-semibold text-slate-950">
                        S
                    </div>
                    <span class="text-[11px] font-semibold uppercase tracking-[0.26em] text-slate-300">
                        Secret Hosting
                    </span>
                </div>
                <p class="max-w-xs text-[11px] text-slate-500">
                    Servicii de găzduire web, VPS/VDS și înregistrare domenii pentru companii,
                    magazine online și proiecte digitale din România și Europa.
                </p>
            </div>
            <div>
                <p class="mb-1 text-[11px] font-semibold text-slate-200">Servicii</p>
                <div class="space-y-1">
                    <a href="#tarife" class="block hover:text-slate-200">Găzduire shared</a>
                    <a href="#vps" class="block hover:text-slate-200">VPS / VDS</a>
                    <a href="#domenii" class="block hover:text-slate-200">Domenii</a>
                    <a href="#contact" class="block hover:text-slate-200">Migrare gratuită</a>
                </div>
            </div>
            <div>
                <p class="mb-1 text-[11px] font-semibold text-slate-200">Companie</p>
                <div class="space-y-1">
                    <a href="#" class="block hover:text-slate-200">Despre noi</a>
                    <a href="#" class="block hover:text-slate-200">Politica de confidențialitate</a>
                    <a href="#" class="block hover:text-slate-200">Termeni și condiții</a>
                    <a href="#" class="block hover:text-slate-200">ANPC / soluționare litigii</a>
                </div>
            </div>
        </div>

        <div class="mt-4 flex flex-col gap-2 text-[11px] text-slate-600 sm:flex-row sm:items-center sm:justify-between">
            <span>© <?php echo date('Y'); ?> Secret Hosting SRL. Toate drepturile rezervate.</span>
            <span>Metode de plată: card, transfer bancar, facturare pentru firme.</span>
        </div>
    </div>
</footer>

<script>
    function scrollToSection(id) {
        const el = document.getElementById(id);
        if (!el) return;
        const offset = 72;
        const rect = el.getBoundingClientRect();
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        window.scrollTo({
            top: rect.top + scrollTop - offset,
            behavior: 'smooth'
        });
    }

    function calcPrice() {
        const sites = parseInt(document.getElementById('fg-sites').value, 10);
        const space = parseInt(document.getElementById('fg-space').value, 10);
        const db = parseFloat(document.getElementById('fg-db').value);

        document.getElementById('fg-sites-val').textContent = sites;
        document.getElementById('fg-space-val').textContent = space + ' GB';
        document.getElementById('fg-db-val').textContent = db + ' GB';

        let base = 9;
        base += (sites - 1) * 3;
        base += (space - 10) / 10 * 2;
        base += (db - 1) * 1.5;

        const price = Math.max(9, Math.round(base));
        document.getElementById('fg-price').innerHTML = price + ' lei <span class="text-xs font-normal text-slate-400">/ lună</span>';
    }

    ['fg-sites', 'fg-space', 'fg-db'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', calcPrice);
    });
    calcPrice();

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
            'Verificăm disponibilitatea pentru „' + value +
            '”. Un consultant îți va trimite oferta pe email în cel mai scurt timp.';
    }
</script>

</body>
</html>
