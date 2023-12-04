const deleteLine = function (type, id) {
    $.ajax({
        url: "index.php?api=suppr&type=" + type + "&id=" + id, success: function (data) {
        }, error: function (data) {
            console.log(data);
            alert("Erreur lors de la suppression");
        }
    });

};

const validLine = function (id) {
    $.ajax({
        url: "index.php?api=valid&id=" + id, success: function (data) {
        }, error: function (data) {
            console.log(data);
            alert("Erreur lors de la validation");
        }
    });

};

const invalidLine = function (id) {
    $.ajax({
        url: "index.php?api=invalid&id=" + id, success: function (data) {
        }, error: function (data) {
            console.log(data);
            alert("Erreur lors de l'invalidation");
        }
    });

};

$(".close").click(function (e) {
    const suppr = confirm("Voulez vous supprimer la ligne (" + this.getAttribute("tablename") + " n° " + this.id + ") ?");
    if (!suppr) return;
    deleteLine(this.getAttribute("tablename"), this.id)
    setTimeout(function(){
        window.location.reload();
    }, 1000);
});

$(".valid").click(function (e) {
    const valid = confirm("Voulez vous valider cet élément (" + this.getAttribute("tablename") + " n° " + this.id + ") ?");
    if (!valid) return;
    validLine(this.id)
    setTimeout(function(){
        window.location.reload();
    }, 1000);
});

$(".invalid").click(function (e) {
    const invalid = confirm("Voulez vous invalider cet élément (" + this.getAttribute("tablename") + " n° " + this.id + ") ?");
    if (!invalid) return;
    invalidLine(this.id)
    console.log(this.id);
    setTimeout(function(){
        window.location.reload();
    }, 1000);
});

/*
$(".edit").dblclick(function () {
    const classe = $(this).attr('class');
    const label = "label[class='"+classe+"']";
    $.each($(label), function () {
        $(this).replaceWith("<input type='text' class='"+classe+"' value='"+$(this).text()+"'>");
    });
    //console.log($(this).attr('class'));
    //const form_data ='class=' + $(this).attr('class');
    //modifyLine('POST', 'JSON', form_data)
});

const modifyLine = function (form_type, form_datatype, form_data) {
    $.ajax({
        url: "/api/modifyLine",
        type: form_type,
        dataType: form_datatype,
        data: form_data,
        success: function (data) {
            console.log(data);
            switch (data) {
                case 0:
                    alert("Echec de la suppression");
                    break;
                case 1:
                    console.log("Suppression réussie");
                    break;
            }
        }, error: function (data) {
            console.log(data);
            alert("ERROR");
        }
    });

};
*/