const navLinks = document.querySelectorAll('.nav-custom')
const menuToggle = document.getElementById('navbarMenu')
const bsCollapse = new bootstrap.Collapse(menuToggle, {
    toggle: false
})
navLinks.forEach((e) => {
    e.addEventListener(
        'click',
        () => {
            if (bsCollapse._isShown()) {
                bsCollapse.hide()
            }
        }
    )
});

document.querySelectorAll(".nav-link").forEach((link) => {
    if (link.href === window.location.href) {
        link.classList.add("active");
        link.setAttribute("aria-current", "page");
    }
});