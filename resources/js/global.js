function ajoutPanier(id_client, id_article, qte){
	var stock = $("#stock").text();
	var qte = $("#qte").val();
	var article = $("#idarticle").val();
	console.log(qte + "/" + stock + "->" + article);
	if(qte > stock){
		alert("Il n'y a plus que " + stock + " pièces en stock pour le moment.");
		return;
	}

	request(readData, qte, article);
}

function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}

function request(callback, qte, article) {
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			callback(xhr.responseText);
		}
	};
	
	var textQte = encodeURIComponent(qte);
	var textArticle = encodeURIComponent(article);
	xhr.open("POST", "index.php?section=ajax&action=ajoutPanier", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("Qte="+textQte + "&article="+textArticle);
}

function readData(sData) {
	// On peut maintenant traiter les données sans encombrer l'objet XHR
	console.log(sData);
}

function addItemToBasket(id_client, id_article)
{
    qte = $("#qte"+id_article).val();

    $.ajax({
        type: "POST",
        url: "index.php?section=ajax&action=ajoutPanier",
        data: "id_article="+id_article + "&id_client="+id_client+ "&qte="+qte,
        success: function( data ) {
            alert( "Le produit a bien été ajouté au panier");
            }
    });

}