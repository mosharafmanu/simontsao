# Helper Functions

## Purpose

Helpers in this project should solve repeated rendering problems cleanly.

They are not meant to become a heavy abstraction layer.

Use helpers when they improve consistency and reduce duplication. Do not hide simple one-off markup behind helper functions without a clear benefit.

## Required Helpers

### 1. `responsive-picture.php`

Use for all ACF-driven image output.

Expectations:

- accepts ACF image array data
- outputs consistent responsive image markup
- uses WordPress default image sizes only for this project unless requirements change later
- becomes the standard image rendering path across sections

### 2. `inc/icon-renderer.php`

Use for icons when sections need shared icon rendering behavior.

Expectations:

- keep icon output consistent
- avoid duplicate icon markup patterns across sections
- support the project's chosen icon field structure cleanly

### 3. `button-renderer.php`

Use for section buttons and CTA rendering.

Expectations:

- button field structure should stay consistent across sections
- helper output should remain simple and predictable
- templates should not invent different button data structures without reason

## Consistency Rules

When helpers are used:

- field structures must align with helper expectations
- helper usage should stay consistent across all sections
- output should remain minimal and production-ready

## What Helpers Should Not Become

Do not turn helpers into:

- pseudo page builders
- generic config engines
- wrapper generators for trivial markup
- unclear abstraction layers that make section templates harder to read
