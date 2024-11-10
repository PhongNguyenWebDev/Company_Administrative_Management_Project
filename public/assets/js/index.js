document.addEventListener("DOMContentLoaded", function () {
    const toggleSearchElement = document.getElementById("toggleSearch");
    const searchForm = document.querySelector(".form-inline");

    if (!toggleSearchElement) {
        console.error("Toggle search element not found.");
        return;
    }

    if (!searchForm) {
        console.error("Search form element not found.");
        return;
    }

    toggleSearchElement.addEventListener("click", function () {
        searchForm.classList.toggle("hidden");
    });
});

// user and role

function clearForm() {
    document.getElementById("locationForm").reset();
    document.getElementById("userForm").reset();
    document.getElementById("roleForm").reset();
}
