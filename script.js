document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.getElementById("toggleButton");
    const toggleButton2 = document.getElementById("toggleButton2");
    const sidebar = document.getElementById("sidebar");

    const addActiveClass = function() {
        sidebar.classList.add("active");
    };

    const removeActiveClass = function() {
        sidebar.classList.remove("active");
    };

    toggleButton.addEventListener("click", addActiveClass);
    toggleButton2.addEventListener("click", removeActiveClass);
});
