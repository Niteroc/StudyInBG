$.ajax({
    type: "GET", dataType: 'JSON', url: "index.php?api=rubriquenotempty", success: function (data_rubrique) {

        // Sélection de l'élément ul
        let sectionList = document.getElementById("sectionList");
        let main = document.getElementById("main")

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

            let article = document.createElement("article");
            article.setAttribute("id", rubrique.nom);

            let h2 = document.createElement("h2");
            h2.className = "major";
            h2.innerText = rubrique.nom;
            article.appendChild(h2);

            let p = document.createElement("p");
            p.textContent = rubrique.description;
            article.appendChild(p);

            $.ajax({
                type: "GET",
                dataType: 'JSON',
                url: "index.php?api=element&id=" + rubrique.id,
                success: function (data_element) {

                    data_element.forEach((element, index, array) => {

                        let div = document.createElement("div");
                        // Modification des propriétés CSS
                        div.style.display = 'inline-block'; // Propriété display
                        div.style.overflow = 'hidden'; // Propriété overflow

                        let h3 = document.createElement("h3");
                        h3.class = "minor";
                        h3.innerText = element.nom;
                        div.appendChild(h3);

                        let img = document.createElement("img");
                        img.src = "data:image/gif;base64," + element.image;
                        img.id = "rightvid";
                        div.appendChild(img);

                        let blockquote = document.createElement("blockquote");
                        blockquote.innerText = "Adresse : " + element.adresse;
                        div.appendChild(blockquote);

                        let p = document.createElement("p");
                        if (element.description === "") {
                            p.innerText = "Aucune description présente";
                        } else {
                            p.innerText = element.description;
                        }
                        div.appendChild(p);

                        if (index !== (array.length - 1)) {
                            let hr = document.createElement("hr");
                            div.appendChild(hr);
                        }

                        article.appendChild(div);

                        loadJS('front/assets/js/util.js');
                        loadJS('front/assets/js/main.js');
                    });
                },
                error: function (data) {
                    console.log(data);
                }
            });

            main.appendChild(article);
        });
    }, error: function (data) {
        console.log(data);
    }
});

var loadJS = function (url) {
    //url is URL of external file, implementationCode is the code
    //to be called from the file, location is the location to
    //insert the <script> element

    var scriptTag = document.createElement('script');
    scriptTag.src = url;
    document.body.appendChild(scriptTag);
};
