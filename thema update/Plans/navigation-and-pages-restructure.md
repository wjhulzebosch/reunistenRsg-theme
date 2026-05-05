# Navigation and Pages Restructure Plan

## Project Overview
Restructure the Reunisten RSG Theme navigation menu and create/verify all required pages according to the structure defined in overview.md.

**Date:** January 10, 2026  
**Theme:** reunisten-simple-theme_beta  
**WordPress Theme Type:** Custom Simple Theme

---

## Current State Analysis

### Existing Navigation Structure (functions.php)
The current `reunisten_main_menu()` function has:
- Webshop (direct link)
- Gegevens wijzigen (direct link)
- Het R.S.G. (external link)
- Activiteiten (dropdown with 6 items)
- Almanak (dropdown with 3 items)
- Doneren (dropdown with 3 items)
- Mijn RRSG (dropdown with 4 items)
- Over Ons (dropdown with 9 items)

### Required Navigation Structure (from overview.md)
Per user specification: **- = main menu item**, **-- = submenu item**

1. **Home** (no submenu)
2. **Mijn RRSG** (dropdown)
   - Bijdragen
   - Alamanak *
   - Gegevens wijzigen *
   - Melden Overlijden
3. **Over ons** (dropdown)
   - Fondsen
   - Nesthorcommissie
   - Andere commissies (bijv. Odin)
4. **Actueel** (dropdown)
   - Nieuws *
   - Kalender *
   - Publicaties *
   - Verslagen *
   - Bijzondere Projecten * (with nested submenu)
     - Bijv. eeuwcadeau
5. **Webshop** * (no submenu)

**\* indicates pages requiring login/authentication**

### Gap Analysis

**Missing from Current Implementation:**
- "Home" as explicit menu item
- "Actueel" main menu item (currently scattered across "Activiteiten")
- Nested submenu under "Bijzondere Projecten"
- Simplified "Over ons" (currently has 9 items, should have 3)
- "Bijdragen" under "Mijn RRSG" (currently under separate "Doneren")

**Needs to be Removed/Reorganized:**
- "Activiteiten" menu item (content moves to "Actueel")
- "Doneren" menu item (content moves to "Mijn RRSG")
- "Almanak" as top-level (becomes submenu under "Mijn RRSG")
- External "Het R.S.G." link (remove or relocate)
- Many "Over ons" submenu items need consolidation

---

## Required Pages (from Content Section)

### Pages that MUST exist:

1. **Homepagina** (front-page.php) ✓ EXISTS
   - Content: Basisinfo over de stichting, links naar andere pagina's
   - Content: Belangrijkste nieuws met 'lees meer'-links

2. **Bijdragen**
   - Content: Info over bijdragen in natura, pakketten en doneren, link naar wijzigen & de doneershop, schenkingen en legaten & fondsen

3. **Alamanak** * (marked "voor nu nvt" - not yet applicable)
   - Implementation: Create placeholder or skip

4. **Gegevens wijzigen** *
   - Already exists in current menu

5. **Melden Overlijden**
   - Content: Info: bericht abactis@hetrsg.nl of bel

6. **Over ons**
   - Content: Wij zijn RRSG, etc.
   - Content: Doel vd stichting
   - Content: Curatorium
   - Content: Fondsen (links naar ->fondsen)
   - Content: NesthorCommissie ->NC
   - Content: Andere cies met link
   - Content: Statuten
   - Content: Jaarstukken

7. **Fondsen** (subpage under Over ons)

8. **Nesthorcommissie** (subpage under Over ons)

9. **Andere commissies** (subpage under Over ons, example: Odin)

10. **Nieuws** *
    - Content: Nieuwsberichten Curatorium
    - Content: Nieuwsberichten Nesthorcommissie
    - Implementation: WordPress category archive

11. **Kalender** *
    - Content: Kalender (links ->aanmeldpagina/webshop)

12. **Publicaties** *
    - Content: Links naar Nesthorbladen
    - Content: Links naar Edda

13. **Verslagen** *
    - Content: Links naar verslagen over activiteiten
    - Implementation: WordPress category archive

14. **Bijzondere Projecten** *
    - Parent page for special projects

15. **Eeuwcadeaupagina**
    - Content: Info about eeuwcadeau (century gift)

---

## Implementation Tasks

