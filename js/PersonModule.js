class Personne {
    constructor(unNom, uneAdresse, unCP, uneVille) {
        this.nom = unNom;
        this.adresse = uneAdresse;
        this.cp = unCP;
        this.ville = uneVille;
    }
    static template(callback){
        return `
        <form id='personForm'>
        <div class="form-group">
        <label for='nom'>Nom</label>
        <input class="form-control" type='text' id='nom' />
        <label for='adress'>Adresse</label>
        <input class="form-control" type='text' id='adresse' />
        <label for='cp'>code postal</label>
        <input class="form-control" type='text' id='cp' />
        <label for='ville'>ville</label>
        <input class="form-control" type='text' id='ville' />
        `;
    }
}
class Client extends Personne {
    constructor(unNom, uneAdresse, unCP, uneVille, unPrenom, unNumSecu) {
        super(unNom, uneAdresse, unCP, uneVille);
        this.prenom = unPrenom;
        this.secu = unNumSecu;
    }
    static template(callback){
        let html = super.template(callback);
        return `${html}
        <input type='hidden' value='client' id='type' />
        <label for='prenom'>Prenom</label>
        <input type='text' class="form-control" id='prenom' />
        <label for='secu'>N° Secu</label>
        <input type='text' class="form-control" id='secu' />
        
        <input type='button' class="btn btn-primary btn-lg btn-block" id='btnValid' value="valider" />
        </div>
        </form>
        `;
    }
}
class Fournisseur extends Personne {
    constructor(unNom, uneAdresse, unCP, uneVille, unSIRET, unStatut, unCodeNAF) {
        super(unNom, uneAdresse, unCP, uneVille);
        this.SIRET = unSIRET;
        this.statut = unStatut;
        this.codeNAF = unCodeNAF;
    }
    static template(callback){
        let html = super.template(callback);
        return `${html}
        <input type='hidden' value='frs' id='type' />
        <label for='siret'>SIRET</label>
        <input type='text' class="form-control" id='siret' />
        <label for='statut'>statut</label>
        <input type='text' class="form-control" id='statut' />
        <input type='button' class="btn btn-primary btn-lg btn-block" id='btnValid' value="valider" />
       </div>
        </form>
        `;
    }
}

class ClientView {
    constructor(unClient) {
        this.client = unClient;
    }
   
}

export { Client, Fournisseur }