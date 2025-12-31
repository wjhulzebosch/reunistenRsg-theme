# Theme Pages Implementation Plan

Based on `PagesToCreate.md`, this plan outlines all WordPress content (pages, categories, posts) and theme modifications needed to implement the new site structure for the Reunisten RSG theme.

> Note: All pages are publicly accessible (no login required for now).

---

## HOW THE THEME NAVIGATION WORKS

The theme uses a **category-based navigation system** defined in `functions.php` → `reunisten_category_menu()`.

### Current Behavior:
```
Navigation Menu Structure:
├── Webshop (hardcoded link to /winkel/)
├── [Top-Level Category 1]
│   ├── [Subcategory A]
│   │   ├── [Post 1]
│   │   └── [Post 2]
│   └── [Subcategory B]
│       └── [Post 3]
├── [Top-Level Category 2]
│   └── ...
```

### How it automatically picks up content:
1. **Top-level categories** appear as main menu items
2. **Subcategories** appear as dropdown items under their parent
3. **Posts assigned to subcategories** appear as a third-level dropdown

### What this means for you:
- **No manual menu configuration needed** - the menu builds itself from categories
- Just create categories and assign posts to them → they appear in the menu
- The **Home page** needs `front-page.php` template (to be created)
- **Webshop** is hardcoded and links to WooCommerce shop

### Theme files that display content:
| URL Pattern | Template File | Description |
|-------------|---------------|-------------|
| `/` (homepage) | `front-page.php` (to create) | Static homepage |
| `/category/xyz/` | `category.php` | Category archive |
| `/post-name/` | `single.php` | Individual post |
| `/page-name/` | `page.php` | Static page |
| `/winkel/` | WooCommerce templates | Shop |

---

## QUICK REFERENCE: What to Create in WordPress Admin

### Step 1: Create These PAGES (WordPress → Pages → Add New)

| Page Title | Slug | Set as |
|------------|------|--------|
| Home | `home` | Front Page (Settings → Reading → "A static page" → Front page: Home) |
| Contact | `contact` | — |

> The **Winkel** page is auto-created by WooCommerce as Shop page.

### Step 2: Create These CATEGORIES (WordPress → Posts → Categories)

**Create in this order (parents first, then children):**

#### Top-Level Categories (Parent = None)
1. `Over ons`
2. `Nieuws`
3. `Activiteiten`
4. `Almanak`
5. `Doneren`
6. `Mijn RRSG`

#### Subcategories (set Parent to the category shown)

**Parent: Over ons**
- Wat is R.R.S.G.?
- Doel van de stichting
- Curatorium
- Fondsen
- Nesthorcommissie
- Businessclubcommissie
- Statuten
- Jaarstukken

**Parent: Nieuws**
- Nieuwsbrieven
- Nesthorblad
- Edda

**Parent: Activiteiten**
- Kalender
- Aankondigingen
- Verslagen
- Bijzondere projecten

**Parent: Almanak**
- Ledenlijsten
- Lijsten Senaat, Bestuur en Cies
- In memoriam

**Parent: Doneren**
- Lidmaatschap
- Fondsen donaties
- Schenkingen en legaten

**Parent: Mijn RRSG**
- Word donateur
- Wijzigen contactgegevens
- Wijzigen pakket- en betaalgegevens
- Melden overlijden
- Beëindigen donateurschap
- Uitschrijven als reünist

### Step 3: Create These POSTS (WordPress → Posts → Add New)

For each post, **assign it to the category shown** (this makes it appear in the navigation menu).

