# Coding Rules

## Core Standard

All future code for this project must be clean, minimal, semantic, and production-ready.

The code should reflect a professional custom WordPress build, not a builder migration or a generic starter theme.

## Do Not

- reintroduce builder-like markup patterns
- add unnecessary wrappers
- create random utility class names
- overengineer the architecture
- introduce abstraction without a repeated need
- add project structures that were not requested
- treat the static HTML as messy builder output that still needs cleanup

## Always Do

- follow existing naming conventions
- keep PHP templates readable and direct
- prioritize semantic HTML
- align ACF layout names with PHP template filenames exactly
- keep section output focused and minimal
- favor long-term maintainability over short-term cleverness
- use reusable helpers where they provide real consistency

## Section Template Rules

- each section template should map to one ACF layout
- section templates should remain easy to read in isolation
- container logic should be deliberate, not copied blindly
- image rendering should use the approved helper approach
- button and icon rendering should stay consistent with shared helper expectations
- if the reference HTML uses non-semantic markup, correct it in the theme template while keeping the design visually intact
- preserve styling with existing classes or minimal supporting code instead of keeping incorrect heading or structural tags
- when a heading level changes for semantic reasons, preserve the original visual appearance with heading utility classes such as using `.h1` on an `h2` when needed

## Architecture Rules

- keep concerns separated clearly
- root templates decide page structure
- flexible renderer maps layouts to section files
- section files render section markup
- helpers support repeated rendering patterns only

## Output Standard

Future Codex sessions should produce:

- clean PHP
- semantic HTML
- minimal CSS/JS changes
- stable naming
- architecture that can scale section by section without becoming messy
