$.ajax({
    type: "GET", dataType: 'JSON', url: "router.php?api=rubrique",
    success: function (data_rubrique) {

        console.log(data_rubrique);

        // Sélection de l'élément ul
        let sectionList = document.getElementById("sectionList");

        // Création des nouveaux éléments li basés sur les données
        data_rubrique.forEach(rubrique => {
            let newListItem = document.createElement("li");
            let anchor = document.createElement("a");
            anchor.href = `#${rubrique.nom.replace(/\s+/g, '-')}`;
            anchor.textContent = rubrique.nom;
            anchor.setAttribute("data-valeur", rubrique.id);

            newListItem.appendChild(anchor);

            // Insérer les nouveaux éléments avant le premier élément existant dans la liste
            let firstExistingItem = sectionList.firstChild;
            sectionList.insertBefore(newListItem, firstExistingItem);
        });

        let mainDiv = document.getElementById("main")

        data_rubrique.forEach(rubrique => {

            $.ajax({
                type: "GET", dataType: 'JSON', url: "router.php?api=element&id=" + rubrique.id,
                success: function (data_element) {
                    console.log(data_element);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    },
    error: function (data) {
        console.log(data);
    }
});