### ☑ Task 1: Update overview.md with Correct Notation
**File:** `overview.md`

**Action:** Reformat the "Hoofdmenu links" section to use proper notation:
- Use `-` for main menu items
- Use `--` for direct submenu items  
- Use `---` for nested submenu items (e.g., under Bijzondere Projecten)

**Expected Result:**
```markdown
# Hoofdmenu links

- Home
- Mijn RRSG
-- Bijdragen
-- Alamanak *
-- Gegevens wijzigen *
-- Melden Overlijden
- Over ons
-- Fondsen
-- Nesthorcommissie
-- Andere commissies (bijv. Odin)
- Actueel
-- Nieuws *
-- Kalender *
-- Publicaties *
-- Verslagen *
-- Bijzondere Projecten *
--- Bijv. eeuwcadeau
- Webshop *
```

---

### ☑ Task 2: Rewrite reunisten_main_menu() Function
**File:** `functions.php`  
**Function:** `reunisten_main_menu()`  
**Lines:** Approximately 72-145

**Action:** Complete rewrite of the navigation menu structure to match overview.md

**New Structure:**
```php
function reunisten_main_menu() {
    ?>
    <ul class="main-menu">
        <!-- Home -->
        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
        
        <!-- Mijn RRSG -->
        <li class="has-dropdown">
            <a href="<?php echo esc_url(home_url('/mijn-rrsg/')); ?>">Mijn RRSG</a>
            <ul class="dropdown">
                <li><a href="<?php echo esc_url(home_url('/bijdragen/')); ?>">Bijdragen</a></li>
                <li><a href="<?php echo esc_url(home_url('/alamanak/')); ?>">Alamanak</a></li>
                <li><a href="<?php echo esc_url(home_url('/gegevens-wijzigen/')); ?>">Gegevens wijzigen</a></li>
                <li><a href="<?php echo esc_url(home_url('/melden-overlijden/')); ?>">Melden Overlijden</a></li>
            </ul>
        </li>
        
        <!-- Over ons -->
        <li class="has-dropdown">
            <a href="<?php echo esc_url(home_url('/over-ons/')); ?>">Over ons</a>
            <ul class="dropdown">
                <li><a href="<?php echo esc_url(home_url('/fondsen/')); ?>">Fondsen</a></li>
                <li><a href="<?php echo esc_url(home_url('/nesthorcommissie/')); ?>">Nesthorcommissie</a></li>
                <li><a href="<?php echo esc_url(home_url('/andere-commissies/')); ?>">Andere commissies</a></li>
            </ul>
        </li>
        
        <!-- Actueel -->
        <li class="has-dropdown">
            <a href="<?php echo esc_url(home_url('/actueel/')); ?>">Actueel</a>
            <ul class="dropdown">
                <li><a href="<?php echo esc_url(home_url('/nieuws/')); ?>">Nieuws</a></li>
                <li><a href="<?php echo esc_url(home_url('/kalender/')); ?>">Kalender</a></li>
                <li><a href="<?php echo esc_url(home_url('/publicaties/')); ?>">Publicaties</a></li>
                <li><a href="<?php echo esc_url(home_url('/verslagen/')); ?>">Verslagen</a></li>
                <li class="has-dropdown">
                    <a href="<?php echo esc_url(home_url('/bijzondere-projecten/')); ?>">Bijzondere Projecten</a>
                    <ul class="dropdown">
                        <li><a href="<?php echo esc_url(home_url('/eeuwcadeau/')); ?>">Eeuwcadeau</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        
        <!-- Webshop -->
        <li><a href="<?php echo esc_url(home_url('/winkel/')); ?>">Webshop</a></li>
    </ul>
    <?php
}
```

**Technical Considerations:**
- WordPress doesn't natively support nested dropdowns (3-level menus) with `wp_nav_menu()`
- Current implementation uses hardcoded HTML, which allows custom nesting
- Need to update CSS to support 3-level dropdown under "Bijzondere Projecten"

---

### ☑ Task 3: Update CSS for Nested Dropdowns
**File:** `style.css`  
**Section:** Navigation styles (approximately lines 70-125)

**Action:** Add support for third-level dropdown menus

