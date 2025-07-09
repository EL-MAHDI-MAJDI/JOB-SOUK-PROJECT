// Liste des principales villes marocaines
const villesMarocaines = [
    "Agadir",
    "Al Hoceïma",
    "Azrou",
    "Béni Mellal",
    "Berkane",
    "Berrechid",
    "Casablanca",
    "Chefchaouen",
    "Dakhla",
    "El Jadida",
    "Errachidia",
    "Essaouira",
    "Fès",
    "Ifrane",
    "Kénitra",
    "Khémisset",
    "Khouribga",
    "Laâyoune",
    "Larache",
    "Marrakech",
    "Meknès",
    "Mohammedia",
    "Nador",
    "Ouarzazate",
    "Oued Zem",
    "Oujda",
    "Rabat",
    "Safi",
    "Salé",
    "Tanger",
    "Taza",
    "Tétouan"
];

// Attendre que le DOM soit complètement chargé
document.addEventListener('DOMContentLoaded', function() {
    // Gestion du bouton retour en haut
    const scrollToTopBtn = document.getElementById('scrollToTop');
    
    if (scrollToTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) {
                scrollToTopBtn.classList.add('visible');
            } else {
                scrollToTopBtn.classList.remove('visible');
            }
        });
        
        scrollToTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Récupérer les éléments nécessaires
    const villeInput = document.getElementById('ville');
    const suggestionsDiv = document.getElementById('suggestions-ville');

    // S'assurer que les éléments existent
    if (villeInput && suggestionsDiv) {
    // Ajouter l'écouteur d'événement
    villeInput.addEventListener('input', function() {
        afficherSuggestions(this.value);
    });
    
    // Cacher les suggestions quand on clique ailleurs
    document.addEventListener('click', function(event) {
        if (event.target !== villeInput && !suggestionsDiv.contains(event.target)) {
            suggestionsDiv.style.display = 'none';
        }
        });
    } else {
    console.error("Éléments d'autocomplétion non trouvés dans le DOM");
    }
});

// Fonction pour afficher les suggestions
function afficherSuggestions(inputValue) {
    const suggestionsDiv = document.getElementById('suggestions-ville');
    suggestionsDiv.innerHTML = ''; // Efface les suggestions précédentes

  console.log("Recherche de suggestions pour:", inputValue); // Débogage

    if (inputValue.length > 0) {
    const suggestions = villesMarocaines.filter(ville =>
        ville.toLowerCase().startsWith(inputValue.toLowerCase())
    );

    console.log("Suggestions trouvées:", suggestions); // Débogage

    if (suggestions.length > 0) {
        suggestions.forEach(ville => {
        const suggestionItem = document.createElement('div');
        suggestionItem.classList.add('suggestion-item');
        suggestionItem.textContent = ville;
        suggestionItem.addEventListener('click', function() {
            document.getElementById('ville').value = ville;
            suggestionsDiv.style.display = 'none'; // Cacher les suggestions après sélection
        });
        suggestionsDiv.appendChild(suggestionItem);
        });
        suggestionsDiv.style.display = 'block';
    } else {
        const noResultItem = document.createElement('div');
        noResultItem.classList.add('suggestion-item');
        noResultItem.textContent = 'Aucune ville trouvée.';
        suggestionsDiv.appendChild(noResultItem);
        suggestionsDiv.style.display = 'block';
    }
    } else {
        suggestionsDiv.style.display = 'none';
    }
}
/*
document.addEventListener('DOMContentLoaded', function() {
    // Gestion du bouton retour en haut
    const scrollToTopBtn = document.getElementById('scrollToTop');
    
    if (scrollToTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) {
                scrollToTopBtn.classList.add('visible');
            } else {
                scrollToTopBtn.classList.remove('visible');
            }
        });
        
        scrollToTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
*/
