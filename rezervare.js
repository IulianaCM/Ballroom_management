document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('tip_eveniment').addEventListener('change', function() {
        afiseazaOptiuniMeniu();
    });

    document.getElementById('data_eveniment').addEventListener('change', function() {
        valoareDataAcceptata();
        afiseazaOptiuniSalon();
        afisareOptiuniFotografi();
    });

    document.getElementById('ora_incepere').addEventListener('change', function() {
        valoareOraAcceptata();
        afiseazaOptiuniSalon();
        afisareOptiuniFotografi();
    });

    document.getElementById('preferinta_locuri').addEventListener('change', function() {
        afiseazaOptiuni("preferinta_locuri", "preferinta_locuri_options");
    });

    document.getElementById('preferinta_cost').addEventListener('change', function() {
        afiseazaOptiuni("preferinta_cost", "preferinta_cost_options");
    });

    document.getElementById('preferinta_cost_foto').addEventListener('change', function() {
        afiseazaOptiuni("preferinta_cost_foto", "preferinta_foto_options");
    });

    document.getElementById('preferinta_cost_meniu').addEventListener('change', function() {
        afiseazaOptiuni("preferinta_cost_meniu", "preferinta_meniu_options");
    });
});

function afiseazaOptiuniMeniu() {
    var tipEvenimentSelectat = document.getElementById('tip_eveniment').value;
    var costPreferat = document.getElementById('costMeniu').value || 0; // Obține valoarea introdusă sau folosește 0 dacă nu s-a introdus nimic
    var container = document.getElementById('informatii-container');
    container.innerHTML = '';

    if (tipEvenimentSelectat !== '-') {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {

                if (xhr.status == 200) {
                    var options = JSON.parse(xhr.responseText);

                    // Crează și adaugă dropdown-ul dinamic
                    var label = document.createElement('label');
                    label.textContent = 'Selectați un meniu:';
                    label.setAttribute('for', 'dinamic_select');
                    container.appendChild(label);

                    var select = document.createElement('select');
                    select.id = 'dinamic_select';
                    select.name = 'dinamic_select';

                    // Adaugă opțiunea "-"
                    var optionDefault = document.createElement('option');
                    optionDefault.value = '-';
                    optionDefault.text = '-';
                    select.appendChild(optionDefault);

                    for (var i = 0; i < options.length; i++) {
                        var option = document.createElement('option');
                        option.value = options[i].Meniu;
                        option.text = options[i].Meniu;
                        select.appendChild(option);
                    }

                    container.appendChild(select);

                    // Crează și adaugă tabelul
                    var table = document.createElement('table');
                    table.border = '1';
                    table.id = 'dynamic_table';

                    var headerRow = document.createElement('tr');
                    for (var key in options[0]) {
                        var th = document.createElement('th');
                        th.textContent = key;
                        headerRow.appendChild(th);
                    }
                    table.appendChild(headerRow);

                    for (var i = 0; i < options.length; i++) {
                        var row = document.createElement('tr');
                        for (var key in options[i]) {
                            var td = document.createElement('td');
                            td.textContent = options[i][key];
                            row.appendChild(td);
                        }
                        table.appendChild(row);
                    }

                    // Adaugă tabelul la container
                    container.appendChild(table);

                    // Adaugă un listener pentru a asculta schimbările în dropdown
                    select.addEventListener('change', function () {
                        var existingTable = document.getElementById('dynamic_table');
                        if (select.value !== '-') {
                            // Dacă se selectează o opțiune diferită de "-", șterge tabelul
                            if (existingTable) {
                                container.removeChild(existingTable);
                            }
                        }
                    });
                } else {
                    container.innerHTML = 'Eroare la obținerea opțiunilor.';
                }
            }
        };

        // Obține valoarea selectată din dropdown-ul cu id-ul 'operator_meniu'
        var operatorMeniuSelect = document.getElementById('operator_meniu');
        var operatorMeniu = operatorMeniuSelect.options[operatorMeniuSelect.selectedIndex].value;

        // Realizează maparea între selecție și operatorul corespunzător
        var operatorMapping = {
            'egal_cu': '=',
            'mai_mult_de': '>=',
            'mai_putin_de': '<='
        };

        // Obține operatorul corespunzător
        var operatorPentruMeniu = operatorMapping[operatorMeniu];

        var sql = "SELECT Denumire AS Meniu, Gustare_rece AS 'Gustare rece', Peste AS Pește, Traditional AS Tradițional, Grill, Tort, Candy_bar AS 'Candy bar', Bauturi AS Băuturi, Pret AS Preț FROM Meniu WHERE Pret " + operatorPentruMeniu + " " + costPreferat + " AND Tip_Eveniment = '" + tipEvenimentSelectat + "'";
        console.log(sql);
        xhr.open("GET", "procesare_query.php?sql=" + encodeURIComponent(sql), true);
        xhr.send();
    }
}