**Required CSS additions:**
```css
/* Third-level dropdown (nested submenu) */
.site-navigation .dropdown .has-dropdown {
    position: relative;
}

.site-navigation .dropdown .has-dropdown > .dropdown {
    position: absolute;
    top: 0;
    left: 100%;
    display: none;
}

.site-navigation .dropdown .has-dropdown:hover > .dropdown {
    display: block;
}

/* Ensure nested dropdown items display properly */
.site-navigation .dropdown .dropdown li {
    display: block;
    margin: 0;
}

.site-navigation .dropdown .dropdown a {
    color: #ffffff;
    padding: 10px 15px;
}
```

**Testing Required:**
- Hover states work at all levels
- Nested dropdown appears to the right, not below
- Mobile responsiveness maintained

---

### ☐ Task 4: Create Page Structure Document
**File:** Create `Pages/page-requirements.md`

**Action:** Document all required pages with their:
- Slug (URL)
- Title
- Required content sections
- Login requirement status
- Parent page (if applicable)

**Format:**
```markdown
# Page Requirements

## Pages to Create in WordPress Admin

### 1. Home (front-page.php handles this)
- Already exists

### 2. Mijn RRSG (/mijn-rrsg/)
- Title: "Mijn RRSG"
- Content: Overview of member area
- Login Required: Possibly

### 3. Bijdragen (/bijdragen/)
- Title: "Bijdragen"
- Content: 
  - Info over bijdragen in natura
  - Info over pakketten en doneren
  - Link naar gegevens wijzigen
  - Link naar doneershop
  - Info over schenkingen en legaten
  - Link naar fondsen
- Login Required: No

[... continue for all pages ...]
```

---

### ☐ Task 5: Verify/Create WordPress Pages
**Action:** In WordPress Admin (wp-admin)

**Process:**
1. Log into WordPress admin
2. Go to Pages → All Pages
3. Check which pages exist
4. Create missing pages with proper:
   - Titles
   - Slugs (URL-friendly names)
   - Parent pages (for hierarchical structure)
   - Basic placeholder content based on overview.md
5. Set appropriate page templates if needed

**Page Checklist:**
- [ ] Home (use front-page.php)
- [ ] Mijn RRSG
- [ ] Bijdragen
- [ ] Alamanak (placeholder for later)
- [ ] Gegevens wijzigen
- [ ] Melden Overlijden
- [ ] Over ons
- [ ] Fondsen
- [ ] Nesthorcommissie
- [ ] Andere commissies
- [ ] Actueel (parent page)
- [ ] Nieuws
- [ ] Kalender
- [ ] Publicaties
- [ ] Verslagen
- [ ] Bijzondere Projecten
- [ ] Eeuwcadeau

---

### ☐ Task 6: Configure Login Protection
**File:** `functions.php`

**Action:** Add function to protect pages marked with * (require login)

**Implementation:**
```php
/**
 * Redirect non-logged-in users from protected pages
 */
function reunisten_protect_pages() {
    // Pages that require login
    $protected_pages = array(
        'alamanak',
        'gegevens-wijzigen',
        'nieuws',
        'kalender',
        'publicaties',
        'verslagen',
        'bijzondere-projecten',
        'winkel', // WooCommerce shop
    );
    
    if (is_page($protected_pages) && !is_user_logged_in()) {
        auth_redirect();
    }
}
add_action('template_redirect', 'reunisten_protect_pages');
```

**Testing Required:**
- Logged-out users redirected to login
- Logged-in users can access
- WooCommerce shop protection works
- No redirect loops

---

### ☐ Task 7: Create Category Archives for News/Reports
**Action:** In WordPress Admin

**Required Categories:**
1. **Nieuws** (News)
   - Slug: `nieuws`
   - Description: "Nieuwsberichten van Curatorium en Nesthorcommissie"
   
2. **Verslagen** (Reports)
   - Slug: `verslagen`
   - Description: "Verslagen over activiteiten"

**Implementation Note:**
- These are category archives, not pages
- Create sample posts in each category for testing
- Archive templates handled by `category.php` and `archive.php`

---

### ☐ Task 8: Update Front Page Content
**File:** WordPress Admin → Pages → Home

**Required Content Sections:**
1. **Basisinfo over de stichting**
   - Welcome text
   - Brief description of R.R.S.G.
   - Links to main pages (Over ons, Bijdragen, etc.)

2. **Belangrijkste nieuws**
   - Display recent posts from "Nieuws" category
   - Include "Lees meer" (Read more) links
   - Limit to 3-5 most recent items

