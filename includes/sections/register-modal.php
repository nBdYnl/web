<div id="register-modal">
  <div class="login-box">
    <button class="close-login" onclick="closeRegisterModal()">
      <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
    <h2>nBdy</h2>
    <p class="login-sub" data-t="register_welcome">Word onderdeel van dit universum.</p>
    <form onsubmit="handleRegister(event)">
      <?= csrfInput() ?>
      <label>Email</label>
      <input type="email" id="reg-email" placeholder="jouw@email.nl" required>

      <label data-t="password">Wachtwoord</label>
      <input type="password" id="reg-password" placeholder="••••••••" required minlength="8">

      <label data-t="register_name">Naam (zichtbaar op de site)</label>
      <input type="text" id="reg-name" placeholder="Bijv. L." required maxlength="50">

      <button type="submit" data-t="register_btn">Aanmelden</button>
    </form>
    <div class="login-alt">
      <span data-t="register_has_account">Al een account?</span>
      <a href="#" onclick="openLoginModal(); closeRegisterModal(); return false;" data-t="login_btn">Inloggen</a>
    </div>
  </div>
</div>
