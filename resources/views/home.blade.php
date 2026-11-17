<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A simple page about Arsenal Football Club.">
    <title>Arsenal — North London</title>
    <style>
        :root {
            color-scheme: light;
            --red: #d71920;
            --ink: #201c1c;
            --muted: #716b68;
            --paper: #f7f5f2;
            --line: #dedad6;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
        }

        a {
            color: inherit;
        }

        .site-header,
        main,
        .site-footer {
            width: min(100% - 3rem, 1080px);
            margin-inline: auto;
        }

        .site-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-block: 1.25rem;
            border-bottom: 1px solid var(--line);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-decoration: none;
            text-transform: uppercase;
        }

        .brand-mark {
            display: grid;
            width: 2rem;
            aspect-ratio: 1;
            place-items: center;
            border-radius: 50%;
            background: var(--red);
            color: white;
            font-size: 0.8rem;
        }

        nav {
            display: flex;
            gap: 1.5rem;
            font-size: 0.85rem;
        }

        nav a {
            text-decoration: none;
        }

        nav a:hover,
        nav a:focus-visible {
            color: var(--red);
        }

        .hero {
            display: grid;
            min-height: 370px;
            align-content: center;
            padding-block: 5rem;
        }

        .eyebrow {
            margin: 0 0 0.8rem;
            color: var(--red);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.16em;
            text-transform: uppercase;
        }

        h1,
        h2,
        p {
            margin-top: 0;
        }

        h1 {
            max-width: 700px;
            margin-bottom: 1rem;
            font-size: clamp(3rem, 8vw, 6.5rem);
            letter-spacing: -0.07em;
            line-height: 0.98;
        }

        .hero-copy {
            max-width: 540px;
            margin-bottom: 0;
            color: var(--muted);
            font-size: 1.1rem;
        }

        .details {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 4rem;
            padding-block: 2.5rem 4rem;
            border-top: 1px solid var(--line);
        }

        h2 {
            margin-bottom: 0.8rem;
            font-size: 1.25rem;
        }

        .details-copy {
            max-width: 580px;
            margin-bottom: 0;
            color: var(--muted);
        }

        .facts {
            margin: 0;
        }

        .fact {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            padding-block: 0.7rem;
            border-bottom: 1px solid var(--line);
            font-size: 0.9rem;
        }

        .fact dt {
            color: var(--muted);
        }

        .fact dd {
            margin: 0;
            font-weight: 700;
            text-align: right;
        }

        .site-footer {
            padding-block: 1.25rem;
            border-top: 1px solid var(--line);
            color: var(--muted);
            font-size: 0.8rem;
        }

        @media (max-width: 640px) {
            .site-header,
            main,
            .site-footer {
                width: min(100% - 2rem, 1080px);
            }

            .site-header {
                align-items: flex-start;
                gap: 1rem;
            }

            nav {
                gap: 0.8rem;
            }

            .hero {
                min-height: 320px;
                padding-block: 4rem;
            }

            .details {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <a class="brand" href="#top" aria-label="Arsenal, back to top">
            <span class="brand-mark" aria-hidden="true">A</span>
            <span>Arsenal</span>
        </a>
        <nav aria-label="Main navigation">
            <a href="#about">About</a>
            <a href="#club-facts">Club facts</a>
        </nav>
    </header>

    <main id="top">
        <section class="hero" aria-labelledby="page-title">
            <p class="eyebrow">North London | Est. 1886</p>
            <h1 id="page-title">North London.<br>Red forever.</h1>
            <p class="hero-copy">
                A simple page for supporters of Arsenal Football Club — a club with a long history,
                a home in North London, and a place in the heart of its fans.
            </p>
        </section>

        <section class="details" id="about">
            <div>
                <p class="eyebrow">The club</p>
                <h2>A North London institution</h2>
                <p class="details-copy">
                    Founded in 1886, Arsenal grew from a team of workers in Woolwich into one of
                    English football's best-known clubs. The Gunners moved to North London in 1913
                    and have called the Emirates Stadium home since 2006.
                </p>
            </div>
            <div id="club-facts">
                <p class="eyebrow">At a glance</p>
                <dl class="facts">
                    <div class="fact">
                        <dt>Founded</dt>
                        <dd>1886</dd>
                    </div>
                    <div class="fact">
                        <dt>Home</dt>
                        <dd>Emirates Stadium</dd>
                    </div>
                    <div class="fact">
                        <dt>Colours</dt>
                        <dd>Red and white</dd>
                    </div>
                    <div class="fact">
                        <dt>Nickname</dt>
                        <dd>The Gunners</dd>
                    </div>
                </dl>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        An independent fan page. Not affiliated with Arsenal Football Club.
    </footer>
</body>
</html>
