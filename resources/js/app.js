// ─── FILTER ───────────────────────────────────────────
function filterProducts() {
    const checked = { occasion: [], season: [], gender: [] };

// Change these lines in source 1 to add .toLowerCase()
    document.querySelectorAll('[data-group="occasion"] input:checked').forEach(cb => checked.occasion.push(cb.value.toLowerCase()));
    document.querySelectorAll('[data-group="season"] input:checked').forEach(cb => checked.season.push(cb.value.toLowerCase()));
    document.querySelectorAll('[data-group="gender"] input:checked').forEach(cb => checked.gender.push(cb.value.toLowerCase()));

    const hasFilters = checked.occasion.length > 0 || checked.season.length > 0 || checked.gender.length > 0;

    let visible = 0;
    document.querySelectorAll('.frag-card').forEach(card => {
        if (!hasFilters) { card.style.display = ''; visible++; return; }

        const cardGender    = card.dataset.gender?.toLowerCase() || '';
        const cardSeasons   = card.dataset.seasons?.toLowerCase().split(',').map(s => s.trim()) || [];
        const cardOccasions = card.dataset.occasions?.toLowerCase().split(',').map(o => o.trim()) || [];

        const match =
            (checked.gender.length === 0  || checked.gender.includes(cardGender)) &&
            (checked.season.length === 0   || checked.season.some(s => cardSeasons.includes(s))) &&
            (checked.occasion.length === 0 || checked.occasion.some(o => cardOccasions.includes(o)));

        card.style.display = match ? '' : 'none';
        if (match) visible++;
    });

    const countEl = document.getElementById('fragCount');
    if (countEl) countEl.textContent = visible;

    const noResults = document.getElementById('noResults');
    if (noResults) noResults.hidden = visible > 0;
}

function clearAllFilters() {
    document.querySelectorAll('.filter-sidebar input[type="checkbox"]').forEach(cb => cb.checked = false);
    filterProducts();
}
window.clearAllFilters = clearAllFilters;

// ─── SEARCH ───────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
    // attach filter listeners
    document.querySelectorAll('.filter-sidebar input[type="checkbox"]').forEach(cb => {
        cb.addEventListener('change', filterProducts);
    });

    // search
    const searchBar     = document.getElementById('searchBar');
    const searchResults = document.getElementById('searchResults');
    if (!searchBar || !searchResults) return;

    searchBar.addEventListener('input', function () {
        const query = this.value.trim().toLowerCase();

        if (!query) { searchResults.hidden = true; searchResults.innerHTML = ''; return; }

        const matches = [];
        document.querySelectorAll('#collectionGrid .frag-card').forEach(card => {
            const name  = card.dataset.name  || '';
            const brand = card.dataset.brand || '';
            if (name.includes(query) || brand.includes(query)) {
                matches.push({
                    name:  card.querySelector('.frag-name')?.textContent  || '',
                    brand: card.querySelector('.frag-brand')?.textContent || '',
                    href:  card.href
                });
            }
        });

        if (matches.length === 0) {
            searchResults.innerHTML = `<div class="search-empty">No fragrances found</div>`;
        } else {
            searchResults.innerHTML = matches.map(m => `
                <a href="${m.href}" class="search-item">
                    <span class="search-item-name">${m.name}</span>
                    <span class="search-item-brand">${m.brand}</span>
                </a>`).join('');
        }
        searchResults.hidden = false;
    });

    document.addEventListener('click', e => {
        if (!searchBar.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.hidden = true;
        }
    });
});
