=== PortoLite ===

Contributors: devmonowar
Requires at least: 6.0
Tested up to: 6.5
Requires PHP: 7.4
Stable tag: 1.0.0
License: GNU General Public License v2 or later
License URI: LICENSE
Tags: custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready, two-columns, right-sidebar, block-styles, wide-blocks

PortoLite is a creative agency and portfolio WordPress theme built around an
ACF flexible-content page builder.

== Description ==

PortoLite builds pages from sections rather than from a page builder's DOM.
Each section is an ACF flexible-content layout with its own fields, its own
template part and its own stylesheet, and the theme loads only the CSS and
JavaScript the sections on that page actually need.

Design values live in one place. assets/css/portolite-tokens.css declares
every colour, type size, space step, radius, shadow and duration the theme
uses; nothing else hardcodes one. Dark mode is nine of those tokens being
redefined under a body class, which is why it reaches sections written after
it, and prefers-reduced-motion zeroes the duration tokens for everything at
once.

The theme ships its own 12-column grid rather than Bootstrap, and no imagery
at all — pictures come with the demo content, not in the download.

= Requirements =

* WordPress 6.0 or newer, PHP 7.4 or newer
* Advanced Custom Fields PRO — the page builder is built on flexible content,
  repeater and gallery fields
* Kirki — powers the Customizer controls
* PortoLite Core — registers the Team custom post type

The theme prompts for all three on activation.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file.
   Click Install Now.
3. Click Activate.
4. Accept the plugin prompt that appears, and install the required plugins.
5. Create a page, set its template to "Page (Flexible Sections)", and add
   sections under Page Sections.

== Frequently Asked Questions ==

= Do I have to use the section builder? =

No. Ordinary pages, posts, archives and the blog all work without it. The
section builder applies only to pages using the "Page (Flexible Sections)"
template.

= Can I change the colours? =

The brand colour has a picker: Appearance > Customize > Typography Setting >
Brand colour. It changes every button, link, icon and accent at once, and
works out the hover shade and the colour of text sitting on it, so the
buttons stay readable whatever you pick.

Everything else resolves to a custom property in
assets/css/portolite-tokens.css. Change it there, or override the same
property from a child theme — no section stylesheet needs touching.

= Does the theme work without JavaScript? =

The FAQ accordion, the marquee band, the feature-list previews and the CTA
band's parallax are CSS only. Carousels and scroll animations need their
libraries, which load only on pages carrying a section that uses them.

== Changelog ==

= 1.0.0 =
* Initial release.

== Credits ==

Bundled third-party libraries, with their licences:

* GSAP 3.10.4, (C) GreenSock — GreenSock Standard License,
  https://greensock.com/standard-license
* ScrollTrigger 3.10.4, (C) GreenSock — GreenSock Standard License
* SplitText 3.6.1, (C) GreenSock — Club GreenSock plugin, see the note below
* Owl Carousel 2, (C) David Deutsch — MIT
* Magnific Popup, (C) Dmitry Semenov — MIT
* Isotope 2.1.1, (C) Metafizzy — GPLv3, commercial licence also available
* WOW.js 1.0.1, (C) Matthieu Aussaguel — MIT
* Animate.css, (C) Daniel Eden — MIT
* jQuery Nice Select, (C) Hernan Sartorio — MIT
* jQuery Validation, (C) Jorn Zaefferer — MIT
* jQuery.appear, (C) Andrey Sidorov — MIT
* Odometer, (C) HubSpot — MIT
* TGM Plugin Activation, (C) Thomas Griffin, Gary Jones, Juliette Reinders
  Folmer — GPLv2 or later
* Underscores, (C) Automattic — GPLv2 or later
* Space Grotesk, (C) Florian Karsten — SIL Open Font License 1.1
* Inter, (C) The Inter Project Authors — SIL Open Font License 1.1

SplitText is not redistributable under the GreenSock Standard License. It is
a Club GreenSock plugin, and the copy bundled here — 3.6.1, from 2021 —
predates GSAP 3.13, where the plugins became free. Before this theme is sold,
either upgrade GSAP and SplitText to 3.13 or later, or drop SplitText and the
heading reveal it drives. This is a licensing question rather than a technical
one, and it has to be settled before submission.

Images are not bundled. Any photography used in the demo content is licensed
separately and listed in the demo import documentation.
