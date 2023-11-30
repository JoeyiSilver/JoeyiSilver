
const menu = document.querySelector('#mobile-menu');
const menuLinks = document.querySelector('.navbar__menu');

menu.addEventListener('click', function() {
    menu.classList.toggle('is-active');
    menuLinks.classList.toggle('active');
});

// Event Listener für den "Get Started" Button
document.getElementById('get-started-btn').addEventListener('click', function() {
    document.querySelector('.main_content').style.display = 'none';
    document.querySelector('.bike-configurator').style.display = 'block';
});

// Event Listener für den "Konfiguration speichern" Button
document.getElementById('save-config-btn').addEventListener('click', function() {
    const selectedFrame = document.getElementById('frame').value;
    // Hier: Auslesen der ausgewählten Teile für Räder, Bremsen, Schaltung usw.
    
    // Beispiel: Anzeige der ausgewählten Teile in der Konfiguration
    const selectedPartsList = document.getElementById('selected-parts');
    selectedPartsList.innerHTML += `<li>Rahmen: ${selectedFrame}</li>`;
    // Hier: Hinzufügen der ausgewählten Teile zur Liste
});
