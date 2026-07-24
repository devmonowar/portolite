# Translations

`load_theme_textdomain()` in `functions.php` points at this folder, so it has to
exist in the shipped package even while it is empty.

**`portolite.pot` is not here yet, deliberately.** Generating it is the last code
task before submission: every change made before it adds new strings and stales
the file, so doing it early means doing it twice. It pairs with the rest of the
submission paperwork.

When the time comes, from the theme root:

    wp i18n make-pot . languages/portolite.pot --domain=portolite

Translators then copy `portolite.pot` to `portolite-<locale>.po`, translate it,
and compile a `.mo` alongside — for example `portolite-bn_BD.po` and
`portolite-bn_BD.mo`.

Two things to check before generating:

- Every user-facing string is wrapped in `__()`, `_e()`, `esc_html__()` or
  `esc_attr__()` with the `portolite` text domain.
- Nothing non-textual is passed to a translation function. `esc_html__('#')` for
  a placeholder URL and `esc_html__('info@example.com')` for a default address
  are both wrong: they give translators nothing to translate and pollute the
  `.pot`.
