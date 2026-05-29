# WordPress FSE

## Purpose

- Reusable WordPress block theme / FSE implementation notes for this project
- Distilled from official WordPress Developer documentation
- Use this when working on `theme.json`, templates, template parts, block markup, responsive FSE behavior, and Site Editor issues

## Sources Read

- WordPress Developer: Global Settings & Styles (`theme.json`)
- WordPress Theme Handbook: Templates
- WordPress Theme Handbook: Template Hierarchy
- WordPress Theme Handbook: Template Parts
- WordPress Theme Handbook: Global Settings and Styles
- WordPress Theme Handbook: Typography settings
- WordPress Theme Handbook: Styles
- WordPress Theme Handbook: Block Stylesheets

## Block Theme Basics

- A block theme is identified by having an `index.html` template in `/templates` or legacy `/block-templates`
- FSE is enabled for block themes in modern WordPress; there is not a separate "FSE theme" type
- Block theme templates live in `/templates`
- `templates/index.html` is the only required template file
- Template files are block markup, not arbitrary HTML/PHP
- Templates can include:
  - block markup
  - template part references
  - pattern references

## Template Hierarchy

- WordPress resolves templates by hierarchy and uses the first match
- For block themes, WordPress can look in this order:
  - user-created templates stored in the database as `wp_template`
  - child theme `/templates`
  - active theme `/templates`
- This means Site Editor saved templates can override files in the theme folder
- If a file edit does not affect the front end, check for a saved Site Editor template override

## Front Page Rules

- `front-page.html` takes precedence for the site front page
- This is true whether Settings > Reading uses latest posts or a static page
- If the site uses a static page and no `front-page.html` exists, WordPress falls back through the page hierarchy
- In this project, `templates/front-page.html` is the correct first target for the homepage concept

## Template Parts

- Template parts live directly in `/parts`
- Do not nest template parts inside subfolders
- Template parts contain block markup only
- Registering template parts in `theme.json` is optional, but useful for naming and assigning areas
- Use `area: "header"` and `area: "footer"` where appropriate so WordPress treats parts correctly in the editor

## theme.json Strategy

- `theme.json` is the canonical place for global block theme settings and styles
- Use `theme.json` for:
  - color palette presets
  - typography presets
  - font family registration
  - fluid font sizes
  - spacing scale
  - layout `contentSize` and `wideSize`
  - element styles
  - block-level styles where supported
  - custom templates and template part metadata
- Presets become WordPress CSS custom properties such as `--wp--preset--color--slug`
- Prefer preset references in block markup and CSS when practical

## Styling Priority

- Prefer `theme.json` for standard WordPress styling because it integrates with Global Styles and avoids specificity fights
- Use CSS for art-directed or layout-specific behavior that `theme.json` cannot express cleanly
- Use per-block stylesheets when a block needs too much CSS for `theme.json`
- For this project, keep global palette, type, spacing, and block defaults moving toward `theme.json`
- Keep `style.css` focused on the custom front-page composition and exceptions

## Typography

- WordPress supports typography settings through `settings.typography` in `theme.json`
- Register font families there so blocks and editor styles can reference them
- Use `fontFace` in `theme.json` when bundling local web fonts
- This project has a `Google Fonts only` constraint
- Current practical approach:
  - enqueue Google Fonts in PHP
  - register matching font-family presets in `theme.json`
  - use those presets in theme styles and block markup where possible

## Responsive / Fluid Behavior

- Let block layout, Columns, Groups, and theme fluid typography do as much responsive work as possible
- Use `theme.json` fluid font sizes and spacing presets before custom media-query CSS
- Add custom CSS only where the art direction requires it or the live render breaks
- When testing, verify desktop first viewport, gallery section, CTA/footer, and mobile-width behavior

## Project-Specific Notes

- Active local URL: `http://localhost/client/`
- Current active theme: `Paradis Flooring Codex`
- Current front page template: `templates/front-page.html`
- This theme intentionally hides the default header/footer on `.home` and builds a custom front page
- `style.css` is currently loaded directly because the theme does not have a CSS build/minification step for new custom styles
- If a future build process is added, update `style.min.css` or change the enqueue strategy
- The front page is custom and should not use the normal header; inner pages use `parts/header.html` and `parts/footer.html`
- Site Editor saved templates can override theme files; check this if file edits do not show
- Saved page `post_content` must stay valid Gutenberg block markup.
- Do not inject freeform HTML such as raw `<div>`, `<details>`, or custom structural wrappers directly between core blocks unless it is wrapped in a `core/html` block.
- Prefer core blocks plus `className` for layout and styling; put the design work in `style.css`, block styles, or `theme.json`.
- If custom markup is unavoidable, isolate it in a Custom HTML block or a template part instead of mixing it into editable core block streams.

## Working Checklist

- Before FSE template work, read `WORDPRESS_FSE.md`, `TEMPLATE_CONTEXT.md`, and `BRAND_GUIDE.md`
- Check whether the desired page is driven by a theme template file or a saved Site Editor template
- Prefer `front-page.html` for the homepage concept
- Keep block template files valid block markup
- Move stable global design decisions into `theme.json`
- Verify rendered output in the browser after template/style changes
