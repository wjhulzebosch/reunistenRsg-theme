# WordPress Pages - Create/Remove List

## Pages to CREATE in WordPress Admin

### 1. **Mijn RRSG** 
- **Slug:** `mijn-rrsg`
- **Parent:** None (top-level)
- **Content:** Overview page for member area

### 2. **Bijdragen**
- **Slug:** `bijdragen`
- **Parent:** None (top-level)
- **Content:**
  - Info over bijdragen in natura
  - Info over pakketten en doneren
  - Link naar gegevens wijzigen & doneershop
  - Info over schenkingen en legaten & fondsen

### 3. **Alamanak**
- **Slug:** `alamanak`
- **Parent:** None (top-level)
- **Content:** Placeholder (marked "voor nu nvt" - not yet applicable)
- **Login Required:** Yes (*)

### 4. **Gegevens wijzigen**
- **Slug:** `gegevens-wijzigen`
- **Parent:** None (top-level)
- **Content:** Form or info for members to change their data
- **Login Required:** Yes (*)

### 5. **Melden Overlijden**
- **Slug:** `melden-overlijden`
- **Parent:** None (top-level)
- **Content:**
  ```
  Voor het melden van een overlijden:
  Email: abactis@hetrsg.nl
  Of telefonisch contact opnemen
  ```

### 6. **Over ons**
- **Slug:** `over-ons`
- **Parent:** None (top-level)
- **Content:**
  - Wij zijn RRSG
  - Doel van de stichting
  - Curatorium
  - Links naar: Fondsen, Nesthorcommissie, Andere commissies
  - Statuten
  - Jaarstukken

### 7. **Fondsen**
- **Slug:** `fondsen`
- **Parent:** None (top-level)
- **Content:** Information about the various funds

### 8. **Nesthorcommissie**
- **Slug:** `nesthorcommissie`
- **Parent:** None (top-level)
- **Content:** Information about the Nesthor Commission

### 9. **Andere commissies**
- **Slug:** `andere-commissies`
- **Parent:** None (top-level)
- **Content:** Information about other committees (e.g., Odin)

### 10. **Actueel**
- **Slug:** `actueel`
- **Parent:** None (top-level)
- **Content:** Overview/landing page for current news and events

### 11. **Nieuws**
- **Slug:** `nieuws`
- **Parent:** None (top-level)
- **Content:** 
  - Nieuwsberichten Curatorium
  - Nieuwsberichten Nesthorcommissie
  - Consider using a category archive instead
- **Login Required:** Yes (*)

### 12. **Kalender**
- **Slug:** `kalender`
- **Parent:** None (top-level)
- **Content:** Calendar with links to registration pages/webshop
- **Login Required:** Yes (*)

### 13. **Publicaties**
- **Slug:** `publicaties`
- **Parent:** None (top-level)
- **Content:**
  - Links naar Nesthorbladen
  - Links naar Edda
- **Login Required:** Yes (*)

### 14. **Verslagen**
- **Slug:** `verslagen`
- **Parent:** None (top-level)
- **Content:** Links to activity reports (or use category archive)
- **Login Required:** Yes (*)

### 15. **Bijzondere Projecten**
- **Slug:** `bijzondere-projecten`
- **Parent:** None (top-level)
- **Content:** Overview of special projects
- **Login Required:** Yes (*)

### 16. **Eeuwcadeau**
- **Slug:** `eeuwcadeau`
- **Parent:** None (top-level)
- **Content:** Information about the century gift project

---

## Pages to REMOVE/REDIRECT (from old structure)

### Pages that may already exist but need checking:

1. **Activiteiten** (`/activiteiten/`)
   - ❌ Remove or redirect to `/actueel/`

2. **Doneren** (`/doneren/`)
   - ❌ Remove or redirect to `/bijdragen/`

3. **Wijzigen** (`/wijzigen/`)
   - ❌ Remove or redirect to `/gegevens-wijzigen/`

4. **Almanak** (if exists as top-level)
   - ❌ Keep but may need content update

5. **Ledenlijst** (`/ledenlijst/`)
   - ❌ Remove (not in new structure) or move under Alamanak

6. **Senaten, Besturen en Commissies** (`/senaten-besturen-en-commissies/`)
   - ❌ Remove (not in new structure) or move under Alamanak

7. **Fondsen donaties** (`/fondsen-donaties/`)
   - ❌ Remove or merge into `/fondsen/`

8. **Lidmaatschap** (`/lidmaatschap/`)
   - ❌ Remove or merge into `/bijdragen/`

