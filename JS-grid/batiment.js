class Batiment{
	constructor(uneAdresse, uneImg){
		this.img =  document.createElement("img");
		this.adresse = uneAdresse;
		this.img.src = uneImg;
		this.img.title=uneAdresse;
		this.img.style.width="150px";
		this.img.style.height="150px";
		this.id = Math.floor(Math.random() * 11111);
		this.img.id = this.id;
		this.img.onclick = ()=>(this.affAdresse());
	}

	getAdresse(){
		return this.adresse.toString();
	}

	affiche(){
		document.write(this.uneImg);
	}
	getImage(){
		return this.img;
	}

	affAdresse(){
		alert(this.adresse);
	}

	getId(){
		return this.id;
	}

}

class Maison extends Batiment{
	
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
	constructor(uneAdresse, unNbService)
	{
		super(uneAdresse, "hopital.png");		
		this.nbservice = unNbService;
	}

}

class Immeuble extends Batiment{
	constructor(uneAdresse, unNbEtage)
	{
		super(uneAdresse, 'immeuble.png');
		this.nbetage = unNbEtage;
	}
	affAdresse(){
		super.affAdresse();
		alert(`Ce bâtiment possede ${this.nbetage} Étages`)
	}
}

class Caserne extends Batiment{
	constructor(uneAdresse, unNbpieces, )
	{
		super(uneAdresse,  'caserne.png');
	}

}