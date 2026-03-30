# Image And Media Rules

## Image Field Standard

All ACF image fields in this project should return an **Image Array**.

Do not use:

- image ID return format
- raw URL return format

The image array provides enough data for consistent rendering and responsive output.

## Required Rendering Method

All project image output should go through:

- `responsive-picture.php`

This helper is the project standard for rendering images with proper `picture` / `img` behavior and `srcset`.

Section templates should not hand-roll inconsistent image markup when the helper is the intended solution.

## Image Size Policy

For this project:

- use only WordPress default image sizes
- do not introduce custom image sizes unless explicitly requested later

This is important because `responsive-picture.php` currently reflects a previous project and must be adjusted to this project's simpler image-size strategy.

## Consistency Expectations

Images should be handled consistently across the theme:

- same field return format
- same rendering helper
- same responsive logic
- same approach to alt text and accessibility

## Practical Rules

- prefer semantic image output
- use meaningful alt text where content requires it
- keep markup minimal
- avoid duplicate image rendering logic in section files
- do not invent custom image pipelines unless requested
