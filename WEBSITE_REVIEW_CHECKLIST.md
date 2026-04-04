# Website Review Checklist

This note captures the key rules to keep in mind while reviewing the completed website after building all ACF flexible content sections and updating section content from the WordPress admin panel.

## Primary Review Goals

1. Review the full website page by page.
2. Check whether any original styling is broken because we are reusing original classes.
3. Verify semantic HTML structure across all pages and sections.
4. Use `FLEXIBLE_CONTENT_SECTION_REFERENCE.md` to identify which flexible content template and original HTML section belong to each page section under review.

## Reference Source

- Before reviewing any section, check `FLEXIBLE_CONTENT_SECTION_REFERENCE.md`.
- Use it to confirm which flexible content PHP template is responsible for the section.
- Use it to confirm which original HTML template/page should be used for comparison.
- This reference should guide the review whenever a section name is mentioned, so the correct files are checked without guesswork.

## Styling Review Focus

- Compare each rendered section with the intended original design.
- Confirm reused original classes still produce the correct spacing, typography, alignment, and responsive behavior.
- Watch for broken layouts, missing styles, duplicated styles, or unexpected overrides.
- Check desktop, tablet, and mobile behavior where relevant.
- If a section looks different from the original version, inspect whether the issue comes from class reuse, markup changes, or missing wrapper structure.

## Semantic HTML Rules

- Each page must have only one `h1`.
- Section titles should use `h2` by default.
- If a lower heading level is required for structure, keep the semantic heading (`h3`, etc.) and add the `.h2` class if we need the same visual style as an `h2`.
- All heading utility classes such as `.h1`, `.h2`, `.h3`, `.h4`, `.h5`, and `.h6` should reproduce the original heading styling across the site.
- Do not choose heading tags only for styling.
- Maintain proper heading hierarchy without skipping levels unnecessarily.

## Section-by-Section Review Reminders

- Check the section wrapper and inner structure.
- Confirm heading level is correct.
- Confirm any heading utility class still matches the original visual heading style.
- Confirm text, buttons, links, and media still inherit the expected original styles.
- Confirm utility or legacy classes are not causing conflicts.
- Confirm the content entered from the admin panel does not break the design.

## QA Mindset

- Treat this review as both visual QA and markup QA.
- Preserve the original visual system where classes are intentionally reused.
- Prefer semantic markup first, then use utility classes like `.h2` to match design when needed.
