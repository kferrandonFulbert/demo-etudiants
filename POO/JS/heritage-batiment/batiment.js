class Batiment{
	constructor(uneAdresse, uneImg){
		this.adresse = uneAdresse;
		this.img = uneImg;
		this.id = Math.floor(Math.random() * 11111);
		console.log(uneImg);
	}

	getAdresse(){
		return this.adresse.toString();
	}

	affiche(){
		document.write(this.uneImg);
	}
	getImg(){
		return this.uneImg;
	}

	affAdresse(){
		alert(this.adresse);
	}

	getId(){
		return this.id;
	}
	aff(residence){
		let elt = document.getElementById(residence);
		this.monimg = document.createElement("img");

		this.monimg.setAttribute("src", this.img);
		this.monimg.setAttribute("width", "300px");
		this.monimg.setAttribute("height","300px");
		this.monimg.addEventListener("click", ()=>{alert(this.adresse)});
		elt.appendChild(this.monimg);
	}

}

class Maison extends Batiment{
	uneImg = "maison.png";
	//uneImg = `<img src="maison.png" width="150px" title=${this.getAdresse()} id=${this.getId()} </img>`;
	constructor(uneAdresse, unNbpieces)
	{
		super(uneAdresse, "maison.png");
		this.nbpieces = unNbpieces;		
	}
	affAdresse(){
		super.affAdresse();
	}
	
}

class Hopital extends Batiment{
	uneImg = "hopital.png";
	//uneImg = `<img src='hopital.png' height='600px' title=${this.getAdresse()} id=${this.getId()} >`;
	constructor(uneAdresse, unNbService )
	{
		super(uneAdresse, "hopital.png");
		this.nbservice = unNbService;
	}

}

class Immeuble extends Batiment{
	uneImg = "immeuble.png";
	//uneImg = `<img src='immeuble.png' height='400px' title=${this.getAdresse()} id=${this.getId()} >`;
	constructor(uneAdresse, unNbEtage)
	{
		super(uneAdresse, "immeuble.png");
		this.nbetage = unNbEtage;
	}
	affAdresse(){
		super.affAdresse();
		alert(`Ce bâtiment possede ${this.nbetage} Étages`)
	}
}

class Caserne extends Batiment{
	uneImg = "caserne.png";
	//uneImg = `<img src='caserne.png' height='300px' title=${this.getAdresse()} id=${this.getId()} >`;
	constructor(uneAdresse, unNbpieces, uneImg)
	{
		super(uneAdresse, unNbpieces, uneImg);
	}

}