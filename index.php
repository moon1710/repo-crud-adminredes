<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="assets/img/hedgehog.png" type="image/icon type">
      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/styles.css">
      
      <title>Hedgie</title>
   </head>
   <body>
      <!--=============== LOGIN IMAGE ===============-->
      <svg class="login__blob" viewBox="0 0 566 840" xmlns="http://www.w3.org/2000/svg">
         <mask id="mask0" mask-type="alpha">
            <path d="M342.407 73.6315C388.53 56.4007 394.378 17.3643 391.538 
            0H566V840H0C14.5385 834.991 100.266 804.436 77.2046 707.263C49.6393 
            591.11 115.306 518.927 176.468 488.873C363.385 397.026 156.98 302.824 
            167.945 179.32C173.46 117.209 284.755 95.1699 342.407 73.6315Z"/>
         </mask>
      
         <g mask="url(#mask0)">
            <path d="M342.407 73.6315C388.53 56.4007 394.378 17.3643 391.538 
            0H566V840H0C14.5385 834.991 100.266 804.436 77.2046 707.263C49.6393 
            591.11 115.306 518.927 176.468 488.873C363.385 397.026 156.98 302.824 
            167.945 179.32C173.46 117.209 284.755 95.1699 342.407 73.6315Z"/>
      
            <!-- Insert your image (recommended size: 1000 x 1200) -->
            <image class="login__img" href="    assets/img/bg-img.jpg"/>
         </g>
      </svg>      

      <!--=============== LOGIN ===============-->
      <div class="login container grid" id="loginAccessRegister">
         <!--===== LOGIN ACCESS =====-->
         <div class="login__access">
            <h1 class="login__title">Login.</h1>
            
            <div class="login__area">
            <form action="php/login.php" method="POST" class="login__form">
   <div class="login__content grid">
      <div class="login__box">
         <input type="email" name="email" id="email" required placeholder=" " class="login__input">
         <label for="email" class="login__label">Email</label>
         <i class="ri-mail-fill login__icon"></i>
      </div>

      <div class="login__box">
         <input type="password" name="password" id="password" required placeholder=" " class="login__input">
         <label for="password" class="login__label">Contraseña</label>
         <i class="ri-eye-off-fill login__icon login__password" id="loginPassword"></i>
      </div>
   </div>

   <button type="submit" class="login__button">Ingresa</button>
</form>
      
               <div class="login__social">
                  <p class="login__social-title">O entra con</p>
      
                  <div class="login__social-links">
                     <a href="#" class="login__social-link">
                        <img src="assets/img/icon-google.svg" alt="image" class="login__social-img">
                     </a>
      
                     <a href="#" class="login__social-link">
                        <img src="assets/img/icon-facebook.svg" alt="image" class="login__social-img">
                     </a>
      
                     <a href="#" class="login__social-link">
                        <img src="assets/img/icon-apple.svg" alt="image" class="login__social-img">
                     </a>
                  </div>
               </div>
      
               <p class="login__switch">
                  No tienes una cuenta? 
                  <button id="loginButtonRegister">Crear cuenta</button>
               </p>
            </div>
         </div>

         <!--===== LOGIN REGISTER =====-->
         <div class="login__register">
            <h1 class="login__title">Crea una cuenta nueva.</h1>

            <div class="login__area">
            <form action="php/register.php" method="POST" class="login__form">
   <div class="login__content grid">
      <div class="login__group grid">
         <div class="login__box">
            <input type="text" name="names" id="names" required placeholder=" " class="login__input">
            <label for="names" class="login__label">Nombre</label>
            <i class="ri-id-card-fill login__icon"></i>
         </div>

         <div class="login__box">
            <input type="text" name="surnames" id="surnames" required placeholder=" " class="login__input">
            <label for="surnames" class="login__label">Apellidos</label>
            <i class="ri-id-card-fill login__icon"></i>
         </div>
      </div>

      <div class="login__box">
         <input type="email" name="email" id="emailCreate" required placeholder=" " class="login__input">
         <label for="emailCreate" class="login__label">Email</label>
         <i class="ri-mail-fill login__icon"></i>
      </div>

      <div class="login__box">
         <input type="password" name="password" id="passwordCreate" required placeholder=" " class="login__input">
         <label for="passwordCreate" class="login__label">Contraseña</label>
         <i class="ri-eye-off-fill login__icon login__password" id="loginPasswordCreate"></i>
      </div>
   </div>

   <button type="submit" class="login__button">Registrate</button>
</form>

   
               <p class="login__switch">
                  Ya tienes una cuenta?
                  <button id="loginButtonAccess">Log In</button>
               </p>
            </div>
         </div>
      </div>
      
      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>
   </body>
</html>