const contenu = document.querySelector(".content");
const boutonEnvoyer = document.querySelector("#envoyer");
const name = document.querySelector("#name");
const address = document.querySelector("#adress");
const city = document.querySelector("#city");

boutonEnvoyer.addEventListener('click', ()=>{
  envoiRestaurant(name.value, address.value, city.value);
});

function afficheTout() {
  let url =
    "http://localhost/Back-end/ExamenApiPHP/?type=restaurant&action=index";
 fetch(url)
   .then((reponse) => reponse.json())
   .then((restaurants) => {
     console.log(restaurants);
     contenu.innerHTML = "";
     restaurants.forEach((restaurant) => {
       templateRestaurant = `
                <div>
                    <hr>
                        <h2> Restaurant : </h2>
                        <p><strong>${restaurant.name}</strong></p>
                        <p><strong>${restaurant.adress}</strong></p>
                        <p><strong>${restaurant.city}</strong></p>
                        <button id="${restaurant.id}" class="btn btn-danger boutonSuppr"><strong>X</strong></button>
                    <hr>
                </div>
            `;
       contenu.innerHTML += templateRestaurant;
     });
     document.querySelectorAll(".boutonSuppr").forEach((bouton) => {
       bouton.addEventListener('click', () => {
         supprimerRestaurant(bouton.id);
       });
     });
   });
}

function envoiRestaurant(nameRestaurant, addressRestaurant, cityRestaurant) {
  let url =
    "http://localhost/Back-end/ExamenApiPHP/?type=restaurant&action=new";

  let bodyRequete = {
    name: nameRestaurant,
    address: addressRestaurant,
    city: cityRestaurant,
  }
  let requete = {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(bodyRequete),
  };
  fetch(url, requete)
    .then((reponse) => reponse.json())
    .then((donnees) => {
      console.log(donnees)
      // afficheTout()
      // // document.querySelector("#name").value = "",
      // // document.querySelector("#adress").value = "",
      // // document.querySelector("#city").value = ""
    })
}

  function supprimerRestaurant(id) {
    let url =
      "http://localhost/Back-end/ExamenApiPHP/?type=restaurant&action=suppr";

    let bodyRequete = {
      id: id
    }
    let requete = {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(bodyRequete)
    }
    fetch(url, requete)
      .then((reponse) => reponse.json())
      .then((donnees) => {
        console.log(donnees)
        afficheTout()
      })
  }

  afficheTout();