function valoareDataAcceptata() {
    // Obține elementul input de tip date și valoarea introdusă
    var dataEveniment = document.getElementById("data_eveniment");
    var dataAleasa = dataEveniment.value;

    // Obține data curentă în format YYYY-MM-DD
    var dataCurenta = new Date().toISOString().split('T')[0];

    // Verifică dacă data aleasă este în viitor
    if (dataAleasa < dataCurenta) {
        alert("Vă rugăm să alegeți o dată viitoare.");
        // Resetați valoarea la gol
        dataEveniment.value = "";
    }
}

function valoareOraAcceptata() {
    // Obține elementul input de tip date și time și valoarea introdusă
    var dataEveniment = document.getElementById("data_eveniment");
    var dataAleasa = dataEveniment.value;
    var oraIncepere = document.getElementById("ora_incepere");
    var oraAleasa = oraIncepere.value;

    // Obține data curentă în format YYYY-MM-DD și ora curentă
    var dataCurenta = new Date().toISOString().split('T')[0];
    var oraCurenta = new Date().toLocaleTimeString('en-US', {hour12: false});

    // Verifică dacă ora aleasă este în viitor cand este data curentă
    if (dataAleasa === dataCurenta) {
        if (oraAleasa < oraCurenta) {
            alert("Vă rugăm să alegeți o oră ulterioară.");
            // Resetați valoarea la gol
            oraIncepere.value = "";
        }
    }
}

function afiseazaOptiuniSalon() {
    var dataEveniment = document.getElementById('data_eveniment').value;
    var oraIncepere = document.getElementById('ora_incepere').value;
    var numarLocuriInput = document.getElementById('numar_locuri').value || 0; // Obține valoarea introdusă sau folosește 0 dacă nu s-a introdus nimic
    var costPreferat = document.getElementById('cost').value || 0; // Obține valoarea introdusă sau folosește 0 dacă nu s-a introdus nimic
    var container = document.getElementById('informatii-container-1');
    container.innerHTML = '';

    // Verifică dacă data și ora au fost selectate
    if (dataEveniment && oraIncepere) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {

                if (xhr.status == 200) {
                    var options = JSON.parse(xhr.responseText);

                    // Crează și adaugă dropdown-ul dinamic
                    var label = document.createElement('label');
                    label.textContent = 'Selectați un salon:';
                    label.setAttribute('for', 'dinamic_select_1');
                    container.appendChild(label);

                    var select = document.createElement('select');
                    select.id = 'dinamic_select_1';
                    select.name = 'dinamic_select_1';

                    // Adaugă opțiunea "-"
                    var optionDefault = document.createElement('option');
                    optionDefault.value = '-';
                    optionDefault.text = '-';
                    select.appendChild(optionDefault);

                    for (var i = 0; i < options.length; i++) {
                        var option = document.createElement('option');
                        option.value = options[i].Salon;
                        option.text = options[i].Salon;
                        select.appendChild(option);
                    }

                    container.appendChild(select);

                    // Crează și adaugă tabelul
                    var table = document.createElement('table');
                    table.border = '1';
                    table.id = 'dynamic_table_1';

                    var headerRow = document.createElement('tr');
                    for (var key in options[0]) {
                        var th = document.createElement('th');
                        th.textContent = key;
                        headerRow.appendChild(th);
                    }
                    table.appendChild(headerRow);

                    for (var i = 0; i < options.length; i++) {
                        var row = document.createElement('tr');
                        for (var key in options[i]) {
                            var td = document.createElement('td');
                            td.textContent = options[i][key];
                            row.appendChild(td);
                        }
                        table.appendChild(row);
                    }

                    // Adaugă tabelul la container
                    container.appendChild(table);

                    // Adaugă un listener pentru a asculta schimbările în dropdown
                    select.addEventListener('change', function () {
                        var existingTable = document.getElementById('dynamic_table_1');
                        if (select.value !== '-') {
                            // Dacă se selectează o opțiune diferită de "-", șterge tabelul
                            if (existingTable) {
                                container.removeChild(existingTable);
                            }
                        }
                    });
                } else {
                    container.innerHTML = 'Eroare la obținerea opțiunilor.';
                }
            }
        };

        // Obține valoarea selectată din dropdown-ul cu id-ul 'operator_locuri'
        var operatorLocuriSelect = document.getElementById('operator_locuri');
        var operatorLocuri = operatorLocuriSelect.options[operatorLocuriSelect.selectedIndex].value;

        // Obține valoarea selectată din dropdown-ul cu id-ul 'operator_cost'
        var operatorCostSelect = document.getElementById('operator_cost');
        var operatorCost = operatorCostSelect.options[operatorCostSelect.selectedIndex].value;

        // Realizează maparea între selecție și operatorul corespunzător
        var operatorMapping = {
            'egal_cu': '=',
            'mai_mult_de': '>=',
            'mai_putin_de': '<='
        };

        // Obține operatorul corespunzător
        var operatorPentruLocuri = operatorMapping[operatorLocuri];
        var operatorPentruCost = operatorMapping[operatorCost];

        // Afișare și selecție salon
        var sql = "SELECT S.Nume_Salon AS Salon, S.Descriere, S.Nr_locuri AS 'Număr de locuri', S.Cost_inchiriere AS 'Cost închiriere' FROM Salon S WHERE S.Nr_locuri " + operatorPentruLocuri + " " + numarLocuriInput + " AND S.Cost_inchiriere " + operatorPentruCost + " " + costPreferat + " AND NOT EXISTS (SELECT 1 FROM Eveniment E WHERE S.IDSalon = E.IDSalon AND DATE(E.Data_eveniment) = '" + dataEveniment + "');";
        xhr.open("GET", "procesare_query.php?sql=" + encodeURIComponent(sql), true);
        xhr.send();
    } else {
        container.innerHTML = 'Selectați data și ora pentru a afișa opțiunile.';
    }
}

