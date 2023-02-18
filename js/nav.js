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
})
