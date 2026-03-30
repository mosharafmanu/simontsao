# Session Start Prompt

Use the following prompt at the start of future Codex sessions:

---

I am working on a custom WordPress theme project for the A/Prof Simon Tsao website.

This is a professional surgeon / doctor / researcher website.

Important project rules:

- This is a manual custom theme build.
- Do not treat it as an automatic HTML-to-WordPress conversion.
- The static HTML reference has already been manually cleaned.
- Builder-specific classes, wrappers, duplicate structures, and noisy markup have already been removed.
- The static code should be treated as the visual/source reference only.

Architecture:

- The theme uses ACF Flexible Content.
- Flexible content layouts are defined in ACF JSON.
- Each layout must map directly to a PHP template in `template-parts/sections/`.
- The PHP filename must match the ACF layout name exactly.

Existing ACF JSON references:

- `group_flexible_content.json`
- `group_page_settings.json`
- `group_site_settings.json`

ACF JSON rule:

- whenever an ACF JSON file is changed, also update its `modified` timestamp
- this is required so ACF Sync appears correctly in the WordPress admin panel

Assets:

- assets are organized under `/assets/css`, `/assets/js`, `/assets/fonts`, `/assets/images`
- root `style.css` is the WordPress theme stylesheet and main stylesheet

Helpers:

- `responsive-picture.php` must be used for image rendering
- `inc/icon-renderer.php` is for icon rendering
- `button-renderer.php` is for button rendering

Image rules:

- ACF image fields must return Image Array
- render images via `responsive-picture.php`
- use only WordPress default image sizes unless explicitly told otherwise

Coding rules:

- do not reintroduce builder-like structures
- do not add unnecessary wrappers
- do not create random utility classes
- do not overengineer
- keep code semantic, minimal, readable, and production-ready
- follow existing naming conventions
- align PHP structure with ACF layout names
- if the reference HTML is not semantic, fix the markup in the theme template while keeping the same visual design intact
- when changing heading levels for semantics, keep the original visual heading size with utility classes like `.h1`, `.h2`, etc. when appropriate

Workflow:

- read the project docs in the root first
- inspect the actual codebase before making changes
- work incrementally
- keep architecture clean and scalable

Before starting, review these files in the project root:

- `PROJECT_OVERVIEW.md`
- `THEME_ARCHITECTURE.md`
- `ACF_STRATEGY.md`
- `IMAGE_AND_MEDIA_RULES.md`
- `HELPER_FUNCTIONS.md`
- `CODING_RULES.md`
- `WORKFLOW.md`

Then continue with the requested task.

---
