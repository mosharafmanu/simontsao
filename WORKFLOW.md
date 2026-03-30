# Workflow

## Goal

Future Codex sessions should work from documented project files, not memory.

Before making major changes, a session should review the project docs in the root and confirm the current architecture direction.

## Recommended Order Of Work

### 1. Theme setup

- establish core theme files
- confirm clean theme naming
- confirm asset paths and helper locations

### 2. Enqueue setup

- register the main stylesheet
- register main JS
- keep asset loading minimal and intentional

### 3. Header and footer

- build shared global structure first
- keep them clean and independent from page-builder logic

### 4. Flexible content rendering loop

- implement the main flexible content renderer
- map layout names directly to section template files
- confirm naming discipline early

### 5. Section templates

- build sections one by one from the cleaned static reference
- keep each section template direct and semantic
- only add reusable helper usage where it is clearly beneficial

### 6. Page settings

- refine `group_page_settings.json`
- use page-level settings only where they have a clear rendering purpose
- if any ACF JSON file is changed, update its `modified` timestamp so ACF Sync appears in admin

### 7. Site settings

- refine `group_site_settings.json`
- use site-wide settings for genuinely global content or controls
- if any ACF JSON file is changed, update its `modified` timestamp so ACF Sync appears in admin

### 8. Refinements

- improve naming
- remove old-project leftovers
- tighten helper usage
- simplify templates where possible

## Safe Working Method For Future Sessions

- read these root Markdown files first
- inspect the actual current codebase before changing anything
- do not assume previous sessions remembered project rules correctly
- treat ACF JSON, helper expectations, and section naming as source-of-truth architecture
- make incremental changes that preserve clarity
- whenever changing ACF JSON, update the `modified` timestamp before completing the task

## Important Reminder

This project should grow section by section in a controlled way.

The target is not fast conversion. The target is a clean custom theme that remains maintainable after many future edits.
