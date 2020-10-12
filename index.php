<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Docs | Documentation HTML Template</title>
    <link rel="shortcut icon" type="image/png" href="assets/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Heebo:300,400" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css" />
    <script src="assets/js/uikit.js"></script>
</head>

<body>

    <header>
        <div data-uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent; top: 200">
            <nav class="uk-navbar-container">
                <div class="uk-container">
                    <div data-uk-navbar>
                        <div class="uk-navbar-left">
                            <a class="uk-navbar-item uk-logo uk-visible@m" href="index.html">Docs</a>
                            <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas-docs" data-uk-toggle><span data-uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Docs</span></a>
                            <ul class="uk-navbar-nav uk-visible@m">
                                <li class="uk-active"><a href="index.html">Home</a></li>
                                <li ><a href="doc.html">Docs</a></li>
                            </ul>
                        </div>
                        <div class="uk-navbar-center uk-hidden@m">
                            <a class="uk-navbar-item uk-logo" href="index.html">Docs</a>
                        </div>
                        <div class="uk-navbar-right">
                            <div>
                                <a id="search-navbar-toggle" class="uk-navbar-toggle" data-uk-search-icon href="#"></a>
                                <div class="uk-background-default uk-border-rounded"
                                     data-uk-drop="mode: click; pos: left-center; offset: 0">
                                    <form class="uk-search uk-search-navbar uk-width-1-1" onsubmit="return false;">
                                        <input id="search-navbar" class="uk-search-input" type="search" placeholder="Search for answers"
                                               autofocus autocomplete="off" data-minchars="1" data-maxitems="30">
                                    </form>
                                </div>
                            </div>
                            <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle><span
                                    data-uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="uk-section section-hero uk-position-relative" data-uk-scrollspy="cls: uk-animation-slide-bottom-medium; repeat: true">
            <div class="uk-container uk-container-small">
                <p class="hero-image uk-text-center"><img src="assets/img/knowledge.svg" alt="Hero"></p>
                <h1 class="uk-heading-medium uk-text-center uk-margin-remove-top">How can we help you?</h1>
                <p class="uk-text-lead uk-text-center">Search or browse in depth articles and videos on everything on our awesome
                    product, from basic setup to advanced features and everyday use</p>
                <div class="hero-search">
                    <div class="uk-position-relative">
                        <form class="uk-search uk-search-default uk-width-1-1" name="search-hero" onsubmit="return false;">
                            <span class="uk-search-icon-flip" data-uk-search-icon></span>
                            <input id="search-hero" class="uk-search-input uk-box-shadow-large" type="search"
                                   placeholder="Search for answers" autocomplete="off" data-minchars="1" data-maxitems="30">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="uk-section">
        <div class="uk-container">
            <h2 class="uk-h1 uk-text-center">Browse Topics</h2>
            <p class="uk-text-lead uk-text-center">Chose an option that you need help with or search above</p>
            <div class="uk-child-width-1-3@m uk-grid-match uk-text-center uk-margin-medium-top" data-uk-grid>
                <div>
                    <div
                        class="uk-card uk-card-default uk-box-shadow-medium uk-card-hover uk-card-body uk-inline border-radius-large border-xlight">
                        <a class="uk-position-cover" href="doc.html"></a>
                        <span data-uk-icon="icon: cog; ratio: 3.4" class=""></span>
                        <h3 class="uk-card-title uk-margin">Getting Started</h3>
                        <p>Get started fast with installation and theme setup instructions</p>
                    </div>
                </div>
                <div>
                    <div
                        class="uk-card uk-card-default uk-box-shadow-medium uk-card-hover uk-card-body uk-inline border-radius-large border-xlight">
                        <a class="uk-position-cover" href="doc.html"></a>
                        <span data-uk-icon="icon: settings; ratio: 3.4" class=""></span>
                        <h3 class="uk-card-title uk-margin">Product Features</h3>
                        <p>Lean about all the theme options, features and how to use them</p>
                    </div>
                </div>
                <div>
                    <div
                        class="uk-card uk-card-default uk-box-shadow-medium uk-card-hover uk-card-body uk-inline border-radius-large border-xlight">
                        <a class="uk-position-cover" href="doc.html"></a>
                        <span data-uk-icon="icon: code; ratio: 3.4" class=""></span>
                        <h3 class="uk-card-title uk-margin">Customization</h3>
                        <p>Get help or tailor the theme to your specific requirements</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar">
            <a class="uk-logo" href="index.html">Docs</a>
            <button class="uk-offcanvas-close" type="button" data-uk-close></button>
            <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-top">
                <li class="uk-active"><a href="index.html">Home</a></li>
                <li ><a href="doc.html">Docs</a></li>
                <li ><a href="blog.html">Blog</a></li>
                <li ><a href="contact.html">Contact</a></li>
                <li>
                    <div class="uk-navbar-item"><a class="uk-button uk-button-success" href="contact.html">Contact</a></div>
                </li>
            </ul>
        </div>
    </div>

    <footer class="uk-section uk-text-center uk-text-muted">
        <div class="uk-container uk-container-small">
            <div>
                <ul class="uk-subnav uk-flex-center">
                    <li><a href="#">Home</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="uk-margin-medium uk-text-small copyright link-secondary">Made by <a href="https://unbound.studio/">Unbound Studio</a> in Cleveland, USA.</div>
        </div>
    </footer>

    <script src="assets/js/awesomplete.js"></script>
    <script src="assets/js/custom.js"></script>


</body>

</html>