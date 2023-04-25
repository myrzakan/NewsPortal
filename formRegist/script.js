const singInBtn = document.querySelector('.signin_btn')
const singUnBtn = document.querySelector('.signup_btn')
const formBox = document.querySelector('.form_box')
const body = document.body

singUnBtn.addEventListener('click', function() {
    formBox.classList.add('active')
    body.classList.add('active')
})

singInBtn.addEventListener('click', function() {
    formBox.classList.remove('active')
    body.classList.remove('active')
})