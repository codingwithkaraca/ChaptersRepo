// script.js

async function searchBooks() {
    const query = document.getElementById('search-input').value;
    const response = await fetch(`/search.php?q=${query}`);
    const books = await response.json();
    displayResults(books);
}

function displayResults(books) {
    const resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = '';

    if (books.length === 0) {
        resultsDiv.innerHTML = '<p>No results found</p>';
        return;
    }

    books.forEach(book => {
        const bookItem = document.createElement('div');
        bookItem.className = 'result-item';
        bookItem.innerHTML = `
            <h2>${book.title}</h2>
            <p><strong>Author:</strong> ${book.author}</p>
            <p><strong>Publisher:</strong> ${book.publisher}</p>
            <p><strong>Publication Date:</strong> ${book.publication_date}</p>
        `;
        resultsDiv.appendChild(bookItem);
    });
}