**Template Enhancement (Optional):**
Consider creating custom front-page.php to automatically display recent news:
```php
// Add to front-page.php after main content
$news_query = new WP_Query(array(
    'category_name' => 'nieuws',
    'posts_per_page' => 5,
));
// ... display loop ...
```

---

### ☐ Task 9: Create "Over ons" Page with All Content
**File:** WordPress Admin → Pages → Over ons

**Required Content Sections:**
1. Wij zijn RRSG (Who we are)
2. Doel van de stichting (Foundation goals)
3. Curatorium (Board)
4. Link to → Fondsen page
5. Link to → NesthorCommissie page
6. Link to → Andere commissies page
7. Statuten (Statutes)
8. Jaarstukken (Annual reports)

**Layout Suggestion:**
- Use WordPress blocks/paragraphs
- Create internal links to subpages
- Consider using columns for better layout

---

### ☐ Task 10: Create "Melden Overlijden" Page
**File:** WordPress Admin → Pages → Melden Overlijden

**Required Content:**
```
Voor het melden van een overlijden, gelieve contact op te nemen:

Email: abactis@hetrsg.nl
Of telefonisch contact opnemen

[Additional contact information if available]
```

**Considerations:**
- Simple contact information page
- May want to add a contact form later
- Clear, respectful tone

---

### ☐ Task 11: Create "Kalender" Page
**File:** WordPress Admin → Pages → Kalender

**Required Content:**
- Calendar display (may require plugin like The Events Calendar)
- Links to event registration pages
- Links to webshop for event tickets

**Implementation Options:**
1. Manual calendar (HTML table)
2. Events plugin (The Events Calendar, Events Manager)
3. Google Calendar embed
4. Custom calendar functionality

**Decision Required:** Which calendar solution to use?

---

### ☐ Task 12: Create "Publicaties" Page
**File:** WordPress Admin → Pages → Publicaties

**Required Content:**
1. **Nesthorbladen**
   - Archive links to Nesthor publications
   - PDF downloads or external links

2. **Edda**
   - Links to Edda publications
   - PDF downloads or external links

**Layout Suggestion:**
- Two-column layout
- Chronological list (newest first)
- Download/view links for each publication

---

### ☐ Task 13: Test Navigation Structure
**Testing Checklist:**

**Desktop Testing:**
- [ ] All main menu items visible
- [ ] Hover shows dropdowns
- [ ] Nested dropdown (Bijzondere Projecten → Eeuwcadeau) works
- [ ] Links go to correct pages
- [ ] Active page highlighted (if CSS supports it)

**Mobile Testing:**
- [ ] Menu accessible on mobile
- [ ] Dropdowns work on touch devices
- [ ] All items accessible
- [ ] No layout breaking

**Cross-browser Testing:**
- [ ] Chrome
- [ ] Firefox
- [ ] Safari
- [ ] Edge

---

### ☐ Task 14: Remove Old/Unused Menu Items
**File:** `functions.php`

**Action:** Clean up any old navigation code

**Items to Remove:**
- Old "Activiteiten" menu structure
- Old "Doneren" menu structure
- Old "Almanak" top-level menu
- External "Het R.S.G." link (unless moved elsewhere)
- Any unused menu-related functions

**Verify:**
- No broken references
- `reunisten_category_menu()` (line 67) - keep for backwards compatibility or remove?

---

### ☐ Task 15: Documentation Update
**Action:** Create/Update theme documentation

**Files to Create/Update:**
1. **README.md** - Theme installation and setup
2. **NAVIGATION.md** - Navigation structure documentation
3. **PAGES.md** - Page requirements and content guide

**Content Should Include:**
- Navigation structure explanation
- How to add/modify menu items
- Which pages require login
- Content guidelines for each page
- Maintenance instructions

---

## Success Criteria

### Navigation
✓ Menu structure matches overview.md exactly  
✓ All main menu items present (Home, Mijn RRSG, Over ons, Actueel, Webshop)  
✓ All submenu items present and correctly nested  
✓ Nested dropdown works (Actueel → Bijzondere Projecten → Eeuwcadeau)  
✓ CSS properly styles all dropdown levels  
✓ Mobile navigation works  

