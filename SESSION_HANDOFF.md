# Session Handoff

## Current Status

Session paused at the end of the day on `2026-03-30 01:29 +06`.

Resume tomorrow morning from:
- syncing the latest ACF JSON changes in wp-admin
- using the updated section reference to continue WordPress page population
- prioritizing the next page build instead of more section-planning unless a new layout gap appears

The flexible content system has been expanded for the Home, About, Breast Conditions, Top Surgery, Research, Cancer Journey, Breast Cancer, Breast Surgery Recovery, and Oncoplastic Breast Surgery pages. Appointment Information and Contact mapping are also documented.

The client-facing reference guide is here:
- [FLEXIBLE_CONTENT_SECTION_REFERENCE.md](/Applications/AMPPS/www/ClientProjects/WordPress/2026/simontsao/wp-content/themes/simontsao/FLEXIBLE_CONTENT_SECTION_REFERENCE.md)

Top Surgery mapping has been documented section by section using the screenshots in:
- `docs/top-surgery/`

Research page mapping was reviewed against:
- `simontsao-html/research/index.html`

Research page content is now populated in WordPress.

The client-facing guide has been updated with the saved Research screenshots in:
- `docs/research/`

Research hero screenshot is still not saved yet, so that section remains noted without an image reference.

The client-facing guide has also been updated with the currently available screenshots in:
- `docs/cancer-journey/`
- `docs/breast-cancer/`
- `docs/breast-surgery-recovery/`
- `docs/oncoplastic-breast-surgery/`

Hero screenshots still missing in the guide:
- Cancer Journey hero
- Breast Cancer hero
- Breast Surgery Recovery hero
- Oncoplastic Breast Surgery hero

Appointment Information page mapping has now started against:
- `simontsao-html/patient-information/index.html`

Contact page mapping has now started against:
- `simontsao-html/contact-us/index.html`

## Reusable Sections Built So Far

- `Hero Section`
- `Inner Hero`
- `Overview Section (Left Image + Right Content)`
- `Media + Content Section`
- `Full Width Content Section`
- `Centered Intro Section`
- `Callout + List Section`
- `Illustration + Text Split Section`
- `Reactive Card + Content Section`
- `Quote + Content Section`
- `Heading + Intro + Card Grid`
- `Heading + Intro + List + CTA`
- `Heading + List Section`
- `Request Appointment`
- `Additional Information Links`
- `About Specialist Intro`
- `About Affiliations`
- `Cancer Journey Timeline Section`
- `Recovery Guide Section`
  - uses:
    - `Section Heading`
    - `Highlight Text`
    - `Body Content`
    - `Guide Groups`
  - each guide group supports:
    - `Group Heading`
    - `Group Items`
  - each guide item supports:
    - `Lead Text`
    - `Supporting Text`
- `Full Width Image + Highlighted List Section`
  - uses:
    - `Section Heading`
    - `Top Image`
    - `Body Content`
    - `List Intro`
    - `List Items`
    - `Bottom Highlight Note`
  - each list item supports:
    - `Lead Text`
    - `Supporting Text`

## Top Surgery Notes

Important final correction already made in the guide:
- `Patient Underlying Health and Consent` uses `Centered Intro Section`

Top Surgery-specific notes:
- `Illustration + Text Split Section` now has `Style Variant`
  - `Standard` (default)
  - `Centered Intro`
- For `Centered Intro` variant:
  - `Intro Text` is used as plain `h5`
  - `Highlight Text` stays reserved for the standard callout style

## Research Page Notes

Research page has now been built with the existing reusable sections, using the updated variants/fields added in this session.

Planned section mapping:
- Hero: `Inner Hero`
- Research Overview: `Illustration + Text Split Section`
- Understanding Cancer Detection: `Reactive Card + Content Section`
- Refining the Science: `Illustration + Text Split Section`
- Research Partners and Collaboration: `Quote + Content Section`
- Research Publications: `Full Width Content Section`

