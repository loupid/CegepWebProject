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

//let progDropdown = document.getElementById('program-dropdown')
//let btnProgram = document.getElementById('btn-program')
// let newsDropdown = document.getElementById('news-dropdown')
// let btnNews = document.getElementById('btn-news')
let moreDropdown = document.getElementById('more-dropdown')
let btnMore = document.getElementById('btn-more')
// let studentsDropdown = document.getElementById('students-dropdown')
// let btnStudents = document.getElementById('btn-students')
let mobileMenu = document.getElementById('mobile-menu')
let btnClose = document.getElementById('btn-close-mobile-menu')
let btnOpen = document.getElementById('btn-open-mobile-menu')

//btnProgram.addEventListener('mouseover', () => {
//    if (progDropdown.classList.contains('hidden')) {
//        progDropdown.classList.remove('hidden')
        // newsDropdown.classList.add('hidden')
//        moreDropdown.classList.add('hidden')
        // studentsDropdown.classList.add('hidden')
//    }
//})

//progDropdown.addEventListener('mouseleave', () => {
//    if (!progDropdown.classList.contains('hidden')) {
//        progDropdown.classList.add('hidden')
 //   }
//})

// btnNews.addEventListener('mouseover', () => {
//     if (newsDropdown.classList.contains('hidden')) {
//         newsDropdown.classList.remove('hidden')
//         progDropdown.classList.add('hidden')
//         moreDropdown.classList.add('hidden')
//         // studentsDropdown.classList.add('hidden')
//     }
// })

// newsDropdown.addEventListener('mouseleave', () => {
//     if (!newsDropdown.classList.contains('hidden')) {
//         newsDropdown.classList.add('hidden')
//     }
// })

btnMore.addEventListener('mouseover', () => {
    if (moreDropdown.classList.contains('hidden')) {
        moreDropdown.classList.remove('hidden')
        // newsDropdown.classList.add('hidden')
        //progDropdown.classList.add('hidden')
        // studentsDropdown.classList.add('hidden')
    }
})

moreDropdown.addEventListener('mouseleave', () => {
    if (!moreDropdown.classList.contains('hidden')) {
        moreDropdown.classList.add('hidden')
    }
})

// btnStudents.addEventListener('mouseover', () => {
//     if (studentsDropdown.classList.contains('hidden')) {
//         studentsDropdown.classList.remove('hidden')
//         newsDropdown.classList.add('hidden')
//         moreDropdown.classList.add('hidden')
//         progDropdown.classList.add('hidden')
//     }
// })

// studentsDropdown.addEventListener('mouseleave', () => {
//     if (!studentsDropdown.classList.contains('hidden')) {
//         studentsDropdown.classList.add('hidden')
//     }
// })

$(document).click(function () {
    //if (this.id !== 'program-dropdown' && this.id !== 'btn-program') {
    //    $("#program-dropdown").addClass('hidden');
    //}
    // if (this.id !== 'news-dropdown' && this.id !== 'btn-news') {
    //     $("#news-dropdown").addClass('hidden');
    // }
    if (this.id !== 'more-dropdown' && this.id !== 'btn-more') {
        $("#more-dropdown").addClass('hidden');
    }
    // if (this.id !== 'students-dropdown' && this.id !== 'btn-students') {
    //     $("#students-dropdown").addClass('hidden');
    // }
});

btnClose.addEventListener('click', () => {
    mobileMenu.classList.add('hidden')
})

btnOpen.addEventListener('click', () => {
    mobileMenu.classList.remove('hidden')
})