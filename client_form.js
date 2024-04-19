function afiseazaInformatii() {
    var select = document.getElementById("preferinte");
    var selectValue = select.value;
    var infoContainer = document.getElementById("informatii-container");

    // Resetarea conținutului informatiilor
    infoContainer.innerHTML = "";

    // Ascunde dropdown-ul pentru tipul de meniu atunci când se revine la opțiunea "-"
    hideTipMeniuDropdown(); 

    // Afisarea informatiilor relevante in functie de selectie
    if (selectValue === "Salon") {
        afiseazaSalonInfo();
    } else if (selectValue === "Fotograf") {
        afiseazaFotografInfo();
    } else if (selectValue === "Meniu") {
        showTipMeniuDropdown();  // Afișează dropdown-ul pentru tipul de meniu
    }

    function showTipMeniuDropdown() {
        var tipMeniuLabel = document.getElementById("tip_meniu_label");
        var tipMeniuSelect = document.getElementById("tip_meniu");

        if (tipMeniuLabel && tipMeniuSelect) {
            tipMeniuLabel.style.display = "inline-block";
            tipMeniuSelect.style.display = "inline-block";
            
            tipMeniuSelect.addEventListener("change", afiseazaMeniuInfo);
        }
    }

    function hideTipMeniuDropdown() {
        document.getElementById("tip_meniu_label").style.display = "none";
        document.getElementById("tip_meniu").style.display = "none";
    }
}

// Implementează logica pentru a obține și afișa informațiile despre salon din baza de date
function afiseazaSalonInfo() {
    var sql = "SELECT Nume_Salon AS Salon, Descriere, Nr_locuri AS 'Număr de locuri' FROM Salon"; // Interogare SQL pentru informații despre salon
    performDatabaseQuery(sql);
}

// Implementează logica pentru a obține și afișa informațiile despre fotograf din baza de date
function afiseazaFotografInfo() {
    var sql = "SELECT Nume AS 'Firma parteneră', Nr_Contact AS 'Număr de contact' FROM Fotograf"; // Interogare SQL pentru informații despre fotograf
    performDatabaseQuery(sql);
}

// Implementează logica pentru a obține și afișa informațiile despre meniu din baza de date
function afiseazaMeniuInfo() {
    var tipMeniuSelect = document.getElementById("tip_meniu").value;

    // Interogare SQL pentru informații despre meniu, după selecția tipului de eveniment
    var sql = "SELECT Denumire AS Meniu, Gustare_rece AS 'Gustare rece', Peste AS Pește, Traditional AS Tradițional, Grill, Tort, Candy_bar AS 'Candy bar', Bauturi AS Băuturi FROM Meniu WHERE Tip_Eveniment = '" + tipMeniuSelect + "'";
    performDatabaseQuery(sql);
}

// Realizează interogarea către baza de date și afișează rezultatele
function performDatabaseQuery(sql) {
    var infoContainer = document.getElementById("informatii-container");

    // Creează un obiect XMLHttpRequest pentru a face o cerere către server
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
        // Verifică starea răspunsului HTTP
            if (xhr.status == 200) {
                // Răspunsul de la server (datele JSON)
                var response = JSON.parse(xhr.responseText);

                // Afișează rezultatele în container
                infoContainer.innerHTML = ""; // Curăță containerul înainte de a adăuga noi informații

                if (response.length > 0) {
                    var tableHTML = "<table border='1'><tr>";

                    // Crează headerul tabelului din prima linie a rezultatelor
                    for (var key in response[0]) {
                        tableHTML += "<th>" + key + "</th>";
                    }

                    tableHTML += "</tr>";

                    // Adaugă fiecare rând în tabel
                    for (var i = 0; i < response.length; i++) {
                        tableHTML += "<tr>";

                        for (var key in response[i]) {
                            tableHTML += "<td>" + response[i][key] + "</td>";
                        }

                        tableHTML += "</tr>";
                    }

                    tableHTML += "</table>";
                    infoContainer.innerHTML = tableHTML;
                }
            }
        }
    };

    // Configurare și trimitere cerere GET către server
    xhr.open("GET", "procesare_query.php?sql=" + encodeURIComponent(sql), true);
    xhr.send();
}
