function createIngressoItemList(ingresso) {
    var li = document.createElement("li");
    li.classList.add("list-group-item");

    var row = document.createElement("div");
    row.classList.add("row");
    row.style.padding = '1%';

    var col = document.createElement("div");
    col.classList.add("col-sm-10");
    col.classList.add("text-left");

    var desc = document.createElement("p");
    desc.innerHTML = ingresso.descricao;
    col.appendChild(desc);

    var precoContainer = document.createElement("p");
    precoContainer.innerHTML = "R$ ";

    var preco = document.createElement("a");
    preco.classList.add("preco");
    preco.innerHTML = ingresso.preco;
    precoContainer.appendChild(preco);

    col.appendChild(precoContainer);

    row.appendChild(col);

    var col2 = document.createElement("div");
    col2.classList.add("col-sm-2");
    col2.classList.add("text-center");
    
    var menos = document.createElement("button");
    menos.type = "button";
    menos.innerHTML = "-";
    menos.addEventListener("click", function() {
        var elemQnt = this.parentNode.getElementsByClassName("quantidadeIngressos")[0];
        var preco = this.parentNode.parentNode.getElementsByClassName("preco")[0];
        var valorTotal = document.getElementById("valor-total-ingressos");
        if(elemQnt.innerHTML > '0') {
            elemQnt.innerHTML--;
            valorTotal.innerHTML = parseInt(valorTotal.innerHTML) - parseInt(preco.innerHTML);
        }
    }, false);
    col2.appendChild(menos);

    var qntIngressos = document.createElement("a");
    qntIngressos.id = "qnt-ingresso-" + ingresso.id;
    qntIngressos.classList.add("quantidadeIngressos");
    qntIngressos.innerHTML = 0;
    qntIngressos.style.fontSize = "30px";
    qntIngressos.style.fontWeight = "bold";
    col2.appendChild(qntIngressos);

    var mais = document.createElement("button");
    mais.type = "button";
    mais.innerHTML = "+";
    mais.addEventListener("click", function() {
        var elemQnt = this.parentNode.getElementsByClassName("quantidadeIngressos")[0];
        var preco = this.parentNode.parentNode.getElementsByClassName("preco")[0];
        var valorTotal = document.getElementById("valor-total-ingressos");

        elemQnt.innerHTML++;
        valorTotal.innerHTML = parseInt(valorTotal.innerHTML) + parseInt(preco.innerHTML);
    }, false);
    col2.appendChild(mais);
    
    row.appendChild(col2);

    li.appendChild(row);

    return li
}

function selecionarEvento(evento) {
    document.getElementById('ingressos').style.display = "flex";
   
    document.getElementById('nome_evento').innerHTML = evento.nome;
    document.getElementById('tags_evento').innerHTML = "tags";
    document.getElementById('local_evento').innerHTML = "local";
    document.getElementById('datahora_evento').innerHTML = "datahora";
    document.getElementById('botao-visualizacoes').innerHTML = evento.visitas + " visualizacoes";
    document.getElementById('botao-ingressos').innerHTML = "Comprar ingressos";
    document.getElementById('descricao').innerHTML = evento.descricao;
    document.getElementById('valor-total-ingressos').innerHTML = 0

    var lista_imagens = document.getElementById('listaImagens');
    lista_imagens.innerHTML = "";
    for (i = 0; i < evento.imagems.length; i++) {
        imagem = evento.imagems[i];
        var elemImagem = document.createElement("img");
        elemImagem.classList.add("imagem-menor");
        elemImagem.classList.add("imagens-laterais");
        elemImagem.src = imagem.nome;
        elemImagem.addEventListener('click', function(){selecionarImagem(this);}, false);
        lista_imagens.appendChild(elemImagem);
    }

    var imagem_destaque = document.getElementById('imagemDestaque');
    if(evento.imagems.length > 0) {
        imagem_destaque.src = evento.imagems[0].nome
    } else {
        imagem_destaque.src = "images/sem-imagem.jpg"
    }

    var lista_ingressos = document.getElementById('lista-ingressos');
    lista_ingressos.innerHTML = "";
    if(evento.ingressos.length > 0) {
        var ul = document.createElement("ul");
        ul.classList.add("list-group");
        ul.classList.add("list-group-flush");
        
        for (i = 0; i < evento.ingressos.length; i++) {
            ul.appendChild(createIngressoItemList(evento.ingressos[i]));
        }

        var li = document.createElement("li");
        li.classList.add("list-group-item");

        var row = document.createElement("div");
        row.classList.add("row");
        row.style.padding = '1%';

        var col = document.createElement("div");
        col.classList.add("col-sm");
        row.classList.add("text-right");

        var btComprar = document.createElement("button");
        btComprar.innerHTML = "Comprar ingressos";
        btComprar.style.backgroundColor = "green";
        btComprar.style.color = "white";
        btComprar.addEventListener("click", function() {
            console.log(document.getElementById('valor-total-ingressos').innerHTML);
        }, false);

        col.appendChild(btComprar);

        row.appendChild(col);

        li.appendChild(row);

        ul.appendChild(li);

        lista_ingressos.appendChild(ul);
    } else {
        lista_ingressos.innerHTML = "<p>Não há ingressos para este evento</p>"
    }
    
    window.scrollTo(0, 0);

    // console.log(evento);
}

function selecionarEstabelecimento(estabelecimento) {
    document.getElementById('ingressos').style.display = "none";
    
    document.getElementById('nome_evento').innerHTML = estabelecimento.nome;
    document.getElementById('tags_evento').innerHTML = "tags";
    document.getElementById('local_evento').innerHTML = "local";
    document.getElementById('datahora_evento').innerHTML = "datahora";
    document.getElementById('botao-visualizacoes').innerHTML = "-";
    document.getElementById('botao-ingressos').innerHTML = "-";
    document.getElementById('descricao').innerHTML = estabelecimento.descricao;

    var lista_imagens = document.getElementById('listaImagens');
    lista_imagens.innerHTML = "";
    for (i = 0; i < estabelecimento.imagems.length; i++) {
        imagem = estabelecimento.imagems[i];
        var elemImagem = document.createElement("img");
        elemImagem.classList.add("imagem-menor");
        elemImagem.classList.add("imagens-laterais");
        elemImagem.src = imagem.nome;
        elemImagem.addEventListener('click', function(){selecionarImagem(this);}, false);
        lista_imagens.appendChild(elemImagem);
    }

    var imagem_destaque = document.getElementById('imagemDestaque');
    if(estabelecimento.imagems.length > 0) {
        imagem_destaque.src = estabelecimento.imagems[0].nome
    } else {
        imagem_destaque.src = "images/sem-imagem.jpg"
    }

    window.scrollTo(0, 0);

    // console.log(estabelecimento);
}

function selecionarImagem(elemImagem){
    var imagem_destaque = document.getElementById('imagemDestaque');
    imagem_destaque.src = elemImagem.src;
}