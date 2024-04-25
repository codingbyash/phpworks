// Countdown timer function
function runCountdown() {
     // Get the countdown elements from the HTML
     const daysElement = document.querySelector('.display-number:nth-child(1)');
     const hoursElement = document.querySelector('.display-number:nth-child(2)');
     const minutesElement = document.querySelector('.display-number:nth-child(3)');
     const secondsElement = document.querySelector('.display-number:nth-child(4)');
 
     // Set the end time for the countdown
     const countdownEndDate = new Date();
     countdownEndDate.setDate(countdownEndDate.getDate() + 360); // Adjust the number of days as needed
 
     // Function to update the countdown display
     function updateCountdown() {
         const now = new Date();
         const timeRemaining = countdownEndDate - now;
 
         if (timeRemaining <= 0) {
             clearInterval(countdownInterval);
             daysElement.textContent = 0;
             hoursElement.textContent = 0;
             minutesElement.textContent = 0;
             secondsElement.textContent = 0;
             return;
         }
 
         // Calculate remaining days, hours, minutes, and seconds
         const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
         const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
         const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
         const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
 
         // Update the countdown elements
         daysElement.textContent = days;
         hoursElement.textContent = hours;
         minutesElement.textContent = minutes;
         secondsElement.textContent = seconds;
     }
 
     // Update the countdown every second
     const countdownInterval = setInterval(updateCountdown, 1000);
     updateCountdown(); // Initial call to set the countdown values
 }
 
 // Call the function to start the countdown
 runCountdown();
 