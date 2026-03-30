# Theme Architecture

## Core Approach

The WordPress theme should be built manually from the cleaned static reference.

The primary content architecture is based on ACF Flexible Content:

- ACF JSON defines layouts and field groups
- each flexible content layout maps to a matching PHP section template
- section template filenames must match the ACF layout name exactly

## Recommended Theme Structure

```text
/
  style.css
  functions.php
  header.php
  footer.php
  front-page.php
  page.php
  assets/
    css/
    js/
    fonts/
    images/
  inc/
    helper-functions/
      flexible-content.php
      responsive-picture.php
    icon-renderer.php
    button-renderer.php
  acf-json/
    group_flexible_content.json
    group_page_settings.json
    group_site_settings.json
  template-parts/
    sections/
      hero_section.php
      section_name.php
```

Use this as the working direction. Actual files can be introduced gradually as the theme is built.

## Section Rendering Model

Flexible content rendering should work like this:

1. A page uses a flexible content field.
2. ACF stores ordered layouts for that page.
3. The flexible content renderer loops through layouts.
4. Each layout resolves to a PHP file in `template-parts/sections/`.
5. The PHP template renders only that section.

Example mapping:

- layout name: `hero_section`
- template file: `template-parts/sections/hero_section.php`

This mapping must remain exact.

## Template Responsibilities

- `header.php` and `footer.php`: shared site chrome only
- `front-page.php`, `page.php`, and other root templates: decide what content path to render
- `template-parts/sections/*`: render section-level flexible content output
- helper files: provide repeatable rendering behavior without bloating templates

Section templates should not blindly preserve bad markup from the static reference.

If a section in the reference uses non-semantic HTML purely for visual styling, convert it to semantic HTML in the WordPress template and preserve the appearance with the existing classes or minimal supporting adjustments.

## Architecture Rules

- Do not rebuild builder-style nested structures.
- Do not hide simple markup behind unnecessary helper layers.
- Keep section templates direct and readable.
- Put reusable rendering logic in helpers only when there is a real repeated need.
- Keep naming aligned between ACF, PHP templates, and helper usage.
