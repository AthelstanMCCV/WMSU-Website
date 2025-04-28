const navbar = document.getElementById('navbar');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 0) {
      navbar.classList.remove('opacity-0');
      navbar.classList.add('opacity-100', 'pointer-events-auto');
    }
  });

  navbar.addEventListener('mouseenter', () => {
    navbar.classList.remove('opacity-0');
    navbar.classList.add('opacity-100')
  });

  setTimeout(() => {
    navbar.classList.add('opacity-100', 'pointer-events-auto', 'permanently-visible');
    navbar.classList.remove('opacity-0');
  }, 3000); // 3 second delay
  
  let searchInput = document.querySelector('#search-dropdown input[type="text"]');
let searchResults = document.getElementById('search-results');
let debounceTimeout;

searchInput.addEventListener('input', function () {
    clearTimeout(debounceTimeout);

    let query = this.value.trim();
    if (query.length < 2) {
        searchResults.innerHTML = '';
        return;
    }

    debounceTimeout = setTimeout(() => {
        fetch(`/search-json?query=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    searchResults.innerHTML = `<p class="text-gray-400">No results found.</p>`;
                    return;
                }

                searchResults.innerHTML = data.map(page => `
                    <div>
                        <a href="${page.route}" class="text-red-600 font-semibold hover:underline text-lg">${page.title}</a>
                        ${page.snippets.length ? `
                            <ul class="mt-1 pl-3 border-l-2 border-red-500 space-y-1">
                                ${page.snippets.map(snip => `<li class="text-sm text-gray-700">${snip}</li>`).join('')}
                            </ul>
                        ` : ''}
                    </div>
                `).join('');
            });
    }, 300); // debounce delay 300ms
});