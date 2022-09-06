/* Navigation Search  */
let toggleSearch = document.querySelector("#navigation-search-hook");

toggleSearch.addEventListener('click', function() {
    var searchForm = document.getElementById("navigation-search-form");
    if (searchForm.style.display === "none") {
        searchForm.style.display = "block";
    } else {
        searchForm.style.display = "none";
    }
});