9. **Schenkingen en legaten** (`/schenkingen-en-legaten/`)
   - ❌ Remove or merge into `/bijdragen/`

10. **Beëindigen donateurschap** (`/beeindigen-donateurschap/`)
    - ❌ Remove (not in new structure)

11. **Uitschrijven als Reünist** (`/uitschrijven-als-reunist/`)
    - ❌ Remove (not in new structure)

12. **Businessclubcommissie** (`/businessclubcommissie/`)
    - ❌ Remove or move under `/andere-commissies/`

13. **Contact** (`/contact/`)
    - ❌ Remove (not in new structure) or add to footer

14. **Curatorium** (`/curatorium/`)
    - ❌ Remove (content should be on `/over-ons/` page)

15. **Doel van de Stichting** (`/doel-van-de-stichting/`)
    - ❌ Remove (content should be on `/over-ons/` page)

16. **Jaarstukken** (`/jaarstukken/`)
    - ❌ Remove (content should be on `/over-ons/` page)

17. **Nesthor Commissie** (`/nesthor-commissie/`)
    - ❌ Check slug - should be `/nesthorcommissie/` (no space)

18. **Statuten** (`/statuten/`)
    - ❌ Remove (content should be on `/over-ons/` page)

19. **Wat is R.R.S.G.** (`/wat-is-rrsg/`)
    - ❌ Remove (content should be on `/over-ons/` page)

20. **Onthulling Eeuwcadeau** (`/onthulling-eeuwcadeau/`)
    - ❌ Remove or redirect to `/eeuwcadeau/`

---

## WordPress Categories to CREATE

### 1. **Nieuws**
- **Slug:** `nieuws`
- **Description:** "Nieuwsberichten van Curatorium en Nesthorcommissie"

### 2. **Verslagen**
- **Slug:** `verslagen`
- **Description:** "Verslagen over activiteiten"

---

## WordPress Categories to REMOVE (if they exist)

1. **Aankondigingen** (`aankondigingen`)
   - ❌ Remove or merge into Nieuws

2. **Bijzondere projecten** (`bijzondere-projecten`)
   - ❌ Remove (using pages instead)

3. **Nieuwsbrieven** (`nieuwsbrieven`)
   - ❌ Remove or merge into Nieuws

4. **In memoriam** (`in-memoriam`)
   - ❌ Remove (not in new structure)

---

## Implementation Steps in WordPress Admin

### Step 1: Audit Existing Pages
1. Go to **Pages → All Pages**
2. Make a list of all existing pages
3. Compare with this document

### Step 2: Create New Pages
1. Go to **Pages → Add New**
2. Create each page from the "CREATE" list above
3. Use the exact slugs specified
4. Add placeholder content based on the content notes

### Step 3: Handle Old Pages
1. For pages to remove: either DELETE or set up 301 redirects
2. Option A: Install "Redirection" plugin for clean redirects
3. Option B: Delete pages (may break existing links)

### Step 4: Create Categories
1. Go to **Posts → Categories**
2. Create "Nieuws" and "Verslagen" categories
3. Delete old categories if not needed

### Step 5: Set Up Login Protection
After pages are created, login protection will be handled by theme code in functions.php.

---

## Quick Reference: New vs Old Structure

| New Page | Old Page(s) | Action |
|----------|-------------|---------|
| `/bijdragen/` | `/doneren/`, `/lidmaatschap/`, `/schenkingen-en-legaten/` | Merge content |
| `/gegevens-wijzigen/` | `/wijzigen/` | Rename |
| `/over-ons/` | `/wat-is-rrsg/`, `/doel-van-de-stichting/`, `/curatorium/`, `/statuten/`, `/jaarstukken/` | Merge content |
| `/fondsen/` | `/fondsen-donaties/` | Rename |
| `/nesthorcommissie/` | `/nesthor-commissie/` | Fix slug |
| `/andere-commissies/` | `/businessclubcommissie/` | Rename/expand |
| `/actueel/` | `/activiteiten/` | Rename |
| `/nieuws/` | Category archives | Use category |
| `/verslagen/` | Category archives | Use category |
| `/eeuwcadeau/` | `/onthulling-eeuwcadeau/` | Rename |

---

## Total Count

- **Pages to CREATE:** 16
- **Pages to REMOVE/REDIRECT:** ~20
- **Categories to CREATE:** 2
- **Categories to REMOVE:** ~4

---

## Notes

- All pages marked with * require login protection (handled automatically by theme)
- Consider setting up 301 redirects for removed pages to maintain SEO
- Home page already exists (uses front-page.php template)
- WooCommerce shop (`/winkel/`) already exists