| Post Title | Assign to Category | Content |
|------------|-------------------|---------|
| Wat is R.R.S.G.? | Wat is R.R.S.G.? | Description of the foundation |
| Doel van de stichting | Doel van de stichting | Purpose and goals |
| Curatorium | Curatorium | Board members info |
| Fondsen | Fondsen | All fund info (incl. fondscommissies) |
| Nesthorcommissie | Nesthorcommissie | Committee info |
| Businessclubcommissie | Businessclubcommissie | Committee info |
| Statuten | Statuten | Link/embed statute documents |
| Jaarstukken | Jaarstukken | Links to annual reports |
| Activiteitenkalender | Kalender | Calendar (manually updated) |
| Odin | Bijzondere projecten | Project info |
| Eeuwcadeau | Bijzondere projecten | Project info |
| Lustrum | Bijzondere projecten | Project info |
| Ledenlijst | Ledenlijsten | Member list |
| Senaat, Bestuur en Commissies | Lijsten Senaat, Bestuur en Cies | List of boards |
| In memoriam | In memoriam | Memorial page |
| Lidmaatschap | Lidmaatschap | Membership info |
| Fondsen doneren | Fondsen donaties | Donation info |
| Schenkingen en legaten | Schenkingen en legaten | Donation info |
| Word donateur | Word donateur | How to become a donor |
| Wijzigen contactgegevens | Wijzigen contactgegevens | Form/instructions |
| Wijzigen pakket- en betaalgegevens | Wijzigen pakket- en betaalgegevens | Form/instructions |
| Melden overlijden | Melden overlijden | Form/instructions |
| Beëindigen donateurschap | Beëindigen donateurschap | Form/instructions |
| Uitschrijven als reünist | Uitschrijven als reünist | Form/instructions |

> **How it works:** The theme's navigation automatically shows Categories → Subcategories → Posts. So when you create a post in a subcategory, it will appear in the menu under that subcategory.

---

## DETAILED REFERENCE

### Part 1: WordPress Categories (Full Details)

The theme uses categories for navigation. Create these top-level categories and their subcategories:

### 1.1 Top-Level Categories

| # | Category Name | Slug | Description |
|---|---------------|------|-------------|
| 1 | Over ons | `over-ons` | Information about the foundation |
| 2 | Nieuws | `nieuws` | News and newsletters |
| 3 | Activiteiten | `activiteiten` | Calendar, announcements, reports |
| 4 | Almanak | `almanak` | Member lists, senate/board lists |
| 5 | Doneren | `doneren` | Membership, funds, donations |
| 6 | Mijn RRSG | `mijn-rrsg` | Member account management |

### 1.2 Subcategories

#### Under "Over ons"
| # | Subcategory | Slug | Parent |
|---|-------------|------|--------|
| 1 | Wat is R.R.S.G.? | `wat-is-rrsg` | Over ons |
| 2 | Doel van de stichting | `doel-van-de-stichting` | Over ons |
| 3 | Curatorium | `curatorium` | Over ons |
| 4 | Fondsen | `fondsen` | Over ons |
| 5 | Nesthorcommissie | `nesthorcommissie` | Over ons |
| 6 | Businessclubcommissie | `businessclubcommissie` | Over ons |
| 7 | Statuten | `statuten` | Over ons |
| 8 | Jaarstukken | `jaarstukken` | Over ons |

#### Under "Nieuws"
| # | Subcategory | Slug | Parent |
|---|-------------|------|--------|
| 1 | Nieuwsbrieven Curatorium | `nieuwsbrieven-curatorium` | Nieuws |
| 2 | Nieuwsbrieven Nesthorcommissie | `nieuwsbrieven-nesthorcommissie` | Nieuws |
| 3 | Nesthorblad | `nesthorblad` | Nieuws |
| 4 | Edda | `edda` | Nieuws |

#### Under "Activiteiten"
| # | Subcategory | Slug | Parent |
|---|-------------|------|--------|
| 1 | Kalender | `kalender` | Activiteiten |
| 2 | Aankondigingen | `aankondigingen` | Activiteiten |
| 3 | Verslagen | `verslagen` | Activiteiten |
| 4 | Bijzondere projecten | `bijzondere-projecten` | Activiteiten |

#### Under "Almanak"
| # | Subcategory | Slug | Parent |
|---|-------------|------|--------|
| 1 | Ledenlijsten | `ledenlijsten` | Almanak |
| 2 | Lijsten Senaat, Bestuur en Cies | `lijsten-senaat-bestuur` | Almanak |
| 3 | In memoriam | `in-memoriam` | Almanak |

#### Under "Doneren"
| # | Subcategory | Slug | Parent |
|---|-------------|------|--------|
| 1 | Lidmaatschap | `lidmaatschap` | Doneren |
| 2 | Fondsen donaties | `fondsen-donaties` | Doneren |
| 3 | Schenkingen en legaten | `schenkingen-legaten` | Doneren |

