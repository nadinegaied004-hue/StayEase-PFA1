// Common Components - Navbar and Footer
const navbarHTML = `<nav style="position:fixed;top:0;left:0;right:0;z-index:50;background:white;box-shadow:0 4px 20px rgba(0,0,0,0.06);">
  <div style="max-width:1200px;margin:0 auto;padding:0.75rem 1rem;display:flex;justify-content:space-between;align-items:center;">
    <a href="index.html" style="text-decoration:none;">
      <span style="font-size:1.5rem;font-weight:bold;color:#e67e22;">StayEase</span>
    </a>
    <div style="display:flex;gap:0.5rem;">
      <a href="index.html" style="padding:0.5rem 1rem;border-radius:50px;color:#292524;font-weight:500;text-decoration:none;">Accueil</a>
      <a href="hotels.html" style="padding:0.5rem 1rem;border-radius:50px;color:#292524;font-weight:500;text-decoration:none;">Logements</a>
      <a href="avis.html" style="padding:0.5rem 1rem;border-radius:50px;color:#292524;font-weight:500;text-decoration:none;">Avis</a>
    </div>
    <div id="user-section" style="display:flex;gap:0.75rem;align-items:center;"></div>
  </div>
</nav>`;

const footerHTML = `<footer style="background-color:#264653;color:white;padding:2rem 0;margin-top:auto;">
  <div style="max-width:100%;margin:0 auto;padding:0;">
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;">
      <div>
        <h3 style="font-size:1.25rem;font-weight:bold;color:white;margin-bottom:0.5rem;">StayEase</h3>
        <p style="color:#ccc;">Votre plateforme.</p>
      </div>
      <div>
        <h4 style="font-weight:bold;color:white;margin-bottom:0.5rem;">Decouvrir</h4>
        <ul style="list-style:none;padding:0;margin:0;">
          <li><a href="hotels.html" style="color:#ccc;text-decoration:none;">Hebergements</a></li>
          <li><a href="avis.html" style="color:#ccc;text-decoration:none;">Avis</a></li>
        </ul>
      </div>
      <div>
        <h4 style="font-weight:bold;color:white;margin-bottom:0.5rem;">Contact</h4>
        <ul style="list-style:none;padding:0;margin:0;color:#ccc;">
          <li>contact@stayease.tn</li>
        </ul>
      </div>
      <div>
        <h4 style="font-weight:bold;color:white;margin-bottom:0.5rem;">Newsletter</h4>
        <p style="color:#ccc;">Offres</p>
      </div>
    </div>
  </div>
</footer>`;

window.onload = function() {
  var nav = document.getElementById('navbar-container');
  var footer = document.getElementById('footer-container');
  
  if (nav && nav.innerHTML.trim() === '') {
    nav.innerHTML = navbarHTML;
  }
  if (footer && footer.innerHTML.trim() === '') {
    footer.innerHTML = footerHTML;
  }
  
  setTimeout(updateUserSection, 100);
};

function updateUserSection() {
  var userStr = localStorage.getItem('user');
  var section = document.getElementById('user-section');
  
  if (!section) {
    return;
  }
  
  if (!userStr) {
    section.innerHTML = '<a href="connexion.html" style="padding:0.5rem 1rem;background:#e67e22;color:white;border-radius:50px;font-weight:600;text-decoration:none;">Se connecter</a>';
    return;
  }
  
  var user = JSON.parse(userStr);
  
  if (!user.email && !user.role) {
    section.innerHTML = '<a href="connexion.html" style="padding:0.5rem 1rem;background:#e67e22;color:white;border-radius:50px;font-weight:600;text-decoration:none;">Se connecter</a>';
    return;
  }
  
  var fullName = '';
  if (user.nom) fullName += user.nom;
  if (user.prenom) fullName += ' ' + user.prenom;
  if (!fullName.trim()) fullName = user.email || 'User';
  
  section.innerHTML = '<span style="margin-right:8px;">' + fullName + '</span><button onclick="logout()" style="color:red;border:none;background:none;cursor:pointer;">Deconnexion</button>';
}

function logout() {
  localStorage.removeItem('user');
  window.location.href = 'index.html';
}