Important Research-specific reusable section updates made this session:

- `Illustration + Text Split Section`
  - now has `Heading Alignment`
  - `Style Variant` label is now:
    - `Standard`
    - `Centered Intro`
  - now has `List Style Variant`
    - `Default`
    - `Highlighted Lead Text`
  - `List Items` are now easier for clients to fill:
    - `Default` uses `Bullet Text`
    - `Highlighted Lead Text` uses separate `Lead Text` and `Supporting Text` fields

- `Quote + Content Section`
  - now has `Quote Position`
    - `Left`
    - `Right`
  - now has `Bottom Content Style`
    - `Highlighted Note`
    - `Body Content Block`
  - `Bottom Note` label has been renamed in ACF to `Bottom Content`

- `Full Width Content Section`
  - now has `Callout Type`
    - `Simple Intro Text` (default)
    - `Rich Callout With Links`
  - for `Simple Intro Text`
    - use `Simple Intro Text`
    - `Simple Intro Style` can render it as:
      - `Highlighted Text`
      - `Intro Text`
  - for `Rich Callout With Links`
    - use `Linked / Rich Callout`
    - this is for bordered callouts that need links, emphasis, or multiple paragraphs
  - it now also has:
    - `Secondary Content`
    - `Bottom Note`
    - `CTA Content`

Research page field usage decisions:

- Research Overview
  - use `Illustration + Text Split Section`
  - `Heading Alignment`: `Center`
  - `List Style Variant`: `Highlighted Lead Text`
  - `Body Content` = intro paragraphs
  - `List Items` = clinical benefits list
  - `Supporting Links Content` = thesis/publication sentence below the list

- Refining the Science
  - use `Illustration + Text Split Section`
  - `Style Variant`: `Centered Intro`
  - `Intro Text` = extracellular vesicle definition line
  - `Body Content` = explanatory paragraphs

- Research Partners and Collaboration
  - use `Quote + Content Section`
  - `Quote Position`: `Right`
  - `Body Content` = collaboration paragraphs
  - `Bottom Content Style`: `Body Content Block`
  - `Bottom Content` = grants intro + grant list

- Research Publications
  - use `Full Width Content Section`
  - `Highlighted / Intro Text` = short intro sentence under heading
  - `Intro Text Style`: `Intro Text`
  - `Secondary Content` = publication list
  - `Bottom Note` = ORCiD / Scopus line
  - `CTA Content` = collaboration/contact line

Reusable section update added after Research:

- `Illustration + Text Split Section`
  - now has `Bottom Divider`
    - `Shown`
    - `Hidden`
  - use this when stacked sections need the thin separator line between them, such as Patient Information

## ACF Sync

The latest JSON file is:
- `acf-json/group_flexible_content.json`

Latest `modified` timestamp in that JSON:
- `1774811605`

If ACF Sync does not appear immediately after reopening:
1. Refresh the Field Groups page.
2. If needed, compare DB vs JSON `modified` values again.

## Appointment Information Page Notes

Planned section mapping:
- Hero: `Inner Hero`
- Making an Appointment: `Illustration + Text Split Section`
- Day of Your Appointment: `Illustration + Text Split Section`
- During Your Appointment: `Illustration + Text Split Section`
- Medical Investigations: `Illustration + Text Split Section`
- Second Appointment: `Illustration + Text Split Section`
- Links to Additional Information: `Additional Information Links`

Field usage decisions started:

- Making an Appointment
  - use `List Style Variant`: `Highlighted Lead Text`
  - use the phone line as the first highlighted list item
  - no body copy needed unless implementation requires it

- Day of Your Appointment
  - use `Highlight Text` for the short checklist intro line
  - use `List Style Variant`: `Highlighted Lead Text`
  - keep the wait-time paragraph in `Body Content`

- During Your Appointment
  - use `List Style Variant`: `Highlighted Lead Text`
  - keep the support person phrase highlighted within the list item formatting

- Medical Investigations
  - use body copy only, with no list

