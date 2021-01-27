let body = document.getElementsByTagName('body')[0]

// Check if there's a theme cookie saved
const value = `; ${document.cookie}`
const parts = value.split(`; dark=`)
if (parts.length === 2) {
    let present = parts.pop().split(';').shift()
    if (present === "false")
        body.classList.remove('dark')
}

// Theme toggling using buttons
const btn = document.getElementsByClassName('theme-toggle')
for (let i = 0; i < btn.length; i++) {
    btn[i].addEventListener('click', () => {
        if (body.classList.contains('dark'))
            body.classList.remove('dark')
        else body.classList.add('dark')

        document.cookie = "dark=" + body.classList.contains('dark')
    })
}

let progDropdown = document.getElementById('program-dropdown')
let btnProgram = document.getElementById('btn-program')
btnProgram.addEventListener('mouseover', () => {
    if (progDropdown.classList.contains('hidden')) {
        progDropdown.classList.remove('hidden')
    }
})

progDropdown.addEventListener('mouseleave', () => {
    if (!progDropdown.classList.contains('hidden')) {
        progDropdown.classList.add('hidden')
    }
})

$(document).click(function () {
    if (this.id !== 'program-dropdown' && this.id !== 'btn-program') {
        $("#program-dropdown").addClass('hidden');
    }
    if (this.id !== 'news-dropdown' && this.id !== 'btn-news') {
        $("#news-dropdown").addClass('hidden');
    }
});

let newsDropdown = document.getElementById('news-dropdown')
let btnNews = document.getElementById('btn-news')
btnNews.addEventListener('mouseover', () => {
    if (newsDropdown.classList.contains('hidden')) {
        newsDropdown.classList.remove('hidden')
    }
})

newsDropdown.addEventListener('mouseleave', () => {
    if (!newsDropdown.classList.contains('hidden')) {
        newsDropdown.classList.add('hidden')
    }
})






