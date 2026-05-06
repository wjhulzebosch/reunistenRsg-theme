# Charlotte theme — Go Live checklist

Reconciled against the actual live site (sitemap + nav fetch on 2026-05-06).
Nearly all pages already exist; the real work is on **categories** and **content migration**.

## 1. Prep

- [ ] Backup live WordPress site (files + database)
- [ ] Upload Charlotte theme to `/wp-content/themes/charlotte/` (do NOT activate yet)

## 2. Pages

All pages already exist on the live site. Nothing to do here.

## 3. Categories — this is the actual work

Live site only has 5 categories: `uncategorized`, `niewsbrieven` (typo), `kalender`,
`publicaties`, `businessclub`. Charlotte's homepage code requires `agenda`, `nieuws`,
`verslagen` as categories — see `charlotte/functions.php:178, 237`.

- [ ] Rename category `kalender` → slug **`agenda`**
- [ ] Add custom fields `_event_date` (YYYY-MM-DD) and `_event_location` to existing
      kalender/agenda posts (theme reads these in `functions.php:184, 200, 222`)
- [ ] Fix typo: rename `niewsbrieven` → `nieuwsbrieven`
- [ ] Merge `publicaties` content into `nieuwsbrieven`, then delete `publicaties`
- [ ] Create new category `nieuws` (slug: `nieuws`)
- [ ] Create new category `verslagen` (slug: `verslagen`)
- [ ] Create new category `aankondigingen` (slug: `aankondigingen`)
- [ ] Create new category `bijzondere-projecten` (slug: `bijzondere-projecten`)
- [ ] Create new category `in-memoriam` (slug: `in-memoriam`)

## 4. Content migration

The current site uses *pages* for things Charlotte expects as *posts*. Convert and re-tag:

- [ ] Move Eeuwcadeau / Eeuwboek / Odin / Onthulling-eeuwcadeau page content into posts
      under category `bijzondere-projecten` (or keep as pages and link from the section
      overview — pick one approach)
- [ ] Re-categorize anything that's currently a "nieuws" item into category `nieuws`
- [ ] Re-categorize event reports into category `verslagen`
- [ ] Move newsletter content under `nieuwsbrieven`

## 5. Menus

Charlotte registers two locations in `functions.php:38-41`: `primary` (Hoofdmenu) and
`footer` (Footermenu).

- [ ] Build **Hoofdmenu** per `Plan.md`:
  - Direct: Webshop, Gegevens wijzigen, Het R.S.G.
  - Dropdowns: Activiteiten, Almanak, Doneren, Mijn RRSG, Over Ons
- [ ] Build **Footermenu** per `Plan.md`

## 6. Launch

- [ ] Set custom header image (Appearance → Customize → Header; default is `/assets/midgard.jpg`)
- [ ] Set `Home` page as static front page (Settings → Reading)
- [ ] Activate Charlotte on **staging** and smoke-test:
  - Homepage 3 columns: welkom / kalender / nieuws
  - Agenda widget shows upcoming events with date + location
  - Nieuws + Verslagen feed populates
  - Single post, page, archive, 404, WooCommerce all render
  - Mobile hamburger + dropdowns work
- [ ] Activate Charlotte on **production**
- [ ] Post-launch: nav links resolve, agenda dates/locations show, Webshop checkout works
