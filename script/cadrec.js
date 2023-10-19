var textarea = document.querySelector('textarea');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
  var el = this;
  setTimeout(function(){
    el.style.cssText = 'height:auto; padding:0';
    // for box-sizing other than "content-box" use:
    // el.style.cssText = '-moz-box-sizing:content-box';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}

// Selecione todos os inputs do tipo radio com a classe "radiostyle"
const radioInputs = document.querySelectorAll('input.radiostyle[type="radio"]');

// Adicione um evento de clique a cada input
radioInputs.forEach(input => {
    input.addEventListener('click', function() {
        // Remova a classe "marked" de todas as divs com a classe "col-lg-6"
        document.querySelectorAll('div.col-lg-6').forEach(div => {
            div.classList.remove('marked');
        });
        
        // Adicione a classe "marked" à div adjacente da div atual
        this.parentElement.classList.add('marked');
    });
});

const hourCurrentElement = document.querySelector('.hour .current');
const minuteCurrentElement = document.querySelector('.minute .current');
const previousHourElement = document.querySelector('.hour .previous');
const nextHourElement = document.querySelector('.hour .next');
const previousMinuteElement = document.querySelector('.minute .previous');
const nextMinuteElement = document.querySelector('.minute .next');

hourCurrentElement.textContent = '00';
minuteCurrentElement.textContent = '00';

function updateClock() {
  let hour = parseInt(hourCurrentElement.textContent, 10);
  let minute = parseInt(minuteCurrentElement.textContent, 10);

  nextHourElement.textContent = (hour + 1) % 24;
  previousHourElement.textContent = (hour - 1 + 24) % 24;
  nextMinuteElement.textContent = (minute + 1) % 60;
  previousMinuteElement.textContent = (minute - 1 + 60) % 60;
}

function incrementValue(element, max) {
  let value = parseInt(element.textContent, 10);
  value = (value + 1) % max;
  element.textContent = value.toString().padStart(2, '0');
  updateClock();
}

function decrementValue(element, max) {
  let value = parseInt(element.textContent, 10);
  value = (value - 1 + max) % max;
  element.textContent = value.toString().padStart(2, '0');
  updateClock();
}

hourCurrentElement.addEventListener('wheel', (e) => {
  if (e.deltaY > 0) {
    incrementValue(hourCurrentElement, 24);
  } else {
    decrementValue(hourCurrentElement, 24);
  }
  e.preventDefault();
});

minuteCurrentElement.addEventListener('wheel', (e) => {
  if (e.deltaY > 0) {
    incrementValue(minuteCurrentElement, 60);
  } else {
    decrementValue(minuteCurrentElement, 60);
  }
  e.preventDefault();
});

updateClock();



