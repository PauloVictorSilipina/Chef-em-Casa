div = document.querySelector('.container').offsetTop;
footer = document.querySelector("footer").offsetHeight;
var tela = window.innerHeight
document.getElementsByClassName("container")[0].style.height = `${tela - div - footer}px`

document.getElementsByClassName("container")[0].style.position = 'absolute'
document.getElementsByClassName("container")[0].style.left = '0'
div = document.querySelector('.container').offsetLeft;
var tela = window.innerWidth

document.getElementsByClassName("container")[0].style.width = `${tela - div }px`


