function getHourAndMinute() {
    const hourValue = parseInt(hourCurrentElement.textContent, 10);
    const minuteValue = parseInt(minuteCurrentElement.textContent, 10);
    console.log(`Hora: ${hourValue}, Minuto: ${minuteValue}`);
  }
  
  document.getElementById('getTimeButton').addEventListener('click', getHourAndMinute);