# ACF Strategy

## Flexible Content Role

ACF Flexible Content is the main page-building system for this theme.

Each page section should be represented by:

1. an ACF flexible content layout definition
2. a matching PHP section template file

## Naming Rules

Use stable, explicit, lowercase snake_case names.

Rules:

- layout names must be lowercase snake_case
- PHP section filenames must match layout names exactly
- field names should be descriptive and reusable
- avoid vague names like `content_block_1`, `box`, `item`, `stuff`

Examples:

- `hero_section`
- `intro_content`
- `expertise_grid`
- `research_highlight`

## Field Philosophy

Field groups should support clean rendering and reusable patterns.

Priorities:

- keep section fields practical and direct
- avoid over-nesting unless it improves clarity
- reuse field structures where repetition is expected
- do not create abstraction for one-off content

## Existing JSON Files

The following copied ACF JSON files already exist as starting references:

- `group_flexible_content.json`
- `group_page_settings.json`
- `group_site_settings.json`

They should be treated as reusable starting points, not as final schema.

Expected handling:

- review each group carefully
- rename or simplify old-project fields where needed
- remove project-specific leftovers that do not belong here
- refine groups incrementally instead of rebuilding everything blindly

## JSON Sync Requirement

When editing ACF JSON files for this project, always update the JSON `modified` timestamp as part of the change.

This is required so ACF can detect the file change and show the correct **Sync** option in the WordPress admin panel.

Practical rule:

- if you change any ACF JSON file, also bump its `modified` value before finishing the task
- do not leave JSON structure changes without a timestamp update

## Intended Group Roles

- `group_flexible_content.json`: main flexible page builder layouts
- `group_page_settings.json`: page-level controls such as template behavior or display settings
- `group_site_settings.json`: site-wide settings reused across templates and sections

## Reusable Field Patterns

Reusable field structures should stay consistent across sections where appropriate.

This especially applies to:

- buttons
- icons
- image fields
- repeatable content items

The goal is consistency without forcing a generic system too early.
