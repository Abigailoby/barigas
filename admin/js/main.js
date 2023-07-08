document.addEventListener("DOMContentLoaded", function (event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                // show navbar
                nav.classList.toggle('show')
                // change icon
                toggle.classList.toggle('bx-x')
                // add padding to body
                bodypd.classList.toggle('body-pd')
                // add padding to header
                headerpd.classList.toggle('body-pd')
            })
        }
    }

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
        }
    }
    linkColor.forEach(l => l.addEventListener('click', colorLink))

});


function formatRupiah(input) {
    // Remove all non-digit characters
    var value = input.value.replace(/[^0-9]/g, '');

    // Format the value as Rupiah
    var formattedValue = formatNumber(value);

    // Set the formatted value back to the input field
    input.value = formattedValue;
}

function formatNumber(number) {
    var formatter = new Intl.NumberFormat('id-ID', {

        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    });

    return formatter.format(number);
}