### Pages
✓ All required pages created in WordPress  
✓ Correct slugs/URLs  
✓ Placeholder content added  
✓ Login protection on marked pages (*)  
✓ Category archives work (Nieuws, Verslagen)  
✓ Front page displays news items  

### Code Quality
✓ No PHP errors  
✓ No JavaScript console errors  
✓ Valid HTML  
✓ CSS is clean and organized  
✓ Functions are documented  
✓ No duplicate code  

### User Experience
✓ Intuitive navigation  
✓ Clear page hierarchy  
✓ Fast page loads  
✓ Accessible (keyboard navigation works)  
✓ Responsive design maintained  

---

## Technical Notes

### WordPress Page Hierarchy
WordPress supports parent/child page relationships:
- "Over ons" can be parent
- "Fondsen", "Nesthorcommissie", "Andere commissies" as children
- URLs become: `/over-ons/fondsen/`, `/over-ons/nesthorcommissie/`, etc.

However, the navigation is hardcoded, not using `wp_nav_menu()`, so hierarchy is visual only.

### WooCommerce Integration
- "Webshop" links to `/winkel/` (WooCommerce shop page)
- Already has WooCommerce support enabled in `functions.php` (line 26-29)
- Login protection should consider WooCommerce's own login system

### Future Enhancements
1. Convert hardcoded menu to `wp_nav_menu()` for easier admin management
2. Add active page highlighting in CSS
3. Implement proper calendar functionality
4. Add login/logout link in header
5. Create member dashboard for "Mijn RRSG"
6. Implement contact forms
7. Add search functionality

---

## Risk Assessment

### High Risk
- **Nested dropdowns** - May not work well on mobile
  - *Mitigation:* Test thoroughly, consider alternative mobile menu

### Medium Risk
- **Login protection** - Needs to work with WooCommerce
  - *Mitigation:* Test extensively, consider WooCommerce-specific solutions

- **Content migration** - Existing content may be organized differently
  - *Mitigation:* Audit existing pages before restructuring

### Low Risk
- **CSS updates** - Relatively straightforward
- **Page creation** - Standard WordPress functionality

---

## Timeline Estimate

| Task | Estimated Time | Priority |
|------|---------------|----------|
| Task 1: Update overview.md | 15 min | High |
| Task 2: Rewrite menu function | 1 hour | High |
| Task 3: Update CSS | 45 min | High |
| Task 4: Create page requirements doc | 30 min | Medium |
| Task 5: Create WordPress pages | 2 hours | High |
| Task 6: Configure login protection | 1 hour | Medium |
| Task 7: Create categories | 15 min | Medium |
| Task 8: Update front page | 1 hour | Medium |
| Task 9: Create Over ons page | 45 min | High |
| Task 10: Create Melden Overlijden page | 15 min | Low |
| Task 11: Create Kalender page | Varies* | Medium |
| Task 12: Create Publicaties page | 30 min | Medium |
| Task 13: Test navigation | 1.5 hours | High |
| Task 14: Remove old code | 30 min | Low |
| Task 15: Documentation | 1 hour | Low |

**Total: ~11-12 hours** (excluding Kalender page if plugin needed)

*Kalender depends on chosen implementation method

---

## Questions for Clarification

1. **Calendar Implementation:** What calendar system should be used? Events plugin, manual, or embedded?

2. **Login System:** Are you using a specific membership plugin, or just WordPress core authentication?

3. **Content:** Do you have existing content for these pages, or should I create placeholder text?

4. **Alamanak Page:** It's marked "voor nu nvt" (not yet applicable). Should I create a placeholder or skip it entirely?

5. **Commissies Details:** What specific commissies (committees) should be listed under "Andere commissies" besides Odin?

6. **Nieuws Categories:** Should Curatorium and Nesthorcommissie news be separate subcategories or tags?

7. **Mobile Menu:** The nested dropdown might be problematic on mobile. Consider a hamburger menu with accordion-style submenus?

8. **External Links:** Should "Het R.S.G." (hetrsg.nl) link remain, be moved to footer, or removed?

---

## Next Steps

Once questions are answered and plan is approved:

1. Start with Task 1 (update overview.md) 
2. Proceed to Task 2-3 (code changes)
3. Test navigation locally
4. Move to WordPress admin tasks (5-12)
5. Final testing (13)
6. Cleanup and documentation (14-15)

**Ready to proceed after approval.**
