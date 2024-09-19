var toggleSearchElement = document.getElementById("toggleSearch");
if (toggleSearchElement) {
    toggleSearchElement.addEventListener("click", function () {
        var searchForm = document.querySelector(".form-inline");
        if (searchForm) {
            if (searchForm.style.display === "none") {
                searchForm.style.display = "block";
            } else {
                searchForm.style.display = "none";
            }
        } else {
            console.error("Search form element not found.");
        }
    });
} else {
    console.error("Toggle search element not found.");
}

// user and role

function clearForm() {
    document.getElementById("locationForm").reset();
    document.getElementById("userForm").reset();
    document.getElementById("roleForm").reset();
}
