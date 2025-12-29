<x-app-layout>
    <style>
        /* Base Reset & Layout */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start; /* Default for mobile */
            min-height: 100vh;
            padding: 1.5rem; /* p-6 */
            transition: background-color 0.3s, color 0.3s;
        }

        /* Desktop Layout Adjustments */
        @media (min-width: 1024px) {
            body {
                justify-content: center;
                padding: 2rem; /* lg:p-8 */
            }
        }

        /* Header & Navigation */
        .main-header {
            width: 100%;
            max-width: 335px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem; /* text-sm */
        }

        .nav-menu {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 1rem; /* gap-4 */
        }

        .nav-link {
            display: inline-block;
            padding: 0.375rem 1.25rem; /* px-5 py-1.5 */
            text-decoration: none;
            color: var(--text-main);
            border: 1px solid transparent;
            border-radius: 0.125rem; /* rounded-sm */
            line-height: 1.5;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            border-color: var(--border-color);
        }

        .nav-link.active {
            border-color: var(--border-color);
        }

        .nav-link.active:hover {
            border-color: var(--border-hover);
        }

        /* Main Content Wrapper */
        .content-wrapper {
            height: 100%;
            width: 100%;
            max-width: 335px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
        }

        /* Desktop Wrapper Adjustments */
        @media (min-width: 1024px) {
            .main-header, .content-wrapper {
                max-width: 56rem; /* lg:max-w-4xl */
            }

            .content-wrapper {
                flex-direction: row;
                align-items: flex-start;
                justify-content: space-between;
                gap: 0;
            }
        }

        /* Hero Section */
        .hero-section {
            display: flex;
            width: 65vw;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            gap: 1rem;
        }

        @media (min-width: 1024px) {
            .hero-section {
                align-items: flex-start;
                text-align: left;
            }
        }

        .hero-title {
            font-size: 2.25rem; /* text-4xl */
            font-weight: 600;
            line-height: 1.25;
            font-family: 'BBH Bartle', sans-serif;
        }

        @media (min-width: 1024px) {
            .hero-title {
                font-size: 3rem; /* lg:text-5xl */
            }
        }

        .highlight-text {
            color: var(--primary-color);
        }

        .hero-description {
            color: var(--text-muted);
            max-width: 32rem; /* max-w-lg */
            line-height: 1.5;
        }

        /* Buttons */
        .btn-primary {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1.5rem; /* px-6 py-2 */
            background-color: var(--primary-color);
            color: var(--text-button);
            text-decoration: none;
            border-radius: 0.125rem; /* rounded-sm */
            font-size: 0.875rem; /* text-sm */
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: var(--primary-color-hover);
        }

        hr {
            border: none;
            border-top: 1px solid var(--border-color);
            width: 100%;
            margin: 1rem 0;
        }
    </style>

    <header class="main-header">
        <nav class="nav-menu">
            <a href="/login" class="nav-link">Log in</a>
            <a href="/register" class="nav-link active">Register</a>
            <button @click="darkMode = !darkMode" type="button" class="inline-flex items-center p-2 border border-transparent rounded-full shadow-sm text-white bg-[--primary-color] hover:bg-[--primary-color-hover] focus:outline-none transition ease-in-out duration-150">
                <svg x-show="darkMode" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <svg x-show="!darkMode" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>
        </nav>
    </header>

    <body x-data="{ 
        darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) 
    }" 
    x-init="$watch('darkMode', val => {
        localStorage.setItem('theme', val ? 'dark' : 'light');
        document.documentElement.classList.toggle('dark', val);
    }); if(darkMode) document.documentElement.classList.add('dark');"
    class="content-wrapper">
        <div class="hero-section">
            <h1 class="hero-title">
                Welcome to <span class="highlight-text">Our Application</span>
            </h1>
            <hr>
            <p class="hero-description">
                This is a sample welcome page built with Laravel and converted to vanilla CSS. Explore the features and get started with your project!
            </p>
            
            <div class="cta-group">
                <a href="/login" class="btn-primary">
                    Log in
                </a>
            </div>
        </div>
    </body>
</x-app-layout>