#### Under "Mijn RRSG"
| # | Subcategory | Slug | Parent |
|---|-------------|------|--------|
| 1 | Word donateur | `word-donateur` | Mijn RRSG |
| 2 | Wijzigen contactgegevens | `wijzigen-contactgegevens` | Mijn RRSG |
| 3 | Wijzigen pakket- en betaalgegevens | `wijzigen-pakket-betaalgegevens` | Mijn RRSG |
| 4 | Melden overlijden | `melden-overlijden` | Mijn RRSG |
| 5 | Beëindigen donateurschap | `beeindigen-donateurschap` | Mijn RRSG |
| 6 | Uitschrijven als reünist | `uitschrijven-reunist` | Mijn RRSG |

---

## Part 2: Theme Modifications Required

### 2.1 Homepage Template
- [ ] Create `front-page.php` template for the homepage
- [ ] Add sections for:
  - Basic foundation info in **staccato style** (short bullet-point style with links):
    - Word lid / Word donateur link
    - Secretariaat info/link
    - Inloggen link (future)
  - Actualiteiten/Nieuws preview section with links to latest posts
  - Quick links to important sections

### 2.2 Header Template (`header.php`)
- [ ] Add top banner section with:
  - Stichting logo (prominent placement)
  - Link to R.S.G. website (external)
  - Link to Contact page
  - Link to Webshop / Winkel
  - Link to Gegevens wijzigen (WooCommerce My Account or custom page)
- [ ] Style banner to be visually distinct from main navigation

### 2.3 Navigation Updates
- [ ] Review `reunisten_category_menu()` in `functions.php` to ensure proper hierarchy display
- [ ] Verify subcategory nesting works correctly with 3 levels (category → subcategory → posts)
- [ ] Consider adding CSS for 3rd level dropdowns if needed

### 2.4 Archive/Category Pages
- [ ] Review `category.php` for proper display of subcategories and posts
- [ ] Possibly create a custom archive template for specific categories

### 2.5 Footer Template (`footer.php`)
- [ ] Add footer section with:
  - Disclaimer text
  - Social media icons/links:
    - Facebook
    - X (Twitter)
    - Instagram
    - (Others as needed)
- [ ] Ensure footer is consistent across all pages

### 2.6 WooCommerce Layout
- [ ] Review and style `woocommerce/archive-product.php` for shop page
- [ ] Review and style `woocommerce/single-product.php` for product pages
- [ ] Review and style `woocommerce/cart/cart.php` for cart page
- [ ] Ensure consistent styling with rest of theme

---

## Part 3: Additional Requirements

### 3.1 Plugins to Consider
| Plugin | Purpose |
|--------|--------|
| PDF Embedder | For displaying statutes and annual reports |
| WooCommerce | Already integrated for Winkel |

### 3.2 Media/Documents to Prepare
- [ ] Statutes PDF document(s)
- [ ] Jaarstukken (Annual reports) PDFs
- [ ] Nieuwsbrieven archive documents
- [ ] Nesthorblad issues
- [ ] Edda issues
- [ ] Member photos (if applicable)

---

## Part 4: Implementation Checklist

### Phase 1: WordPress Content Setup
- [ ] Create all top-level categories (6 total)
- [ ] Create all subcategories (26 total)
- [ ] Create Home page and set as front page
- [ ] Create Contact page
- [ ] Verify Winkel/Shop page exists

### Phase 2: Theme Development
- [ ] Update `header.php` with top banner (logo + R.S.G. link + Contact link)
- [ ] Create `front-page.php` homepage template
- [ ] Update `footer.php` with disclaimer and social media icons
- [ ] Update navigation CSS for 3-level menu if needed
- [ ] Test category hierarchy display
- [ ] Add any special page templates needed

### Phase 3: Content Population
- [ ] Create initial posts for each subcategory
- [ ] Upload documents (statuten, jaarstukken, etc.)
- [ ] Add content to all static pages

### Phase 4: Testing
- [ ] Test navigation on all screen sizes
- [ ] Verify all links work correctly
- [ ] Test WooCommerce integration

---

*Plan created: December 30, 2025*
