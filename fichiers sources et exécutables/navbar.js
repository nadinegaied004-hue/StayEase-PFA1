// Simple Navbar - Same for ALL pages
const ORANGE = '#e67e22';
const navbarHTML = `
<nav style="position:fixed;top:0;left:0;right:0;z-index:50;background:white;box-shadow:0 4px 20px rgba(0,0,0,0.06);height:70px;">
  <div style="height:100%;display:flex;align-items:center;justify-content:space-between;padding:0 8px;">
    <div style="display:flex;align-items:center;">
      <a href="index.html" style="text-decoration:none;">
        <span style="font-size:1.75rem;font-weight:bold;color:${ORANGE};font-family:serif;margin-right:8px;">StayEase</span>
      </a>
    </div>
    <div style="display:flex;align-items:center;position:absolute;left:50%;transform:translateX(-50%);">
      <a href="index.html" style="color:#333;font-weight:600;text-decoration:none;padding:8px 16px;border-radius:25px;font-size:0.9rem;margin-right:4px;">Accueil</a>
      <a href="hotels.html" style="color:#333;font-weight:600;text-decoration:none;padding:8px 16px;border-radius:25px;font-size:0.9rem;margin-right:4px;">Logements</a>
      <a href="avis.html" style="color:#333;font-weight:600;text-decoration:none;padding:8px 16px;border-radius:25px;font-size:0.9rem;margin-right:4px;">Avis Clients</a>
      <a href="avis-personnel.html" style="color:#333;font-weight:600;text-decoration:none;padding:8px 16px;border-radius:25px;font-size:0.9rem;margin-right:4px;">Avis Personnel</a>
      <a id="nav-update" href="proprietaire.html" style="color:#333;font-weight:600;text-decoration:none;padding:8px 16px;border-radius:25px;font-size:0.9rem;display:none;margin-right:4px;">Mise à jour</a>
    </div>
    <div style="display:flex;align-items:center;">
      <span id="user-name" style="color:#333;font-weight:600;font-size:0.9rem;margin-right:12px;"></span>
      <button id="auth-btn" onclick="handleAuth()" style="background:${ORANGE};color:white;border:none;padding:8px 20px;border-radius:25px;cursor:pointer;font-weight:600;font-size:0.9rem;"></button>
    </div>
  </div>
</nav>
`;