## Contact Page Notes

Planned section mapping:
- Hero: `Inner Hero`
- Clinic Bookings: `Full Width Content Section`
- Contacting the Clinic: `Callout + List Section`
- Our Team Intro: `Full Width Content Section`
- Emma Chittick Profile: `About Specialist Intro`
- Booking Form: `Request Appointment`

Field usage decisions started:

- Clinic Bookings
  - use `Main Heading` = `Clinic Bookings`
  - leave `Section Heading` empty
  - keep it as the standalone top heading block above the callout section

- Contacting the Clinic
  - use `Section Heading` = `Contacting the Clinic`
  - use `Highlight Text` for the confidentiality line
  - use `List Items` for the booking bullet list
  - leave `Body Content` empty unless extra copy is needed

- Our Team Intro
  - use `Section Heading` = `Our Team`
  - use `Highlighted / Intro Text` with `Intro Text Style: Intro Text`
  - keep it as a short standalone intro above Emma's profile

- Emma Chittick Profile
  - use `About Specialist Intro`
  - `Main Heading` = `Emma Chittick`
  - `Subheading` = `(she/her)`
  - `Highlight Text` = first summary sentence
  - `Specialist Content` = biography paragraphs

- Booking Form
  - use `Request Appointment`
  - place the Google Form iframe embed in `Form Embed Code`
  - leave `Button Text` empty so the form is visible by default
  - do not recreate the footer contact panel as a page-builder section because the global footer already handles it

## Cancer Journey Page Notes

Planned section mapping:
- Hero: `Inner Hero`
- Understanding Your Journey Timeline: `Cancer Journey Timeline Section`

Reusable section added:

- `Cancer Journey Timeline Section`
  - includes:
    - `Intro Heading`
    - `Intro Content`
    - `Timeline Items`
  - timeline item fields:
    - `Stage Title`
    - `Stage Image`
    - `Body Content`
    - `Optional Reading Heading`
    - `Optional Reading Content`

Implementation notes:

- the soft intro and alternating journey stages are handled by one reusable section
- stage alignment alternates automatically in the template based on item order
- optional reading content can be added only to the stages that need it, such as Diagnosis

## Breast Cancer Page Notes

Planned section mapping:
- Hero: `Inner Hero`
- Understanding Breast Cancer: `Full Width Content Section`
- Types, Staging and Journey: `Illustration + Text Split Section`
- Non-Cancerous and Pre-Cancerous Breast Conditions: `Illustration + Text Split Section`
- Breast Cancer References: `Heading + List Section`
- Links to Additional Information: `Additional Information Links`

Field usage decisions started:

- Understanding Breast Cancer
  - use `Main Heading` for the long page-level heading
  - use `Section Heading` = `Breast Cancer in Australia: Prevalence and Progress`
  - use `Highlighted / Intro Text` for the diagnosis/survival callout
  - use `Body Content` for the opening paragraphs
  - use `Secondary Content` for the survival-rate table plus the paragraphs that follow

- Types, Staging and Journey
  - use `Illustration + Text Split Section`
  - keep the three subtopics inside `Body Content` using WYSIWYG subheadings
  - keep the final Cancer Journey link line at the bottom of the same content block

- Non-Cancerous and Pre-Cancerous Breast Conditions
  - use a standard `Illustration + Text Split Section` section with body content only

- Breast Cancer References
  - use `Heading + List Section`
  - add each reference as a list item with its source link

## Breast Surgery Recovery Page Notes

Planned section mapping:
- Hero: `Inner Hero`
- Breast Surgery Wound Care and Recovery Intro: `Full Width Content Section`
- Breast Surgery Recovery Timeline: `Recovery Guide Section`
- Pain Management: `Illustration + Text Split Section`
- Wound Care: `Illustration + Text Split Section`
- Links to Additional Information: `Additional Information Links`

Field usage decisions started:

