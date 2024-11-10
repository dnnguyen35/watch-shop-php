function instantSearch() {
    document.querySelectorAll('.single-item').forEach(item => item.querySelectorAll('p')[0].innerText.toLowerCase().indexOf(document.querySelector('#search-text').value.toLowerCase()) > -1 ? item.style.display = 'block' : item.style.display = 'none');
}