const footerHTML = `
<footer style="
  background:linear-gradient(135deg,#1a3a4a 0%,#264653 100%);
  color:white;
  padding:1.4rem 0 0.8rem;
  margin-top:1.5rem;

  /* pleine largeur */
  width:100vw;
  margin-left:calc(-50vw + 50%);
">
  
  <div style="
    width:100%;
    padding:0 6rem;
    box-sizing:border-box;
  ">
    
    <div style="
      display:grid;
      grid-template-columns:repeat(4,1fr);
      gap:1rem;
      margin-bottom:1rem;
      align-items:start;
    ">
      
      <div>
        <h3 style="
          font-size:1.45rem;
          font-weight:bold;
          margin-bottom:0.5rem;
          color:#f4a261;
        ">
          StayEase
        </h3>

        <p style="
          color:#b8c5cc;
          font-size:0.8rem;
          line-height:1.4;
          margin-bottom:0.6rem;
        ">
          Votre plateforme de réservation d'hébergements en Tunisie.
        </p>

        <div style="display:flex;gap:0.5rem;">
          <a href="#" style="
            width:30px;
            height:30px;
            background:#3a5a6a;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            text-decoration:none;
            font-size:0.75rem;
          ">f</a>

          <a href="#" style="
            width:30px;
            height:30px;
            background:#3a5a6a;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            text-decoration:none;
            font-size:0.75rem;
          ">in</a>

          <a href="#" style="
            width:30px;
            height:30px;
            background:#3a5a6a;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            text-decoration:none;
            font-size:0.75rem;
          ">X</a>
        </div>
      </div>

      <div>
        <h4 style="
          font-weight:bold;
          margin-bottom:0.5rem;
          color:#f4a261;
          font-size:0.9rem;
        ">
          🏠 Hébergements
        </h4>

        <ul style="
          list-style:none;
          padding:0;
          margin:0;
          color:#b8c5cc;
          font-size:0.76rem;
          line-height:1.5;
        ">
          <li><a href="hotels.html" style="color:#b8c5cc;text-decoration:none;">Tunis</a></li>
          <li><a href="hotels.html" style="color:#b8c5cc;text-decoration:none;">Sousse</a></li>
          <li><a href="hotels.html" style="color:#b8c5cc;text-decoration:none;">Djerba</a></li>
          <li><a href="hotels.html" style="color:#b8c5cc;text-decoration:none;">Maisons d'hôtes</a></li>
        </ul>
      </div>

      <div>
        <h4 style="
          font-weight:bold;
          margin-bottom:0.5rem;
          color:#f4a261;
          font-size:0.9rem;
        ">
          ⭐ Services
        </h4>

        <ul style="
          list-style:none;
          padding:0;
          margin:0;
          color:#b8c5cc;
          font-size:0.76rem;
          line-height:1.5;
        ">
          <li><a href="avis.html" style="color:#b8c5cc;text-decoration:none;">Avis</a></li>
          <li><a href="avis-personnel.html" style="color:#b8c5cc;text-decoration:none;">Réservations</a></li>
          <li><a href="#" style="color:#b8c5cc;text-decoration:none;">Guide</a></li>
          <li><a href="#" style="color:#b8c5cc;text-decoration:none;">Transfert</a></li>
        </ul>
      </div>

      <div>
        <h4 style="
          font-weight:bold;
          margin-bottom:0.5rem;
          color:#f4a261;
          font-size:0.9rem;
        ">
          📞 Contact
        </h4>

        <ul style="
          list-style:none;
          padding:0;
          margin:0;
          color:#b8c5cc;
          font-size:0.76rem;
          line-height:1.6;
        ">
          <li>📧 contact@stayease.tn</li>
          <li>📞 +216 55 123 456</li>
          <li>📍 Tunis</li>
        </ul>
      </div>

    </div>

    <div style="
      text-align:center;
      padding-top:0.6rem;
      border-top:1px solid rgba(244,162,97,0.25);
    ">
      <p style="
        color:#8a9aa6;
        font-size:0.72rem;
        margin:0;
      ">
        © 2026 StayEase |
        <a href="#" style="color:#b8c5cc;">Mentions légales</a> |
        <a href="#" style="color:#b8c5cc;">Confidentialité</a>
      </p>
    </div>

  </div>
</footer>
`;
var currentLang = localStorage.getItem('lang') || 'FR';

setTimeout(function() {
  console.log('Setting navbar and footer after timeout');
  var navContainer = document.getElementById('navbar');
  if (navContainer) navContainer.innerHTML = navbarHTML;
  
  var footerContainer = document.getElementById('footer');
  console.log('footerContainer:', footerContainer);
  if (footerContainer) {
    console.log('Setting footer HTML');
    footerContainer.innerHTML = footerHTML;
  } else {
    console.log('Footer container NOT found');
  }
  
  updateUserDisplay();
}, 500);

function updateUserDisplay() {
  var userName = document.getElementById('user-name');
  var authBtn = document.getElementById('auth-btn');
  var navUpdate = document.getElementById('nav-update');
  var user = localStorage.getItem('user');
  
  if (!user) {
    if (userName) userName.style.display = 'none';
    if (authBtn) { authBtn.textContent = 'Connexion'; authBtn.onclick = function() { window.location.href = 'connexion.html'; }; }
    if (navUpdate) navUpdate.style.display = 'none';
    return;
  }
  
  try {
    var userData = JSON.parse(user);
    var name = ((userData.prenom || '') + ' ' + (userData.nom || '')).trim().toUpperCase();
    
    if (userName) {
      userName.textContent = name || userData.email || '';
      userName.style.display = name ? 'inline' : 'none';
    }
    if (authBtn) {
      authBtn.textContent = 'Déconnexion';
      authBtn.onclick = logout;
    }
    if (navUpdate && userData.role === 'proprietaire') {
      navUpdate.style.display = 'inline';
    }
  } catch(e) {
    if (userName) userName.style.display = 'none';
    if (authBtn) { authBtn.textContent = 'Connexion'; authBtn.onclick = function() { window.location.href = 'connexion.html'; }; }
    if (navUpdate) navUpdate.style.display = 'none';
  }
}

function handleAuth() {
  var user = localStorage.getItem('user');
  if (user) {
    logout();
  } else {
    window.location.href = 'connexion.html';
  }
}

function logout() {
  localStorage.removeItem('user');
  window.location.href = 'index.html';
}