- Breast Surgery Wound Care and Recovery Intro
  - use `Section Heading` = `Breast Surgery Wound Care and Recovery`
  - set `Callout Type` = `Rich Callout With Links`
  - use `Linked / Rich Callout` for the linked multi-paragraph bordered callout
  - use `Body Content` for the disclaimer paragraph

- Breast Surgery Recovery Timeline
  - use `Recovery Guide Section`
  - `Section Heading` = `Breast Surgery Recovery Timeline`
  - use `Highlight Text` for the short overview callout
  - use `Body Content` for the recovery paragraphs
  - use structured `Guide Groups` for the grouped recovery guidance list

- Pain Management
  - use `Illustration + Text Split Section`
  - `Image Position` = `Right`
  - `Heading Alignment` = `Center`
  - use `Highlight Text` for the pain-management callout sentence
  - use `Body Content` for the `Pain management Tips` lead-in
  - use `List Items` for the bullet list
  - use `Bottom Divider` = `Shown`

- Wound Care
  - use `Illustration + Text Split Section`
  - `Image Position` = `Left`
  - `Heading Alignment` = `Center`
  - use `Highlight Text` for the wound-healing callout
  - use `Body Content` for the intro sentence and wound-care bullet list

## Oncoplastic Breast Surgery Page Notes

Planned section mapping:
- Hero: `Inner Hero`
- What is Oncoplastic Breast Surgery?: `Full Width Content Section`
- Traditional Breast Surgery: `Illustration + Text Split Section`
- Oncoplastic Technique: `Illustration + Text Split Section`
- What is the difference between normal breast surgery and oncoplastic breast surgery?: `Full Width Image + Highlighted List Section`
- Immediate breast reconstruction techniques when a mastectomy is necessary.: `Illustration + Text Split Section`
- Links to Additional Information: `Additional Information Links`

Field usage decisions started:

- What is Oncoplastic Breast Surgery?
  - use `Section Heading` only
  - keep the paragraph in `Body Content`
  - leave callout fields empty

- Traditional Breast Surgery
  - use `Illustration + Text Split Section`
  - `Image Position` = `Left`
  - keep this as a simple heading + body + illustration section

- Oncoplastic Technique
  - use `Illustration + Text Split Section`
  - `Image Position` = `Right`
  - keep all explanatory paragraphs in `Body Content`

- What is the difference between normal breast surgery and oncoplastic breast surgery?
  - use `Full Width Image + Highlighted List Section`
  - use `Top Image` for the full-width comparison image
  - use `Body Content` for the opening comparison paragraphs below the image
  - use `List Intro` for the `Broadly speaking...` line
  - use structured `List Items` for the four-level highlighted list
  - use `Bottom Highlight Note` for the final pink highlighted paragraph

- Immediate breast reconstruction techniques when a mastectomy is necessary.
  - use `Illustration + Text Split Section`
  - `Image Position` = `Left`
  - keep this as a simple heading + body + illustration section

## Next Session Plan

Next practical step:
- Resume tomorrow morning by syncing ACF JSON in wp-admin and then continue building the next page in WordPress using the documented mappings

Expected approach:
1. Sync `acf-json/group_flexible_content.json` in wp-admin.
2. Open the next page to populate in WordPress.
3. Follow [FLEXIBLE_CONTENT_SECTION_REFERENCE.md](/Applications/AMPPS/www/ClientProjects/WordPress/2026/simontsao/wp-content/themes/simontsao/FLEXIBLE_CONTENT_SECTION_REFERENCE.md) section by section.
4. Use the latest reusable sections where needed:
   - `Illustration + Text Split Section`
   - `Recovery Guide Section`
   - `Full Width Image + Highlighted List Section`
5. Compare the populated page against the matching static HTML only after content entry is complete.

## Files Most Likely To Be Touched Next

- `FLEXIBLE_CONTENT_SECTION_REFERENCE.md`
- `SESSION_HANDOFF.md`
- `acf-json/group_flexible_content.json`
- `template-parts/sections/`
- possibly page content in WordPress admin for the next page being populated
