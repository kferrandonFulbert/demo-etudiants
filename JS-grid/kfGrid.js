class kfGrid{
	/**
	* Create a grid 
	* 
	*/
	constructor(idContainer, nbRows, nbCols, size=50){
		this.container = document.getElementById(idContainer);
		this.rows = nbRows;
		this.cols = nbCols;
		this.size = size;
		document.write(this.addCss());
		this.makeRows();
	}
	/**
	* Draw the grid
	*/
	makeRows() {
		this.container.style.setProperty('--grid-rows', this.rows);
		this.container.style.setProperty('--grid-cols', this.cols);
		for (let c = 0; c < (this.rows * this.cols); c++) {
			let cell = document.createElement("div");
			cell.id="gridElement-"+c;
			/*cell.width=this.size;
			cell.innerText = (c + 1);*/
			this.container.appendChild(cell).className = "grid-item";
		};
	};
	/**
	* Add css for grid usability
	*/
	addCss(){
	return	`<style>:root {
  --grid-cols: 1;
  --grid-rows: 1;
}

#container {
  display: grid;
 /* grid-gap: 1em;*/
  grid-template-rows: repeat(var(--grid-rows), 1fr);
  grid-template-columns: repeat(var(--grid-cols), 1fr);
}

.grid-item {
  padding: 1em;
  border: 1px solid #ddd;
  text-align: center;
}</style>`;
	}
/**
 * Add Node Element to our grid.
 * 
 * @param {int} id - id represent the number of the grid element you want to add the object.
 * @param {nodeElement} obj - The element to add in the grid.
 */
	addObject(id, obj){
		if(obj.nodeType==1){
			document.getElementById("gridElement-"+id).appendChild(obj);
		}else{
			throw "obj must be a nodeElement type";
		}
	}
	/**
 * Add Image to our grid.
 * 
 * @param {int} id - id represent the number of the grid element you want to add the object.
 * @param {string} src - The pathname image.
 * @param {string} content - add Text Content on title attribute image if you need it. 
 */
	addImage(id, src, content=""){
		let elt = document.createElement("img");
	/*	elt.onclick=function(){this.src=src};
		elt.src = "carte.png";*/
		elt.src = src;
		elt.style.width = "100%";
		elt.style.height = "100%";
		elt.setAttribute("title",content);
		document.getElementById("gridElement-"+id).appendChild(elt);
	}
}