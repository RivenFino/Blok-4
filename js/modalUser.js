const buttonUser = document.querySelector('#button-user');
const modalUser = document.querySelector('#modal-user');
const modalCloseUser = document.querySelector('#modal-close-user');
const overlayUser = document.querySelector('#overlay-user');
const menuToggle = document.querySelector('#menuToggle');
const navigasi = document.querySelector('#navigasi-menu');
const menuClose = document.querySelector('#menu-close');
const overlayMenu = document.querySelector('#overlay-menu');

menuToggle.onclick = function()
{
    navigasi.classList.add('show')
}
menuClose.onclick = function()
{
    navigasi.classList.remove('show')
}   
overlayMenu .onclick = function()
{
    navigasi.classList.remove('show')
}


buttonUser.onclick = function()
{
    modalUser.classList.add('show')
}    
modalCloseUser.onclick = function()
{
    modalUser.classList.remove('show')
}    
overlayUser.onclick = function()
{
    modalUser.classList.remove('show')
}    