function afiseazaOptiuni(preferintaCheckboxId, preferintaOptionsId) {
    // Verifică starea checkbox-ului pentru preferința costului
    var preferintaCheckbox = document.getElementById(preferintaCheckboxId);
    var preferintaOptions = document.getElementById(preferintaOptionsId);

    // Afișează/ascunde containerul cu opțiuni în funcție de starea checkbox-ului
    preferintaOptions.style.display = preferintaCheckbox.checked ? "block" : "none";
}

function afisareOptiuniFotografi() {
    var dataEveniment = document.getElementById('data_eveniment').value;
    var oraIncepere = document.getElementById('ora_incepere').value;
    var costPreferat = document.getElementById('foto').value || 0; // Obține valoarea introdusă sau folosește 0 dacă nu s-a introdus nimic
    var container = document.getElementById('informatii-container-2');
    container.innerHTML = '';

    // Verifică dacă data și ora au fost selectate
    if (dataEveniment && oraIncepere) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var options = JSON.parse(xhr.responseText);

                    // Crează și adaugă dropdown-ul dinamic
                    var label = document.createElement('label');
                    label.textContent = 'Selectați fotograf:';
                    label.setAttribute('for', 'dinamic_select_2');
                    container.appendChild(label);

                    var select = document.createElement('select');
                    select.id = 'dinamic_select_2';
                    select.name = 'dinamic_select_2';

                    // Adaugă opțiunea "-"
                    var optionDefault = document.createElement('option');
                    optionDefault.value = '-';
                    optionDefault.text = '-';
                    select.appendChild(optionDefault);

                    for (var i = 0; i < options.length; i++) {
                        var option = document.createElement('option');
                        option.value = options[i].Parteneri;
                        option.text = options[i].Parteneri;
                        select.appendChild(option);
                    }

                    container.appendChild(select);

                    // Crează și adaugă tabelul
                    var table = document.createElement('table');
                    table.border = '1';
                    table.id = 'dynamic_table_2';

                    var headerRow = document.createElement('tr');
                    for (var key in options[0]) {
                        var th = document.createElement('th');
                        th.textContent = key;
                        headerRow.appendChild(th);
                    }
                    table.appendChild(headerRow);

                    for (var i = 0; i < options.length; i++) {
                        var row = document.createElement('tr');
                        for (var key in options[i]) {
                            var td = document.createElement('td');
                            td.textContent = options[i][key];
                            row.appendChild(td);
                        }
                        table.appendChild(row);
                    }

                    // Adaugă tabelul la container
                    container.appendChild(table);

                    // Adaugă un listener pentru a asculta schimbările în dropdown
                    select.addEventListener('change', function () {
                        var existingTable = document.getElementById('dynamic_table_2');
                        if (select.value !== '-') {
                            // Dacă se selectează o opțiune diferită de "-", șterge tabelul
                            if (existingTable) {
                                container.removeChild(existingTable);
                            }
                        }
                    });
                } else {
                    container.innerHTML = 'Eroare la obținerea opțiunilor.';
                }
            }
        };

        // Obține valoarea selectată din dropdown-ul cu id-ul 'operator_foto'
        var operatorFotoSelect = document.getElementById('operator_foto');
        var operatorFoto = operatorFotoSelect.options[operatorFotoSelect.selectedIndex].value;

        // Realizează maparea între selecție și operatorul corespunzător
        var operatorMapping = {
            'egal_cu': '=',
            'mai_mult_de': '>=',
            'mai_putin_de': '<='
        };

        // Obține operatorul corespunzător
        var operatorPentruFoto = operatorMapping[operatorFoto];

        var sql = "SELECT F.Nume AS Parteneri, F.Nr_Contact AS 'Număr de contact', F.Cost_servicii AS 'Cost servicii' FROM Fotograf F WHERE F.Cost_servicii " + operatorPentruFoto + " " + costPreferat + " AND NOT EXISTS (SELECT 1 FROM Eveniment E WHERE F.IDFotograf = E.IDFotograf AND DATE(E.Data_eveniment) = '" + dataEveniment + "');";
        xhr.open("GET", "procesare_query.php?sql=" + encodeURIComponent(sql), true);
        xhr.send();
    } else {
        container.innerHTML = 'Selectați data și ora pentru a afișa opțiunile.';
    }
}