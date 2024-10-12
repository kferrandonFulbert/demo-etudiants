const container = document.querySelector(".container")
const coffees = [
  { name: "Terre", image: "images/terre.png", description:"" },
  { name: "Mars", image: "images/mars.png", description:"" },
  { name: "Venus", image: "images/venus.png", description:"" },
  { name: "Uranus", image: "images/uranus.png", description:"" },
  { name: "Saturne", image: "images/saturne.png", description:"" },
  { name: "Jupiter", image: "images/jupiter.png", description:"" },
  { name: "Mercure", image: "images/mercure.png", description:"" },
];

const showCoffees = () => {
  let output = ""
  coffees.forEach(
    ({ name, image }) =>
      (output += `
              <div class="card" id="${name}">
                <img class="card--avatar" src=${image} />
                <h1 class="card--title">${name}</h1>
                <a class="card--link" href="#${name}">Description</a>
              </div>
              `)
  )
  container.innerHTML = output
}

document.addEventListener("DOMContentLoaded", showCoffees)

if ("serviceWorker" in navigator) {
  window.addEventListener("load", function() {
    navigator.serviceWorker
      .register("./js/serviceworker.js")
      .then(res => console.log("service worker registered"))
      .catch(err => console.log("service worker not registered", err))
  })
}